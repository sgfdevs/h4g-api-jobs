<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name',
        'street',
        'city',
        'state',
        'zipcode',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the events for the location.
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    /**
     * The jobs that belong to the location.
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Models\Job');
    }

}
