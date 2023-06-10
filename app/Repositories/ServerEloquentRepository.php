<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ServerRepositoryInterface;
use App\Services\ExcelService;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ServerEloquentRepository implements ServerRepositoryInterface
{
    public function __construct(
        public FilterService $filter,
        public ExcelService $excelService
    ) {
    }

    /**
     * Get filtered servers based on the request parameters.
     *
     * @return Collection|Server[]
     *
     * @throws \ErrorException
     */
    public function getServers(Request $request = null): Collection
    {
        try {

            if (! Cache::has('servers')) {
                Cache::put('servers', $this->excelService->importServers());
            }

            $filteredServers = Cache::get('servers')
                ->when($request->ram ?? false, fn ($servers) => $this->filter->filterByRam($servers, $request))
                ->when($request->hdd ?? false, fn ($servers) => $this->filter->filterByHdd($servers, $request))
                ->when($request->location ?? false, fn ($servers) => $this->filter->filterByLocation($servers, $request));

            return $filteredServers;
        } catch (\Exception $e) {
            Log::error('An error occurred during retrieving servers data: '.$e->getMessage());
            throw new \ErrorException('Error retrieving servers data.');
        }

    }

    /**
     * Get unique server locations.
     *
     *
     * @throws \ErrorException
     */
    public function getServersLocations(): Collection
    {
        try {

            if (! Cache::has('serverLocations')) {
                Cache::put('serverLocations', $this->getServers()->unique('location'));
            }

            return Cache::get('serverLocations');
        } catch (\Exception $e) {
            Log::error('An error occurred during retrieving servers location data: '.$e->getMessage());
            throw new \ErrorException('Error retrieving servers location data.');
        }

    }
}
