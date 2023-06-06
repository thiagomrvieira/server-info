<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServerResource;
use App\Repositories\Interfaces\ServerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServerController extends Controller
{

    public function __construct(
        public ServerRepositoryInterface $servers
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            return ServerResource::collection(
                $this->servers->getServers($request)
            );
        } catch (\Exception $e) {
            Log::error('An error occurred in the LocationController: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

}
