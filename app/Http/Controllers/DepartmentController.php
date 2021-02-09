<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Session;

class DepartmentController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth:librarian');
    }

	public function addDepartmentForm()
	{
		return view('admin.department.add_department');
	}

	public function saveDepartment(Request $request)
	{

		$request->validate([
          'dept_name' => 'required|unique:departments|max:20',
      ]);

       $department = new Department();
       $department->dept_name = $request->dept_name;
       $department->save();

       Session::flash('success','Department added Successfully');
       return back();
	}

	public function manageDepartment()
	{
		$departments = Department::orderBy('id','ASC')
        ->get();
        return view('admin.department.department_list',compact('departments'));
	}

	//edit department
    public function editDepartment($id)
    {
        $id             =base64_decode($id);
        $row 			= Department::find($id);
        //return $row;
        return view('admin.department.edit_department',compact('row'));
    }
    //update department
    public function updateDepartment(Request $request,$id)
    {
      
      $department             = Department::find($id);

      if($request->dept_name == $department->dept_name ){
       $request->validate([
          'dept_name' => 'required|unique:departments|max:20',
      ]);
     }

       //return $department;
       $department->dept_name = $request->dept_name;
       $department->save();

       Session::flash('success','Department updated Successfully');
       return back();
    }

    public function deleteDepartment($id)
    {
     
        $id             =base64_decode($id);
        $department          = Department::find($id);
        $department->delete();    
        Session::flash('success','Brand delete Success');
        return back();
    }

    
}
