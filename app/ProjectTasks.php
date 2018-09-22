<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Projects;

class ProjectTasks extends Model
{
    protected $fillable=['title','project_id','start_date','end_date','description','status'];

    public function project(){
        return $this->belongsTo(Projects::class);
    }
}
