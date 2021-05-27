<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Books;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;
use SebastianBergmann\Diff\Diff;


class IssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $data = DB::table('issue_book')
                ->join('users', 'issue_book.user_id', '=', 'users.id')
                ->join('books', 'issue_book.book_id', '=', 'books.id')
                ->join('authors', 'issue_book.author_id', '=', 'authors.id')
                ->select('issue_book.*', 'users.name', 'users.phone', 'users.address', 'books.book_title', 'books.book_price', 'authors.author_name')
                ->get();
//       dd($data);
            return view('BookIssue.index', compact('data'));
        } else {
            return redirect(route('home'));
        }

    }

    public function create()
    {
        $author = Author::all();
        $books = Books::all();
        return view('BookIssue.create', compact('books', 'author'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $user_id = Auth::id();
        $data = array();
        $data['user_id'] = $user_id;
        $data['book_id'] = $request->book_id;
        $data['author_id'] = $request->author_id;
        $data['book_issue_date'] = $request->book_issue_date;
        $data['book_return_date'] = $request->book_return_date;
        DB::table('issue_book')->insert($data);
        if (auth()->user()->isAdmin()) {
            return $this->index();
        } else {
            session()->flash('Success', 'You Issued a book! Please return on time');
            return redirect(route('home'));
        }

    }

    public function returnBook()
    {
        $auth = Auth::user()->id;

        $data = DB::table('issue_book')
            ->join('users', 'issue_book.user_id', '=', 'users.id')
            ->join('books', 'issue_book.book_id', '=', 'books.id')
            ->join('authors', 'issue_book.author_id', '=', 'authors.id')
            ->select('issue_book.*', 'users.id', 'users.name', 'users.phone', 'users.address', 'books.book_title', 'books.book_price', 'authors.author_name')
            ->where('issue_book.user_id', '=', $auth)
            ->get();
        return view('BookIssue.return', compact('data'));

    }


    public function showBook($id)
    {
        $data = DB::table('issue_book')
            ->join('users', 'issue_book.user_id', '=', 'users.id')
            ->join('books', 'issue_book.book_id', '=', 'books.id')
            ->join('authors', 'issue_book.author_id', '=', 'authors.id')
            ->select('issue_book.*', 'users.id', 'users.name', 'users.phone', 'users.address', 'books.book_title', 'books.book_price', 'authors.author_name')
            ->where('issue_book.book_id', '=', $id)
//            ->get();
            ->first();


//        $hello =book_issue_date -;
        return view('BookIssue.show', compact('data'));

    }


    public function fine(Request $request, $id)
    {

        $data = array();
        $data['DateReturned'] = $request->DateReturned;

        DB::table('issue_book')->where('issue_book.book_id', $id)->update($data);
        session()->flash('Success', 'You Returned Book Successfully');
        return redirect(route('issue.return'));


    }

    public function getbook($author_id)
    {
        $sub = DB::table('books')->where('author_id', $author_id)->get();
//        dd($sub);
        return response()->json($sub);
    }

}



