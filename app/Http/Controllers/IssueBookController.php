<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Book;
use Session;
use App\IssueBook;


class IssueBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:librarian');
    }
    
    public function IssueBookForm()
    {
    	$departments = Department::orderBy('id','ASC')
        ->get();
        $books = Book::all();
    	return view('admin.book.issue_book_form',compact('departments','books'));
    }

    public function DropdownBook($id)
    {
    	//return $id;

        /*$books = Book::select('id','book_name')
        ->where('select_dept',$id)
        ->get();*/
       // dd($books);
        //echo $books;
        // print_r($books);

        $books = DB::table("books")
                    ->where("select_dept",$id)
                    ->lists("book_name","id");
         //return response()->json($books);
      return json_encode($books);
    }

    public function SaveIssueBook(Request $request)
    {

    	//return $request;

        $this->validate($request,[
          'student_name' => 'required',
          'reg_no' => 'required',
          'department_id' => 'required',
          'book_id' => 'required',
          'return_date' => 'required',
        ]);

        $books = Book::select('available_book')
        ->where('id',$request->book_id)
        ->first();

        if($books->available_book > 0){

        $issueBook = new IssueBook();

        $issueBook->student_name = $request->student_name;
        $issueBook->reg_no = $request->reg_no;
        $issueBook->department_id = $request->department_id;
        $issueBook->book_id = $request->book_id;
        $issueBook->return_date = $request->return_date;

        $issueBook->save();

        $book = Book::find($request->book_id);
        $book->available_book = $books->available_book - 1;

        $book->save();


        Session::flash('success','Book Issued Successfully');
        return back();
    }
    else{
        Session::flash('warning','Book is not Available');
        return back();
    }

    }

    public function IssueBookList()
    {
    	$issueBookList = IssueBook::all();
    	return view('admin.book.issue_book_list',compact('issueBookList'));
    }

    public function ReturnBook($id,$book_id)
    {
        $id                     =$id;
        $retunBook              = IssueBook::find($id);
        $retunBook->delete(); 

        //return $books;

        $books = Book::select('available_book')
        ->where('id',$book_id)
        ->first();

        $book = Book::find($book_id);
        $book->available_book = $books->available_book + 1;

        $book->save();  



        Session::flash('success','Issued Book Returned');
        return back();
    }
}
