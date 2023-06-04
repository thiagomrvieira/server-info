<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Repositories\Interfaces\ServerRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(
        public ServerRepositoryInterface $servers
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LocationResource::collection(
            $this->servers->locations()
        );
    }

}
