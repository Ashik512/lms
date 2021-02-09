@extends('layouts.student_layout')

@section('content')

 <div class="content-header">
                    <!-- leftside content header -->
    <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Dashboard</a></li>
            </ul>
        </div>
    </div>
   
  <div class="row animated fadeInUp">
      <div class="col-sm-12">
        <div class="row"> 

                   <!--  Total Books -->

                    <div class="col-sm-6 col-md-4 col-lg-3">
                     <div class="panel widgetbox wbox-1 bg-lighter-1 color-light">
                         <a href="{{route('all-book-list')}}">
                             <div class="panel-content">
                                 <h1 class="title color-darker-1"> <i class="fa fa-book"></i> {{$books[0]}} {{'('}} {{$books[1]}} {{'-'}} {{$books[2]}} {{')'}} </h1>
                                 <h4 class="subtitle color-darker-1">Total Book</h4>
                             </div>
                         </a>
                     </div>
                  </div>
                                    
                                    
                   <!-- Total Librarian -->
                  <div class="col-sm-6 col-md-4 col-lg-3">

                     <div class="panel widgetbox wbox-1 color-lighter-1 color-light">
                         <a href="javascript:avoid(0)">
                             <div class="panel-content">
                                 <h1 class="title color-darker-1"> <i class="fa fa-user"></i> {{$librarian}} </h1>
                                 <h4 class="subtitle color-darker-1">Total Librarian</h4>
                             </div>
                         </a>

                     </div>
                </div>

        </div>
      </div>
  </div>

@endsection