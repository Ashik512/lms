@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Department</a></li>
                <li><a href="javascript:avoid(0)">Add Department</a></li>
            </ul>
        </div>
    </div>
   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-md-offset-2">

                @include('includes.message')

                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-xs-6"><h4>Department Add Form</h4></div>
                                <div class="col-xs-6 text-right"><a href="{{route('manage-department')}}" class="btn btn-primary">All Department</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{route('save-department')}}">
                                      @csrf
                                        <div class="form-group">
                                            <label for="email2" class="col-sm-3 control-label">Add Department</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('dept_name')}}" name="dept_name" id="email2" placeholder="Department Name..." data-validation="required">
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save Department</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
  </div>

@endsection