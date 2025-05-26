<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {


        //dump(Gate::abilities());

        // dump('post.view', Gate::check('post.view'));

        // dump('post.edit', Gate::allows('post.edit'));
        //dump('post.delete', Gate::allows('post.delete'));
        //dump('employees.delete', Gate::allows('employees.delete'));
        // dump('post.create', Gate::allows('post.create'));

        // dd(Auth::user());

        // dd('fim home');

        if (! Auth::check()) {
            return redirect()->route('login')->withErrors([
                'error' => 'Você precisa estar logado para acessar esta página.',
            ]);
        }
        return view('home');
    }
}
