<?php

use DockerRestart\controller\RestartController;

$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($config);
$container = $app->getContainer();

// routes
$app->get('/restart/{container}', RestartController::class . ':restart');

// run
try {
    $app->run();
} catch (Exception $e) {
    error_log($e->getMessage());
}