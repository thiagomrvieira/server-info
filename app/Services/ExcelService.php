<?php

namespace App\Services;

use App\Models\Server;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;


class ExcelService
{
    public function importServers()
    {
        try {
            $servers = (new FastExcel)->import('LeaseWeb_servers_filters_assignment.xlsx', function ($line) {
                return Server::make([
                    'model' => $line['Model'],
                    'ram' => $line['RAM'],
                    'hdd' => $line['HDD'],
                    'location' => $line['Location'],
                    'price' => $line['Price']
                ]);
            });

            return $servers;
        } catch (\Exception $e) {
            Log::error('An error occurred during servers import: ' . $e->getMessage());
            throw new \ErrorException('Error importing servers data.');
        }
    }

}