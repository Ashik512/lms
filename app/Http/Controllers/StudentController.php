<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:librarian');
    }

	public function StudentList()
	{
		$students = User::all();
        return view('admin.student.student_list',compact('students'));
	}

	public function inactiveStudent($id)
    {
      
        $id             =base64_decode($id);
        $student          = User::find($id);
        $student->status  = 0;
        $student->save();
        Session::flash('success','Student Inactive Success');
        return back();
    }


    public function activeStudent($id)
    {

        $id             =base64_decode($id);
        $student          = User::find($id);
        $student->status  = 1;
        $student->save();
        Session::flash('success','Student Active Success');
        return back(); 
    }
}

