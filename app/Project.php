<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [ 
        'title', 'description'
    ];

    /*
    protected $guarded = [];
    actioneaza in acelasi fel ca si $fillable dar in mod invers, campurile mentionate aici nefiind disponibile pentru mass assignment
    cu ajutorul metodei Project::create(['camp1'=>'valoare']);
    */
}
