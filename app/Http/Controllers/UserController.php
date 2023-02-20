<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
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

        // $users->appends(['q'=> $search]);

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


    public function store(StoreRequest $request)
    {
        $user = new User();
        $user->fill($request->except(['_token', 'password']));
        $user->fill([
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();

        // $user = User::query()
        //     ->create([
        //         'name' => $request->get('name'),
        //         'email' => $request->get('email'),
        //         'password' =>Hash::make( $request->get('password')),
        //         'level' => $request->get('level'),
        //         'phone' => $request->get('phone'),
        //         'address' => $request->get('address'),
        //         'gender' => $request->get('gender'),
        //         'birthdate' => $request->get('birthdate'),
        //     ]);

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


    public function update(UpdateRequest $request, User $user)
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

        $user = User::query()->create([
            'password' =>Hash::make( $request->get('password')),
            $request->except('_token'),
        ]);

        // $user = User::query()
        //     ->create([
        //         'name' => $request->get('name'),
        //         'email' => $request->get('email'),
        //         'password' =>Hash::make( $request->get('password')),
        //         'level' => $request->get('level'),
        //         'phone' => $request->get('phone'),
        //         'address' => $request->get('address'),
        //         'gender' => $request->get('gender'),
        //         'birthdate' => $request->get('birthdate'),
        //     ]);

    }
}
