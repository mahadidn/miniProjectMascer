<?php

use Mdn\MiniProjectSekolah\App\Router;
use Mdn\MiniProjectSekolah\Controller\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

Router::add('GET', '/', HomeController::class, 'index');

Router::run();
