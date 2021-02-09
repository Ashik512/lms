@extends('layouts.student_layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Book</a></li>
                <li><a href="javascript:avoid(0)">Book List</a></li>
            </ul>
        </div>
    </div>

   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">


                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                          <div class="row">
                            <div class="col-xs-6"><h4>Book List</h4></div>
                          </div>
                            
                         <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Book Name</th>
                                        <th>Department Name</th>
                                        <th>Author</th>
                                        <th>Total book</th>
                                        <th>Available book</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                        $i=1;
                                     @endphp
                                    @foreach($books as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->book_name}}</td>
                                    <td>{{$row->department->dept_name}}</td>
                                    <td>{{$row->author_name}}</td>
                                    <td>{{$row->total_book}}</td>
                                    <td>{{$row->available_book}}</td>
                                   
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