<?php

use DockerRestart\controller\ContainerController;

// routes
$app->get('/kill/hup/{container_name}', ContainerController::class . ':killHup');