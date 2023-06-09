<?php

namespace Tests\Unit;

use App\Repositories\ServerEloquentRepository;
use App\Services\ExcelService;
use App\Services\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;

class ServerEloquentRepositoryTest extends TestCase
{
    private $repository;
    private $filterService;
    private $excelService;

    protected function setUp(): void
    {
        parent::setUp();

        // Create real instances of the dependencies
        $this->filterService = new FilterService();
        $this->excelService = new ExcelService();

        // Configure Cache and Log to not use mocks
        Cache::shouldReceive('has')->andReturnUsing(function ($key) {
            return Cache::get($key) !== null;
        });

        Cache::shouldReceive('put')->andReturnNull();
        Cache::shouldReceive('get')->andReturn(collect());
        Log::shouldReceive('error')->andReturnNull();

        // Create ServerEloquentRepository with the real instances of the dependencies
        $this->repository = new ServerEloquentRepository($this->filterService, $this->excelService);
    }

    /**
     * @test
     * @group serverRepository
     */
    public function getServers_returns_collection()
    {
        // Create a mock instance of Request
        $request = $this->createMock(Request::class);

        // Call the getServers() function of the repository
        $result = $this->repository->getServers($request);

        // Verify that the result is an instance of Collection
        $this->assertInstanceOf(Collection::class, $result);
    }

    /**
     * @test
     * @group serverRepository
     */
    public function getServersLocations_returns_collection()
    {
        // Call the getServersLocations() function of the repository
        $result = $this->repository->getServersLocations();

        // Verify that the result is an instance of Collection
        $this->assertInstanceOf(Collection::class, $result);
    }
}
