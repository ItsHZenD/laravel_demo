<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\DestroyRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('q');

        $data = Book::query()
            ->where('name', 'like', '%'. $search . '%')
            ->paginate(2);
        
        $data->appends(['q'=> $search]);

        return view('books.index',[
            'data' => $data,
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
        return view('books.create');
    }


    public function store(StoreRequest $request)
    {
        $object = new Book();
        $object->fill($request->except('_token'));
        $object->save();

        // Book::create($request->except('_token'));
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
    {
        return view('books.edit',[
            'book' => $book,
        ]);
    }


    public function update(UpdateRequest $request, Book $book)
    {
        $book->update($request->except([
            '_token',
            '_method',
        ])
        );

        return redirect()->route('books.index');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        // Book::destroy($book->id);
        return redirect()->route('books.index');
    }
}
