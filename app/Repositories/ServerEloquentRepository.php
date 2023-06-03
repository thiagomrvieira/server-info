<?php

namespace App\Repositories;

use App\Models\Server;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Repositories\Interfaces\ServerRepositoryInterface;


class ServerEloquentRepository implements ServerRepositoryInterface
{

    public function all()
    {
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
    }
}

