<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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


    public function store(StoreRequest $request)
    {
        $object = new User();
        $object->fill($request->except('_token'));
        $object->save();

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
}
