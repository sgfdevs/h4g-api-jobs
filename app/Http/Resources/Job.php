<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date_posted' => $this->date_posted,
            'date_updated' => $this->date_updated,
            'date_expires' => $this->date_expires,
            'employer_id' => $this->employer_id,
//            'employer' => \App\Models\Employer::where('id',$this->employer_id)->get(),
//            'employer' => $this->employer,
            'employer' => new Employer($this->employer),
//            'location_id' => $this->location_id,
//            'locations' => $this->locations,
            'locations' => new LocationCollection($this->locations),
            'title' => $this->title,
            'description' => $this->description,
            'job_type' => $this->job_type,
            'job_id' => $this->job_id,
            'pay_rate' => $this->pay_rate,
            'req_education' => $this->req_education,
            'data_source' => $this->data_source,
            'data_site' => $this->data_site,
            'url' => $this->url,
            'fake' => $this->fake,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
//            'deleted_at' => $this->deleted_at,
        ];
    }
}
