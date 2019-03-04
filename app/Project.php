<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /*
    protected $guarded = [];
    actioneaza in acelasi fel ca si $fillable dar in mod invers, campurile mentionate aici nefiind disponibile pentru mass assignment
    cu ajutorul metodei Project::create(['camp1'=>'valoare']);
    */ 
    
    protected $fillable = [ 
        'title', 'description'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
