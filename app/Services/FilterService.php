<?php

namespace App\Services;

class FilterService
{
    public function filterByRam($collection, $request)
    {
        $ramFilters = $request->ram;

        return $collection->filter(function ($item) use ($ramFilters) {
            foreach ($ramFilters as $ramFilter) {
                $pattern = '/\b'.preg_quote($ramFilter).'\b/i';
                if (preg_match($pattern, $item)) {
                    return true;
                }
            }

            return false;
        });
    }

    public function filterByHdd($servers, $request)
    {
        $hddFilter = $request->hdd;

        return $servers->filter(function ($item) use ($hddFilter) {
            return stripos($item, $hddFilter) !== false;
        });
    }

    public function filterByLocation($servers, $request)
    {
        $locationFilter = $request->location;

        return $servers->filter(function ($item) use ($locationFilter) {
            return stripos($item, $locationFilter) !== false;
        });
    }
}
