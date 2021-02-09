@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Book</a></li>
                <li><a href="javascript:avoid(0)">Add Book</a></li>
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
                                <div class="col-xs-6"><h4>Book Add Form</h4></div>
                                <div class="col-xs-6 text-right"><a href="{{route('book-list')}}" class="btn btn-primary">Book List</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{route('save-book')}}">
                                      @csrf
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Book Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('book_name')}}" name="book_name"placeholder="Book Name..." data-validation="required">

                                            </div>
                                        </div>
          
                                         <div class="form-group">

                                           <label class="col-sm-3 control-label">Department</label>
                                            <div class="col-sm-9">
                                                
                                                <select class="form-control" id="" name="select_dept" required >
                                                <option value="" disabled selected>Please select Dept.</option>        
                                                @foreach($depts as $dept)
                                                 
                                                <option value="{{ $dept->id }}"> {{ $dept->dept_name }} </option>
                                                @endforeach
                                              </select>
   
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Author Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('author_name')}}" name="author_name"placeholder="Author Name..." data-validation="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Total Book</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('total_book')}}" name="total_book"placeholder="Total Book..." data-validation="required">
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save Book</button>
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