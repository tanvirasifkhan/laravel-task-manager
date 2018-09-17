<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;

class Categories extends Model{
    protected $fillable=['category_title'];

    public function tasks(){
        return $this->hasMany(Tasks::class);
    }
}
