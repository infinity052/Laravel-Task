<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ATGModel extends Model
{
    protected $table = 'myatg';
    protected $fillable = ['name','email','pincode'];
    public $timestamps = false;
}
