@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Department</a></li>
                <li><a href="javascript:avoid(0)">Manage Department</a></li>
            </ul>
        </div>
    </div>

   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-md-offset-2">

                @include('includes.message')

                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                          <div class="row">
                            <div class="col-xs-6"><h4>Manage Department</h4></div>
                            <div class="col-xs-6 text-right"><a href="{{route('add-department-form')}}" class="btn btn-primary">Add Department</a>

                            </div>
                          </div>
                            
                         <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Department Name</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                        $i=1;
                                     @endphp
                                    @foreach($departments as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->dept_name}}</td>
                                    <td>
                                      
                                      <a href="{{route('edit-department',base64_encode($row->id))}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                      <a href="{{route('delete-department',base64_encode($row->id))}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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