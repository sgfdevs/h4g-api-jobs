<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'date_begin' => $this->date_begin,
            'date_end' => $this->date_end,
            'date_expires' => $this->date_expires,
            'title' => $this->title,
//            'location_id' => $this->location_id,
//            'location' => \App\Models\Location::where('id',$this->location_id)->get(),
//            'location' => $this->location,
            'location' => new Location($this->location),
            'event_id' => $this->event_id,
            'description' => $this->description,
            'phone' => $this->phone,
            'email' => $this->email,
            'cost' => $this->cost,
            'url' => $this->url,
            'url_image' => $this->url_image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
//            'deleted_at' => $this->deleted_at,
        ];
    }
}
