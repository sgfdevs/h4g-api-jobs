<?php

namespace App\Console\Commands;

use App\Http\Controllers\SampleData;
use Illuminate\Console\Command;

class ImportJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jobs {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Jobs';

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
//        $file = $this->argument('file');
//        $data = $this->csv2array($file);
//        print_r($data);

        $employer = SampleData::employer();
        print_r($employer);
    }

    private function csv2array($file)
    {
        // https://stackoverflow.com/questions/9139202/how-to-parse-a-csv-file-using-php
        $header = [];
        $records = [];
        $record = [];
        if (($handle = fopen($file, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $num = count($data);

                if (!empty($record)) {
                    if (empty($header) && !empty($record)) {
                        $header = $record;
                    } else {
                        $records[] = $record;
                    }
                    $record = [];
                }
                for ($c = 0; $c < $num; $c++) {
                    if (!empty($header[$c])) {
                        $key = $header[$c];
                    }
                    $record[] = $data[$c];
                }
            }
            fclose($handle);
        }
        return $records;
    }

}
