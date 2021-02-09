<!doctype html>
<html lang="en" class="fixed left-sidebar-top">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{asset('assets/admin/vendor/pace/pace.min.js')}}"></script>
    <link href="{{asset('assets/admin/vendor/pace/pace-theme-minimal.css')}}" rel="stylesheet" />

    

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/animate.css/animate.css')}}">
    <!--SECTION css-->

     <!--dataTable-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/toastr/toastr.min.css')}}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/magnific-popup/magnific-popup.css')}}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('assets/admin/stylesheets/css/style.css')}}">

     


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="{{route('admin.dashboard')}}" class="on-click">
                        <!-- <img alt="logo" src="{{--asset('assets/admin/images/header-logo.png')--}}" /> -->
                        <h3 style="margin-left: 10px;">[LMS}</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{asset('assets/admin/images/avatar/avatar_user.jpg')}}" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('admin.logout') }}"
                      onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Logout">
                    {{ __('Logout') }} <i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>

                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">lms</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                               <li class="{{request()->is('/admin') ? 'active-item' :'' }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>

                               <!-- Student List -->

                               <li class="{{request()->is('student/student-list') ? 'active-item':'' }}"><a href="{{route('student-list')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Students</span></a></li>
                               
                                <!--Department-->
                                <li class="has-child-item close-item {{request()->is('department/*') ? 'open-item':'' }}">
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Department</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{request()->is('department/add-department','department/edit-department/*') ? 'active-item':'' }}"><a href="{{route('add-department-form')}}">Add Department</a></li>
                                        <li class="{{request()->is('department/manage-department') ? 'active-item':'' }}"><a href="{{route('manage-department')}}">Department List</a></li>

                                    </ul>
                                </li>

                                {{--Books--}}
                                
                                 <li class="has-child-item close-item {{request()->is('book/*') ? 'open-item':'' }}">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>Book</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{request()->is('book/add-book','book/edit-book/*') ? 'active-item':'' }}"><a href="{{route('add-book-form')}}">Add Book</a></li>
                                        <li class="{{request()->is('book/book-list') ? 'active-item':'' }}"><a href="{{route('book-list')}}">Book List</a></li>

                                    </ul>
                                </li>

                                <li class="{{request()->is('books/issue-book') ? 'active-item':'' }}"><a href="{{route('issue-book-form')}}"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>

                                <li class="{{request()->is('books/issue-book-list') ? 'active-item':'' }}"><a href="{{route('issue-book-list')}}"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book List</span></a></li>


                                
                               
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
               @yield('content')
               
            </div>
            
           
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->

    <script src="{{asset('assets/admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/nano-scroller/nano-scroller.js')}}"></script>
    
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{asset('assets/admin/javascripts/template-script.min.js')}}"></script>
    <script src="{{asset('assets/admin/javascripts/template-init.min.js')}}"></script>

    <script src="{{asset('assets/admin/javascripts/jquery-3.4.1.min.js')}}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="{{asset('assets/admin/vendor/toastr/toastr.min.js')}}"></script>
    <!--morris chart-->
    <script src="{{asset('assets/admin/vendor/chart-js/chart.min.js')}}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{asset('assets/admin/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
       <!--dataTable-->
    <script src="{{asset('/')}}assets/admin/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/admin/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
    <!--Examples-->
    <script src="{{asset('/')}}assets/admin/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples-->
    <script src="{{asset('assets/admin/javascripts/examples/dashboard.js')}}"></script>
    <script>
    
    $.validate({
        lang: 'en'
      });
           
   </script>
  
    @yield('dropdown-book')

    

       
</body>


</html>