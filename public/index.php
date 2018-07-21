<?php

use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

// create app
$app = new App();

// route
require __DIR__ . '/../routes/api.php';

// run
try {
    $app->run();
} catch (Exception $e) {
    error_log($e->getMessage());
}