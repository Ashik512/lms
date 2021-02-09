<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $table = 'departments';
    protected $fillable = [
        'dept_name',
    ];

    
}
