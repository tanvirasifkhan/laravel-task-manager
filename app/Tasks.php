<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class Tasks extends Model
{
    protected $fillable=['title','category_id','start_date','end_date','description','status'];

    public function category(){
        return $this->belongsTo(Categories::class);
    }
}
