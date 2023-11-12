<?php

use Mdn\MiniProjectSekolah\App\Router;
use Mdn\MiniProjectSekolah\Controller\AdminController;
use Mdn\MiniProjectSekolah\Controller\GuruController;
use Mdn\MiniProjectSekolah\Controller\HomeController;
use Mdn\MiniProjectSekolah\Controller\LoginController;

require_once __DIR__ . '/../vendor/autoload.php';

// Guest controller
Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/home', HomeController::class, 'home');
Router::add('GET', '/profil', HomeController::class, 'profil');
Router::add('GET', '/informasi', HomeController::class, 'informasi');
Router::add('GET', '/database', HomeController::class, 'database');

// Login Controller
Router::add('GET', '/user/login', LoginController::class, 'login');
Router::add('POST', '/user/login', LoginController::class, 'postLogin');

// Guru Controller
Router::add('GET', '/guru/profil', GuruController::class, 'profil');
Router::add('GET', '/guru/edit', GuruController::class, 'edit');
Router::add('GET', '/guru/logout', GuruController::class, 'logout');

// Admin Controller
Router::add('GET', '/admin/profil', AdminController::class, 'index');
Router::add('GET', '/admin/edit', AdminController::class, 'edit');
Router::add('GET', '/admin/logout', AdminController::class, 'logout');
Router::add('GET', '/admin/tambah/guru', AdminController::class, 'tambahGuru');
Router::add('GET', '/admin/tambah/admin', AdminController::class, 'tambahAdmin');

Router::run();
