<?php

namespace DockerRestart\controller;

use Docker\Docker;
use Exception;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ContainerController
 * @package DockerRestart\controller
 */
final class ContainerController
{
    /** @var Container */
    private $app;

    /**
     * ContainerController constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Kill-HUP container.
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function killHup(Request $request, Response $response): Response
    {
        $container_name = $request->getAttribute('container_name');
        $msgs = [];

        try {
            $docker = new Docker();
            $manager = $docker->getContainerManager();

            $params = ['signal' => 'SIGHUP'];
            $res = $manager->kill($container_name, $params);

            $status_code = $res->getStatusCode();
            $code = 0;

            $body = (string)$res->getBody();
            if ($body !== '') {
                $msgs[] = $body;
            }
        } catch (Exception $e) {
            $status_code = 500;
            $code = -1;
            $msgs[] = $e->getMessage();
        }


        $data = [
            'code' => $code,
            'msgs' => $msgs,
        ];
        $response->withStatus($status_code);
        return $response->withJson($data);
    }
}