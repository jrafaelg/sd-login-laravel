<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $ttl = env('CACHE_TTL', 60); // 1 minutes

        Gate::before(function (User $user) use ($ttl) {
            // pegando as roles do usuário e salvando em cache
            $userRoles = Cache::remember('userRoles' . $user->id, $ttl, function () use ($user) {
                return $user->roles;
            });

            if (in_array('admin', $userRoles->pluck('key')->toArray())) {
                // se o usuário for admin, ele tem todas as permissões
                return true;
            }
        });

        /** */
        $permissionsFound = Cache::remember('permissions', $ttl, function () {
            return Permission::get();
        });

        // Every permission may have multiple roles assigned
        foreach ($permissionsFound as $permission) {
            Gate::define($permission->key, function ($user) use ($permission, $ttl) {

                // pegando todas as permissões do usuário
                // e salvando em cache
                $permissionsUser = Cache::remember('permissionsUser' . $user->id, $ttl, function () use ($user) {
                    return $user->permissions->pluck('key', 'id')->toArray();
                });

                // pegando as roles do usuário
                // e salvando em cache
                $userRoles = Cache::remember('userRoles' . $user->id, $ttl, function () use ($user) {
                    return $user->roles;
                });

                if (in_array('admin', $userRoles->pluck('key')->toArray())) {
                    dump('admin role found');
                    // se o usuário for admin, ele tem todas as permissões
                    return true;
                }

                //dump($userRoles->pluck('key')->toArray());

                // pegando todas as permissões das roles do usuário
                // e salvando em cache
                $permissionsRoles = Cache::remember('permissionsRoles' . $user->id, $ttl, function () use ($userRoles) {
                    return Permission::select('permissions.*')
                        ->join('permission_role', 'permissions.id', '=', 'permission_role.permission_id')
                        ->join('roles', 'permission_role.role_id', '=', 'roles.id')
                        ->whereIn('roles.id', $userRoles->pluck('id')->toArray())
                        ->distinct()
                        ->get()
                        ->pluck('key', 'id')
                        ->toArray();
                });

                // juntando as permissões do usuário com as permissões das roles
                $permissions =  [...$permissionsUser, ...$permissionsRoles];

                // We check if we have the needed roles among current user's roles
                //return count(array_intersect($permissions, $permissionsFound->pluck('key')->toArray())) > 0;
                // verificamos se a permissão existe entre as permissões do usuário
                return count(array_intersect($permissions, [$permission->key])) > 0;
            });
        }


        // /** */
        // $permissions = Cache::remember('permissions', 1, function () {
        //     $roles = Role::with('permissions')->get();
        //     $permissionsArray = [];
        //     foreach ($roles as $role) {
        //         foreach ($role->permissions as $permissions) {
        //             $permissionsArray[$permissions->key][] = $role->id;
        //         }
        //     }
        //     return $permissionsArray;
        // });

        // // Every permission may have multiple roles assigned
        // foreach ($permissions as $title => $roles) {
        //     Gate::define($title, function ($user) use ($roles) {
        //         // We check if we have the needed roles among current user's roles
        //         return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
        //     });
        // }

        // dump(Gate::check('post.view'));

        // dump(Gate::allows('post.edit'));
        // dump(Gate::allows('post.delete'));
        // dump(Gate::allows('post.create'));

        // dd(Gate::abilities());


        /**
         * 
         */
        // armazenando as permissões em cache por 10 minutos
        // $permissions = Cache::remember('permissions', 1, function () {
        //     return Permission::with('roles')->get();
        // });


        // $permissions
        //     ->each(function ($permission) {
        //         Gate::define($permission->key, function ($user) use ($permission) {
        //             return $user->roles->intersect($permission->roles)->count();
        //         });
        //     });


        if (!Auth::check()) {

            //dd(Auth::class);
            //logger()->debug('User not logged in');
            //return;
        }
    }
}
