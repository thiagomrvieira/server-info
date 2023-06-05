<?php

namespace App\Repositories;

use App\Models\Server;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Repositories\Interfaces\ServerRepositoryInterface;
use App\Services\FilterService;
use Illuminate\Http\Request;

class ServerEloquentRepository implements ServerRepositoryInterface
{
    public function __construct(
        public FilterService $filter
    ){}

    public function all(Request $request = null)
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

        $filteredServers = $servers
            ->when($request->ram, fn ($servers) => $this->filter->filterByRam($servers, $request))
            ->when($request->hdd, fn ($servers) => $this->filter->filterByHdd($servers, $request))
            ->when($request->location, fn ($servers) => $this->filter->filterByLocation($servers, $request));

        return $filteredServers;

    }

    public function locations()
    {
        return $this->all()->unique('location');
    }

}

