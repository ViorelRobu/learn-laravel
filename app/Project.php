<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Events\ProjectCreated as AppProjectCreated;

class Project extends Model
{
    /*
    protected $guarded = [];
    actioneaza in acelasi fel ca si $fillable dar in mod invers, campurile mentionate aici nefiind disponibile pentru mass assignment
    cu ajutorul metodei Project::create(['camp1'=>'valoare']);
    */ 
    
    protected $fillable = [ 
        'owner_id', 'title', 'description'
    ];

    protected $dispatchesEvent = [
        'created' => AppProjectCreated::class
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }
}
