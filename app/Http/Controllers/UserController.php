<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->birthdate = $request->get('birthdate');
        $user->gender = $request->get('gender');
        $user->save();
    }
}
