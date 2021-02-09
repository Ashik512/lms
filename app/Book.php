<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
	protected $table = 'books';

    protected $fillable = [
    	'book_name','select_dept','author_name','total_book',
    ];

     //relationship with Department model

	public function department()
	{

		return $this->belongsTo('App\Department','select_dept');
	}
}
