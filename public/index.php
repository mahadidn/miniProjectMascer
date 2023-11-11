<?php

use Mdn\MiniProjectSekolah\App\Router;
use Mdn\MiniProjectSekolah\Controller\AdminController;
use Mdn\MiniProjectSekolah\Controller\GuruController;
use Mdn\MiniProjectSekolah\Controller\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

// Guest controller
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/profil', HomeController::class, 'profil');
Router::add('GET', '/informasi', HomeController::class, 'informasi');
Router::add('GET', '/database', HomeController::class, 'database');
Router::add('GET', '/user/login', HomeController::class, 'login');
Router::add('POST', '/user/login', HomeController::class, 'postLogin');

// Guru Controller
Router::add('GET', '/guru/profil', GuruController::class, 'profil');
Router::add('GET', '/guru/edit', GuruController::class, 'edit');

// Admin Controller
Router::add('GET', '/admin/profil', AdminController::class, 'index');
Router::add('GET', '/admin/edit', AdminController::class, 'edit');

Router::run();
