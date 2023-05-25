<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{

    protected $table = 'rooms';

    protected $fillable = [
        'user_id','entity_id','name', 'description','status',
    ];

}
