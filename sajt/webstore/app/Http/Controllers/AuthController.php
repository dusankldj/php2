<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->role->name == 'admin')
                return redirect()->route('admin.dashboard');

            return redirect()->route('home');
        }

        return view('pages.loginPage');
    }

    public function register(RegisterRequest $request){
        $data=$request->validated();

        $user=User::create([
            ...$data,
            'password'=>bcrypt($data['password'])
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            session()->put('username', Auth::user()->username);

            $user = Auth::user();

            if ($user->role->name == 'admin')
                return redirect()->route('admin.dashboard');

            // AKO JE USER
            return redirect()->route('home');
        }


        // ako nije uspeo login
        return back()->withErrors([
            'password' => 'Wrong password'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }



}
