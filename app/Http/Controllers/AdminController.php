<?php

namespace App\Http\Controllers;
use App\Librarian;
use Illuminate\Http\Request;
use Session;
use App\Book;
use App\User;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:librarian');
    }

    public function index()
    {
      
      $books = array();

      $books[0] = Book::all()->count();
      $books[1] = Book::all()->sum('total_book');
      $books[2] = Book::all()->sum('available_book');

      $student    =  User::all()->count();
      $librarian  = Librarian::all()->count();

      //return $books;
      return view('admin.admin_home',compact('books','student','librarian'));
    
    }

    public function showLoginForm()
    {
    	return view('admin.login');
    }

}
