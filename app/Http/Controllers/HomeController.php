<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Librarian;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
    {
      
      $books = array();

      $books[0] = Book::all()->count();
      $books[1] = Book::all()->sum('total_book');
      $books[2] = Book::all()->sum('available_book');
      $librarian  = Librarian::all()->count();

      //return $books;
      return view('home',compact('books','librarian'));
    
    }

    //some student part
  //All book list for student
  public function AllBookList()
  {
    /*$books = DB::table('books')
    ->join('departments','books.select_dept','departments.id')
    ->select('books.*','departments.dept_name')
    ->get();
    //return $books;
    return view('admin.book.book_list',compact('books'));*/

    $books = Book::all();
    //return $books;
    return view('admin.student.all_book_list',compact('books'));
  }

  public function MyIssueBookList($id)
  {
      $issueBook = DB::table('issue_books')
      ->join('books','issue_books.book_id','books.id')
      ->where('issue_books.reg_no',$id)
      ->get();
      //return $issueBook;
      return view('admin.student.my_issue_book',compact('issueBook'));
      
  }

}
