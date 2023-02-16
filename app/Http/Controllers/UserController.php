<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('q');

        $users = User::query()
            ->where('name', 'like', '%'. $search . '%')
            ->paginate(5);

        $users->appends(['q'=> $search]);

        return view('users.index',[
            'users' => $users,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        // $object = new User();
        // $object->fill([
        //     'password' => Hash::make($request->get('password'))
        // ]);
        // // $object->fill($request->except('_token'));
        // $object->save();

        $user = User::query()
            ->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' =>Hash::make( $request->get('password')),
                'level' => $request->get('level'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'gender' => $request->get('gender'),
                'birthdate' => $request->get('birthdate'),
            ]);
        // Book::create($request->except('_token'));
        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('users.edit',[
            'user' => $user,
        ]);
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->except([
            '_token',
            '_method',
        ])
        );

        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
        $user->delete();
        // Book::destroy($user->id);
        return redirect()->route('users.index');
    }

    public function processRegister(Request $request){
        $user = User::query()
            ->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' =>Hash::make( $request->get('password')),
                'level' => $request->get('level'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'gender' => $request->get('gender'),
                'birthdate' => $request->get('birthdate'),
            ]);

    }
}
