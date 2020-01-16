<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class Geolocate extends Controller
{
    // Clean street/city/state/zipcode, add lat/lng
    public function geo($record)
    {
        // Geocode the address
        $address = implode('+', [
            $record['street'],
            $record['city'],
            $record['state'],
            $record['zipcode'],
        ]);
        $address = str_replace(' ', '+', $address);
        $address = str_replace('-', '+Suite+', $address);
        $address = str_replace('.', '', $address);
        $address = str_replace(',', '', $address);

        $key = env('GOOGLE_MAPS_API_KEY');
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?'
            . 'address=' . $address
            . '&key=' . $key;

        $json = file_get_contents($url);
        $response = json_decode($json);

        if (!isset($response->results[0]->address_components)) {
            // Unable to decode
            return $record;
        }

        // Extract Street, City, State, Zip Code
        $address_components = $response->results[0]->address_components;
        foreach ($address_components as $address_component) {
            foreach ($address_component->types as $type) {
                $short_names[$type] = $address_component->short_name;
            }
        }
        if (!empty($short_names['street_number']) && !empty($short_names['route'])) {
            $street = trim($short_names['street_number'] . ' ' . $short_names['route']);
            if (!empty($street)) {
                $record['street'] = $street;
            }
        }
        if (!empty($short_names['locality'])) {
            $record['city'] = $short_names['locality'];
        }
        $record['state'] = $short_names['administrative_area_level_1'];
        $record['zipcode'] = $short_names['postal_code'];

        // Extract Latitude and Longitude
        $geometry = $response->results[0]->geometry;
        $record['lat'] = $geometry->location->lat;
        $record['lng'] = $geometry->location->lng;

        return $record;
    }

    /**
     * @param Location $location
     * @return Location
     */
    public function location(Location $location): Location
    {
        if (!empty($location->street)
            && !empty($location->city)
            && !empty($location->state)
            && !empty($location->zipcode)) {

            $record['street'] = $location->street;
            $record['city'] = $location->city;
            $record['state'] = $location->state;
            $record['zipcode'] = $location->zipcode;

            $record = $this->geo($record);

            if (!empty($record['street'])) {
                $location->street = $record['street'];
            }
            if (!empty($record['city'])) {
                $location->city = $record['city'];
            }
            if (!empty($record['state'])) {
                $location->state = $record['state'];
            }
            if (!empty($record['zipcode'])) {
                $location->zipcode = $record['zipcode'];
            }
            if (!empty($record['lat'])) {
                $location->lat = $record['lat'];
            }
            if (!empty($record['lng'])) {
                $location->lng = $record['lng'];
            }
        }

        return $location;
    }
}
