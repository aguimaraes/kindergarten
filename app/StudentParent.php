<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    protected $fillable =[
        'name',
        'birthdate',
        'email',
        'phone',
        'address'
    ];
}