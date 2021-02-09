<?php

Route::prefix('admin')->group(function() {
   Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::post('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
   Route::get('/', 'AdminController@index')->name('admin.dashboard');
 }) ;

// admin dashboard
//Route::get('/admin/login','AdminController@showLoginForm')->name('login');
//Route::get('/admin','AdminController@index')->name('dashboard');

//Route::get('/admin/dashboard','AdminController@adminDashboard')->name('dashboard');
//Department
//add department
Route::get('/department/add-department', 'DepartmentController@addDepartmentForm')->name('add-department-form');
//manage department
Route::get('/department/manage-department', 'DepartmentController@manageDepartment')->name('manage-department');
//save department
Route::post('/department/save-department', 'DepartmentController@saveDepartment')->name('save-department');
//delete department
Route::get('/department/delete-department/{id}', 'DepartmentController@deleteDepartment')->name('delete-department');
//edit department
Route::get('/department/edit-department/{id}', 'DepartmentController@editDepartment')->name('edit-department');
//update department
Route::post('/department/update-department/{id}', 'DepartmentController@updateDepartment')->name('update-department');

//Book
//showing add book form
Route::get('/book/add-book', 'BookController@addBookForm')->name('add-book-form');
//save book
Route::post('/book/save-book', 'BookController@saveBook')->name('save-book');
//showing book list and manage it
Route::get('/book/book-list', 'BookController@bookList')->name('book-list');
//delete book
Route::get('/book/delete-book/{id}', 'BookController@deleteBook')->name('delete-book');
//edit book
Route::get('/book/edit-book/{id}', 'BookController@editBook')->name('edit-book');
Route::post('/book/update-book/{id}', 'BookController@updateBook')->name('update-book');

//issue book

Route::get('books/issue-book','IssueBookController@IssueBookForm')->name('issue-book-form');

Route::get('books/dropdown-book/{id}','IssueBookController@DropdownBook')->name('dropdown-book');
//saving issue book
Route::post('books/save-issue-book','IssueBookController@SaveIssueBook')->name('save-issue-book');
//issue book list
Route::get('books/issue-book-list','IssueBookController@IssueBookList')->name('issue-book-list');
//return issue book
Route::get('books/return-book/{id}/{book_id}','IssueBookController@ReturnBook')->name('return-book');

Auth::routes();

Route::get('/', 'Auth\RegisterController@showRegistrationForm');

Route::get('/home', 'HomeController@index')->name('home');

//Student list
Route::get('/student/student-list','StudentController@StudentList')->name('student-list');
Route::get('/student/active-student/{id}','StudentController@activeStudent')->name('active-student');
Route::get('/student/inactive-student/{id}','StudentController@inactiveStudent')->name('inactive-student');

//student part
//showing book list
Route::get('/book/all-book-list', 'HomeController@AllBookList')->name('all-book-list');
Route::get('/book/my-issue-book-list/{reg_no}', 'HomeController@MyIssueBookList')->name('my-issue-book-list');
