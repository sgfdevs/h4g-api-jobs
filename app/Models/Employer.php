<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name',
        'category',
        'naics',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the jobs for the employer.
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
