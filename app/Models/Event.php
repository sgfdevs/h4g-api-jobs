<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'date_begin',
        'date_end',
        'title',
        'location_id',
        'description',
        'phone',
        'email',
        'cost',
        'url',
        'url_image',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the location that owns the event.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

}
