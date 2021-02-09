@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Student</a></li>
                <li><a href="javascript:avoid(0)">Student List</a></li>
            </ul>
        </div>
    </div>

   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">

                @include('includes.message')

                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                          <div class="row">
                            <div class="col-xs-6"><h4>Student List</h4></div>
                          </div>
                            
                         <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Reg_No</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                        $i=1;
                                     @endphp
                                    @foreach($students as $student)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->department->dept_name}}</td>
                                    <td>{{$student->registration_no}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->status == '1' ? 'Active' : 'Inactive'}}</td>
                                    <td>
                                    @if($student->status == '1')
                                     <a href="{{route('inactive-student',base64_encode($student->id))}}" class="btn btn-info btn-sm"><i class="fa fa-arrow-up"></i></a>
                                    @else
                                    <a href="{{route('active-student',base64_encode($student->id))}}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-down"></i></a>
                                    @endif  
                                    
                                    </td>
                                      
                                    
                                   
                                </tr>
                                    
                                    @endforeach

                                  </tbody>
                                </table>
                              </div>

                        </div>
                    </div>
                </div>
      </div>
  </div>

@endsection