<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{

    protected $table = 'patients';

    protected $fillable = [
        'entity_id', 'name', 'identification', 'phone','age','address','service_id','service','role',
    ];

    public function entity()
    {
    	return $this->belongsTo('App\Entities', 'entity_id');
    }
}
