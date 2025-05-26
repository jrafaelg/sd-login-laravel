<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     *            MANY TO MANY      MANY TO MANY
     *        __________________ __________________
     *       |                  |                  |
     *   +------+           +------+        +------------+
     *   | USER |           | ROLE |        | PERMISSION |
     *   +------+           +------+        +------------+
     *       |                                    |
     *        ------------------------------------
     *                     MANY TO MANY
     */

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('123'),
        ]);

        User::factory(10)->create([
            'password' => bcrypt('123'),
        ]);

        Permission::upsert([
            ['key' => 'post.edit', 'label' => 'Edit post'],
            ['key' => 'post.create', 'label' => 'Create post'],
            ['key' => 'post.delete', 'label' => 'Delete post'],
            ['key' => 'post.view', 'label' => 'View post'],
        ], uniqueBy: ['id']);

        Role::upsert([
            ['key' => 'admin', 'label' => 'adminitrator'],
            ['key' => 'editor', 'label' => 'editor'],
            ['key' => 'user', 'label' => 'user'],
        ], uniqueBy: ['id']);
    }
}
