<?php

namespace DockerRestart\controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RestartController
 * @package DockerRestart\controller
 */
final class RestartController
{
    /** @var Container */
    private $app;

    /**
     * RestartController constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Restart container.
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function restart(Request $request, Response $response): Response
    {
        $data = [
            'msgs' => 'test',
        ];
        return $response->withJson($data);
    }
}