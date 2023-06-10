<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServerAndLocationTest extends TestCase
{
    /**
     * @test
     *
     * @group servers
     */
    public function get_servers_feature_is_working()
    {
        // Perform a GET request to the server index endpoint
        $response = $this->get('/api/v1/servers');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains JSON data
        $response->assertJsonStructure([
            'data' => [
                [
                    'model',
                    'ram' => [
                        'capacity',
                        'type',
                    ],
                    'hdd' => [
                        'capacity',
                        'type',
                    ],
                    'location' => [
                        'name',
                        'code',
                    ],
                    'price',
                ],
            ],
        ]);
    }

    /**
     * @test
     *
     * @group servers
     */
    public function get_servers_location_feature_is_working()
    {
        // Perform a GET request to the locations index endpoint
        $response = $this->get('/api/v1/locations');

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains JSON data
        $response->assertJsonStructure([
            'data' => [
                [
                    'name',
                    'code',
                ],
            ],
        ]);
    }
}
