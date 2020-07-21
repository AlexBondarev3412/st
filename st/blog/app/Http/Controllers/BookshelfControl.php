<?php

namespace App\Http\Controllers;

use App\Bookshelf;
use Illuminate\Http\Request;

class BookshelfControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Bookshelf::orderBy('created_at', 'asc')->paginate(5);
        //$books = Bookshelf::all()->sortByDesc('created_at')->values();
        return view('bookshelf.pages.index')->withPost($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookshelf.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:bookshelves|max:255',
        ]);
        $books = new Bookshelf();
        $books->title = $request->title;
        $books->author = $request->author;
        $books->text = $request->text;
        $books->save();

        $request->session()->flash('success', 'Книга добавлена на полку');
        return view('bookshelf.pages.show')->withPost($books);
        return redirect()->route('bookshelf.show', $books->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Bookshelf::find($id);
        return view('bookshelf.pages.show')->withPost($books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Bookshelf::find($id);
        return view('bookshelf.pages.edit')->withPost($books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $books = Bookshelf::find($id);

        $books->title = $request->title;
        $books->author = $request->author;
        $books->text = $request->text;
        $books->save();

        $request->session()->flash('success', 'Книга отредактирована');
        return view('bookshelf.pages.show')->withPost($books);
        return redirect()->route('bookshelf.show', $books->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
