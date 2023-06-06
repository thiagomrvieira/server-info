<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ServerRepositoryInterface;
use App\Services\ExcelService;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServerEloquentRepository implements ServerRepositoryInterface
{
    public function __construct(
        public FilterService $filter,
        public ExcelService $excelService
    ){}

    public function getServers(Request $request = null)
    {
        try {
            $servers = $this->excelService->importServers();

            $filteredServers = $servers
                ->when($request->ram      ?? false, fn ($servers) => $this->filter->filterByRam($servers, $request))
                ->when($request->hdd      ?? false, fn ($servers) => $this->filter->filterByHdd($servers, $request))
                ->when($request->location ?? false, fn ($servers) => $this->filter->filterByLocation($servers, $request));

            return $filteredServers;
        } catch (\Exception $e) {
            Log::error('An error occurred during retrieving servers data: ' . $e->getMessage());
            throw new \ErrorException('Error retrieving servers data.');
        }

    }

    public function getServersLocations()
    {
        try {
            $serverLocations = $this->getServers()->unique('location');

            return $serverLocations;
        } catch (\Exception $e) {
            Log::error('An error occurred during retrieving servers location data: ' . $e->getMessage());
            throw new \ErrorException('Error retrieving servers location data.');
        }

    }

}

