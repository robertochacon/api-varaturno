<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

    protected $table = 'services';

    protected $fillable = [
        'user_id','entity_id','name', 'description','status',
    ];

}
