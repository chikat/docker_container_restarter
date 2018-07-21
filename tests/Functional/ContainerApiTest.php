<?php

namespace Tests\Functional;

class ContainerApiTest extends BaseTestCase
{
    /**
     * @covers \DockerRestart\controller\ContainerController::killHup()
     */
    public function testKillHup()
    {
        $expected = [
            'code' => 0,
            'msgs' => [],
        ];
        $response = $this->runApp('GET', '/kill/hup/test');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, json_decode((string)$response->getBody(), true));
    }

    /**
     * @covers \DockerRestart\controller\ContainerController::killHup()
     */
    public function testKillHupNotFound()
    {
        $expected = [
            'code' => -1,
            'msgs' => ['Not Found'],
        ];
        $response = $this->runApp('GET', '/kill/hup/no_container');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($expected, json_decode((string)$response->getBody(), true));
    }
}