<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $data = Book::get();

        return view('books.index',[
            'data' => $data,
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


    public function store(Request $request)
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


    public function update(Request $request, Book $book)
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
        // Book::destroy($book->id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
