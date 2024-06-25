<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Book::all();
        return view('read',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adddata');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required' ,
        ]);

        $user = Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('book.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
       
        if(Gate::allows('view',$book))
        {
             // return $ram;    
        $user = Book::find($book->id);
        // // return $user;
        return view('view',compact('user'));
        }
        else
        {
            abort(403, 'Unauthorized');
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Book::find($id);
        // return $user;
        return view('update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Book $book)
    {
        Gate::authorize('update',$book);
        $request->validate([
            'title' => 'required',
            'price' => 'required' ,
        ]);

        $user = Book::find($book->id);
        $user->update([
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Gate::authorize('delete',$book);
        $user = Book::find($book->id);
        $user->delete();
        return redirect()->route('book.index');
    }
}
