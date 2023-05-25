<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{

    protected $table = 'areas';

    protected $fillable = [
        'user_id','entity_id','name', 'description','status',
    ];

}