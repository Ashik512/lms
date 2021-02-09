@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Book</a></li>
                <li><a href="javascript:avoid(0)">Issue Book List</a></li>
            </ul>
        </div>
    </div>

   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-12">

                @include('includes.message')

                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                          <div class="row">
                            <div class="col-xs-6"><h4>Issue Book List</h4></div>
                            <div class="col-xs-6 text-right"><a href="{{route('issue-book-form')}}" class="btn btn-primary">Issue Book</a>

                            </div>
                          </div>
                            
                         <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Student Name</th>
                                        <th>Reg. No</th>
                                        <th>Department</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return date</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                        $i=1;
                                     @endphp
                                    @foreach($issueBookList as $list)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$list->student_name}}</td>
                                    <td>{{$list->reg_no}}</td>
                                    <td>{{$list->department->dept_name}}</td>
                                    <td>{{$list->book->book_name}}</td>
                                    <td>{{$list->created_at}}</td>
                                    <td>{{$list->return_date}}</td>
                                    <td>
                                      <a href="{{route('return-book',['id'=>$list->id,'book_id'=>$list->book->id])}}" onclick="return confirm('Are you sure this book returns.?')">Retun Book</a>
                  
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