@extends('layouts.layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Book</a></li>
                <li><a href="javascript:avoid(0)">Issue Book</a></li>
            </ul>
        </div>
    </div>
   
  <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12 col-md-7 col-md-offset-2">

                @include('includes.message')

                    <div class="panel bt-md b-primary">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-xs-6"><h4>Issue Book Form</h4></div>
                                <div class="col-xs-6 text-right"><a href="{{route('issue-book-list')}}" class="btn btn-primary">Issue Book List</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{route('save-issue-book')}}">
                                      @csrf
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Student Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('student_name')}}" name="student_name"placeholder="Student Name..." data-validation="required">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Student Reg. No</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="{{ old('reg_no')}}" name="reg_no" placeholder="Reg. No..." data-validation="required">

                                            </div>
                                        </div>
          
                                         <div class="form-group">

                                           <label class="col-sm-3 control-label">Department</label>
                                            <div class="col-sm-9">
                                                
                                                <select class="form-control" id="department_id" name="department_id" required >
                                                <option value="" disabled selected>Please select Dept.</option>        
                                                @foreach($departments as $dept)
                                                 
                                                <option value="{{ $dept->id }}"> {{ $dept->dept_name }} </option>
                                                @endforeach
                                              </select>
   
                                            </div>
                                        </div>

                                        <div class="form-group">

                                           <label class="col-sm-3 control-label">Book Name</label>
                                            <div class="col-sm-9">
                                                
                                                <select class="form-control" id="book_id" name="book_id" required >
                                                <option value="" disabled selected>Please select Book</option> 

                                                @foreach($books as $book)
                                                 
                                                 <option value="{{ $book->id }}"> {{ $book->book_name }} </option>
                                                @endforeach
                                               
                                              </select>
   
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Return date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" value="{{ old('return_date')}}" name="return_date" data-validation="required">
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save Issue Book</button>
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

@section('dropdown-book')

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="department_id"]').on('change', function() {
            var deptID = $(this).val();
            if(deptID) {
                $.ajax({
                    url: '/books/dropdown-book/'+deptID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        
                        $('select[name="book_id"]').empty();
                        $('select[name="book_id"]').append('<option value="" selected disabled>'+ "Select One" +'</option>');
                        $.each(data, function(key,value) {
                            $('select[name="book_id"]').append('<option value="'+ value.id +'">'+ value.book_name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="book_id"]').empty();
            }
        });
    });
</script>

@endsection