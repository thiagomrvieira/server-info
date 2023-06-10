<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Repositories\Interfaces\ServerRepositoryInterface;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function __construct(
        public ServerRepositoryInterface $servers
    ) {
    }

    /**
     * Display a listing of server locations.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Exception
     */
    public function index()
    {
        try {
            return LocationResource::collection(
                $this->servers->getServersLocations()
            );
        } catch (\Exception $e) {
            Log::error('An error occurred in the LocationController: '.$e->getMessage());

            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
}
