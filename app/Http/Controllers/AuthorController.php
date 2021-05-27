<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $author = Author::all();
        return view('author.index', compact('author'));
    }

    public function create()
    {
        if (auth()->user()->isAdmin()) {
            return view('author.create');
        } else {
            return $this->index();
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'author_name' =>'required',
        ]);

        if (auth()->user()->isAdmin()) {
            Author::create([
                'author_name' => $request->author_name,
                'author_address' => $request->author_address,
                'author_phone' => $request->author_phone
            ]);
            return redirect(route('author.index'));
        } else {
            return $this->index();
        }
    }

    public function edit($id)
    {
        if (auth()->user()->isAdmin()) {
            $author = Author::findorFail($id);
            return view('author.edit', compact('author'));
        } else {
            return $this->index();
        }
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'author_name' =>'required',
        ]);
        if (auth()->user()->isAdmin()) {
            Author::where('id', $id)->update([
                'author_name' => $request->author_name,
                'author_address' => $request->author_address,
                'author_phone' => $request->author_phone,
            ]);
            session()->flash('success', 'Updated Successfully.');
            return redirect(route('author.index'));
        } else {
            return $this->index();
        }

    }

    public function destroy($id)
    {
        if (auth()->user()->isAdmin()) {
            $author = Author::findorFail($id)->delete();
            session()->flash('success', 'Deleted Successfully.');
            return redirect(route('author.index'));
        } else {
            return $this->index();
        }
    }

}
