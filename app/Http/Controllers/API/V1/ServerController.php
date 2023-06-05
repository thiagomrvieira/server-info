<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServerResource;
use App\Repositories\Interfaces\ServerRepositoryInterface;
use Illuminate\Http\Request;


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
        return ServerResource::collection(
            $this->servers->all($request)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
