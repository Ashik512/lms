<?php

namespace App\Http\Controllers;

use App\Book;
use App\Department;
use DB;
use Illuminate\Http\Request;
use Session;
use App\IssueBook;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:librarian');
    }
	//showing book add form id
    public function addBookForm()
    {
    	$depts = Department::select('dept_name','id')
    	->orderBy('id','ASC')
    	->get();
    	return view('admin.book.add_book',compact('depts'));
    }
    
    // save book
    public function saveBook(Request $request)
    {
    	
    	$request->validate([
          'book_name' => 'required|unique:books',
          'select_dept' => 'required',
          'author_name' => 'required',
          'total_book' => 'required',
      ]);


        $books = new Book();
        $books->book_name = $request->book_name;
        $books->select_dept = $request->select_dept;
        $books->author_name = $request->author_name;
        $books->total_book = $request->total_book;
        $books->available_book = $request->total_book;
        $books->save();

       Session::flash('success','Book added Successfully');
       return back();
    }

    //book list
  public function bookList()
	{
		/*$books = DB::table('books')
		->join('departments','books.select_dept','departments.id')
		->select('books.*','departments.dept_name')
		->get();
		//return $books;
		return view('admin.book.book_list',compact('books'));*/

		$books = Book::all();
		//return $books;
    return view('admin.book.book_list',compact('books'));
	}

  

	//edit Book
    public function editBook($id)
    {
    	
        $id             =base64_decode($id);
        $book 			= Book::find($id);
        //return $book;

        $depts = Department::select('dept_name','id')
    	->orderBy('id','ASC')
    	->get();
        
        return view('admin.book.edit_book',compact('book','depts'));
    }
    //update Book
    public function updateBook(Request $request,$id)
    {
      
      $request->validate([
          'book_name' => 'required',
          'select_dept' => 'required',
          'author_name' => 'required',
          'total_book' => 'required',
      ]);

      $book             = Book::find($id);
      //return $book;
      //return $request;

      if( $book->book_name == $request->book_name && $book->select_dept == $request->select_dept && $book->author_name == $request->author_name && $book->total_book == $request->total_book)
      {
         Session::flash('warning','Nothing  to Update');
         return back();
      }
      else{
       $book->book_name = $request->book_name;
       $book->select_dept = $request->select_dept;
       $book->author_name = $request->author_name;
       $book->total_book = $request->total_book;
       $book->save();

       Session::flash('success','Department updated Successfully');
       return back();
     }

    }
 // delete Book
    public function deleteBook($id)
    {
     
        $id             =base64_decode($id);
        $book          = Book::find($id);
        $book->delete();    
        Session::flash('success','Book delete Success');
        return back();
    }

   



}
