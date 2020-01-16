<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'date_posted',
        'date_updated',
        'date_expires',
        'employer_id',
        'location_id',
        'title',
        'job_id',
        'pay_rate',
        'data_source',
        'data_site',
        'url',
        'fake',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the employer that owns the job.
     */
    public function employer()
    {
        return $this->belongsTo('App\Models\Employer');
    }

    /**
     * The locations that belong to the job.
     */
    public function locations()
    {
        return $this->belongsToMany('App\Models\Location');
    }

}
