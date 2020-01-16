<?php

namespace App\Console\Commands;

use App\Http\Controllers\Geolocate;
use App\Models\Location;
use Illuminate\Console\Command;

class ImproveJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'improve:jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Improve job record data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Confirm all Location records have Geocode data (lat/lng)
        $locations = Location::get();
        foreach ($locations as $location) {
            $location = $this->locationGeocode($location);
            $location->save();
        }
    }

    private function locationGeocode(Location $location)
    {
        if (!empty($location->lat) && !empty($location->lng)) {
            // Location already has Geocode data. Skip.
            echo "========== PRESENT ==========\n";
        } elseif (empty($location->street)) {
            // Location does not have a street address. Skip.
            echo "========== EMPTY ==========\n";
        } else {
            // Location does not have Geocode data. Populate.
//            echo "========== BEFORE ==========\n";
//            print_r($location);
            echo "========== GEOCODE ==========\n";
            $geo = new Geolocate();
            $location = $geo->location($location);
//            echo "========== AFTER ==========\n";
//            print_r($location);
        }

        return $location;
    }
}
