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
        // $search = $request->get('q');


        // $data = Book::query()
        //     ->where('name', 'like', '%'. $search . '%')
        //     ->paginate(2);

        // $data->appends(['q'=> $search]);

        $search_name = $request->get('q_name');
        $search_author = $request->get('q_author');

         $data = Book::query()
            ->when($request->has('q_name'), function($q){
                return $q->where('name', 'like', '%'. request('q_name') . '%');
            })
            ->when($request->has('q_author'), function($q){
                return $q->where('author','like', '%' . request('q_author') . '%');
            })
            ->paginate(2);

        $data->appends([
            'q_name'=> $search_name,
            'q_author' => $search_author,
        ]);

        return view('books.index',[
            'data' => $data,
            'search_name' => $search_name,
            'search_author' => $search_author,
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
        // dd($object);
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
