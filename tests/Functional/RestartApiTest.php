<?php

namespace Tests\Functional;

class RestartApiTest extends BaseTestCase
{
    public function testRestart()
    {
        $response = $this->runApp('GET', '/restart/container_name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('{"msgs":"test"}', (string)$response->getBody());
    }
}