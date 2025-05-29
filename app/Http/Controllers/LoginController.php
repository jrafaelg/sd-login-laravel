<?php

namespace App\Http\Controllers;

use App\facade\ViewFacade;
use App\Rules\PasswordStrength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('login.destroy');
        }

        // app(ViewLibrary::class)->view('login', [
        //     'title' => 'Login',
        //     'description' => 'Login page',
        // ]);

        //$vf = app(ViewFacade::class);

        //dd($vf->test());

        //return viewLib('login');

        //dd(app());

        //$this->destroy($this->request);
        Log::debug('LoginController@index');
        //return app('viewFacade')->viewL('login');
        return view('login');
    }



    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => ['required'],
            ],
            [
                'email.required' => 'Email é requerido',
                'email.email' => 'Digite um email válido',
                'password.required' => 'Password é requerido',
            ]
        );

        $credentials = $request->only('email', 'password');

        $autenticated = Auth::attempt(
            $credentials,
            $request->remember
        );

        if (!$autenticated) {
            return redirect()->route('login')->withErrors([
                'error' => 'Email ou senha inválidos',
            ])->withInput();
        }


        return redirect()->route('home')->with('success', 'Login realizado com sucesso');

        // dd($request->all());
        //var_dump($request->all());
    }

    public function destroy(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout realizado com sucesso');
    }

    public function new()
    {

        return view('login.new', [
            'title' => 'Login',
            'description' => 'Login page',
        ]);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', new PasswordStrength()],
                'password_confirmation' => 'same:password',
            ],
            [
                'name.required' => 'Nome é requerido',
                'email.required' => 'Email é requerido',
                'email.email' => 'Digite um email válido',
                'email.unique' => 'Email já cadastrado',
                'password.required' => 'Password é requerido',
                'password_confirmation.same' => 'As senhas não conferem',
            ]
        );

        //dd($request->all());

        return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso');
    }
}
