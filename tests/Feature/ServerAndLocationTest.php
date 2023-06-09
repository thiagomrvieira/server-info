<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServerAndLocationTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test the server index API endpoint.
     *
     * @return void
     */
    public function testServerIndex()
    {
        // Perform a GET request to the server index endpoint
        $response = $this->get('/api/v1/servers');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains JSON data
        $response->assertJson([
            // Add your assertions for the expected JSON data returned by the endpoint
        ]);
    }

    /**
     * Test the locations index API endpoint.
     *
     * @return void
     */
    public function testLocationIndex()
    {
        // Perform a GET request to the locations index endpoint
        $response = $this->get('/api/v1/locations');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains JSON data
        $response->assertJson([
            // Add your assertions for the expected JSON data returned by the endpoint
        ]);
    }
}
