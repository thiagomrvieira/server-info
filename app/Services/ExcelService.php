<?php

namespace App\Services;

use App\Models\Server;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;


class ExcelService
{
    /**
     * Import servers from Excel file.
     *
     * @return Collection|Server[]
     *
     * @throws \ErrorException
     */
    public function importServers(): Collection
    {
        try {
            $servers = (new FastExcel)->import(storage_path('app/public/LeaseWeb_servers_filters_assignment.xlsx'), function ($line) {
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
