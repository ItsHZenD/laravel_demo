<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {

        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail();
            if (!Hash::check($request->get('password'), $user->password)) {
                throw new Exception('Invalid password');
            }
            // dd($user);
            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('level', $user->level);

            return redirect()->route('books.index');

        } catch (Throwable $th) {
            return redirect()->route('login');
        }

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }


    public function register()
    {
        return view('auth.register');
    }


}