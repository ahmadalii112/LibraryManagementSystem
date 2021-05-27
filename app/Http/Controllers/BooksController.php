<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Author;
use Illuminate\Http\Request;


class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        if (auth()->user()->isAdmin()) {
            $author = Author::all();
            if ($author->count() > 0) {
                return view('books.create', compact('author'));
            } else {
                session()->flash('error', 'Please Add Author First.');
                return redirect(route('author.create'));
            }
        } else {
            return $this->index();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'book_title' =>'required',
            'book_description' =>'required',
            'author_id' =>'required',
        ]);
        if (auth()->user()->isAdmin()) {
            Books::create([
                'book_title' => $request->book_title,
                'book_description' => $request->book_description,
                'book_price' => $request->book_price,
                'book_quantity' => $request->book_quantity,
                'author_id' => $request->author_id,
            ]);
            return redirect(route('books.index'));
        } else {
            return $this->index();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->isAdmin()) {
            $books = Books::findorFail($id);
//        dd($books->book_price);
            $author = Author::all();
            return view('books.edit', compact('books', 'author'));
        } else {
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'book_title' =>'required',
            'book_description' =>'required',
            'author_id' =>'required',
        ]);
        if (auth()->user()->isAdmin()) {
            Books::where('id', $id)->update([
                'book_title' => $request->book_title,
                'book_description' => $request->book_description,
                'book_price' => $request->book_price,
                'book_quantity' => $request->book_quantity,
                'author_id' => $request->author_id,
            ]);
            session()->flash('success', 'Updated Successfully.');
            return redirect(route('books.index'));
        } else {
            return $this->index();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        if (auth()->user()->isAdmin()) {
            $books = Books::findorFail($id)->delete();
            session()->flash('success', 'Deleted Successfully.');
            return redirect(route('books.index'));
        } else {
            return $this->index();
        }
    }
}
