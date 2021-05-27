<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Shelves extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function books()
    {
        if (auth()->user()->isAdmin()){
        $shelves = DB::table('shelves')->get();
        $books = DB::table('books')->get();
        return view('Shelves.index', compact('shelves', 'books'));
       }
        else{
            return redirect(route('home'));
        }


    }

    public function store(Request $request)
    {
        $data = array();

        $data['shelve_id'] = $request->shelve_id;
        $data['row'] = $request->row;
        $data['book_id'] = $request->book_id;
        DB::table('shelve_books')->insert($data);
        if (auth()->user()->isAdmin()) {
            session()->flash('Success', 'Successfully Shelve your Book');
            return redirect(route('home'));
        } else {
            return redirect(route('home'));
        }

    }


    public function shelveA()
    {
        $data = DB::table('shelve_books')
            ->join('shelves','shelve_books.shelve_id','shelves.id')
            ->join('books','shelve_books.book_id','books.id')
            ->where('shelve_books.shelve_id','=',1)
            ->orderBy('shelve_books.row','ASC')
            ->get();
//        dd($data);
        return view('Shelves.ShelveA.index',compact('data'));
    }
    public function shelveB()
    {
        $data = DB::table('shelve_books')
            ->join('shelves','shelve_books.shelve_id','shelves.id')
            ->join('books','shelve_books.book_id','books.id')
            ->where('shelve_books.shelve_id','=',2)
            ->orderBy('shelve_books.row','ASC')
//            ->select('shelve_books.*','shelves.shelves_name','books.book_title')
            ->get();
//        dd($data);
        return view('Shelves.ShelveB.index',compact('data'));
    }
    public function shelveC()
    {
        $data = DB::table('shelve_books')
            ->join('shelves','shelve_books.shelve_id','shelves.id')
            ->join('books','shelve_books.book_id','books.id')
            ->where('shelve_books.shelve_id','=',3)
            ->orderBy('shelve_books.row','ASC')
//            ->select('shelve_books.*','shelves.shelves_name','books.book_title')
            ->get();
//        dd($data);
        return view('Shelves.ShelveC.index',compact('data'));
    }
}
