<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable=['title','category_id','start_date','end_date','description','status'];
}
