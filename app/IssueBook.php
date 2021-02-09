<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IssueBook extends Model
{
    protected $fillable=[
     'student_name','reg_no','department_id','book_id','return_date',
    ];

    public function department()
	{

		return $this->belongsTo('App\Department','department_id');
	}

	public function book()
	{

		return $this->belongsTo('App\Book','book_id');
	}

	public function getReturnDateAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
}
