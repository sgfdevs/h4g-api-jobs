<?php

namespace App\Http\Controllers;

class SampleData extends Controller
{
    public static function employer()
    {

        do {
            $employers = SampleData::employers();
            $key = array_rand($employers, 1);
            $employer = $employers[$key];

            // Geocode the employer address
            $geo = new Geolocate;
            $employer = $geo->geo($employer);

        } while (empty($employer));

        return $employer;
    }

    // read employer locations from employer.csv
    public static function employers()
    {
        // https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php
        $file = 'employers.csv';
        $file = storage_path($file);

        $employers = [];
        if (($handle = fopen($file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, '|')) !== FALSE) {
                $num = count($data);

                if (!empty($record)) {
                    $records[] = $record;
                    $record = [];
                }

                for ($c = 0; $c < $num; $c++) {
                    $record[] = $data[$c];
                }
            }
            fclose($handle);
        }

        foreach ($records as $record) {
            $employer = [];
            $employer['name'] = $record[0];
            $employer['phone'] = $record[1];
            $employer['url'] = $record[3];

            $address = $record[2];
            // only parse employers with Springfield addresses
            $city_state = 'Springfield, MO';
            if ($pos = stripos($address, $city_state)) {
                $employer['street'] = trim(substr($address, 0, $pos - 2));
                $employer['city'] = 'Springfield';
                $employer['state'] = 'MO';
                $employer['zipcode'] = substr(
                    trim(substr($address, $pos + strlen($city_state))),
                    0, 5);
            }
            if (
                !empty($employer['name']) &&
                !empty($employer['street']) &&
                !empty($employer['city']) &&
                !empty($employer['state']) &&
                !empty($employer['zipcode'])
            ) {
                $employers[] = $employer;
            }
        }

        return $employers;
    }
}
