<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable=['title','category_id','start_date','end_date','description','status'];
}
