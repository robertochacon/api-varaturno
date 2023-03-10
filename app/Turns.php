<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turns extends Model
{
    protected $table = 'turns';

    protected $fillable = [
        'user_id','entity_id','identification','code','service','note','status',
    ];

}
