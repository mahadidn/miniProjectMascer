<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;
use Mdn\MiniProjectSekolah\Service\LoginService;
use Mdn\MiniProjectSekolah\Service\SessionService;

class AdminController {

    private SessionService $sessionService;
    private LoginService $loginService;

    public function __construct(){
        $connection = Database::getConnection();
        $loginRepository = new LoginRepository($connection);
        $this->loginService = new LoginService($loginRepository);
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $loginRepository);
    }
    
    public function index(){
        $css = __DIR__ . '/../View/Admin/style.css';
        View::render('Admin/index', [
            'title' => 'Profil Admin',
            'css' => $css,
            'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
        ]);
    }

    public function tambahAdmin(){
        $css = __DIR__ . '/../View/Admin/tambahAkun/style.css';
        View::render('Admin/tambahAkun/admin', [
            'title' => 'Tambah Akun Admin',
            'css' => $css,
            'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
        ]);
    }

    public function tambahGuru(){
        $css = __DIR__ . '/../View/Admin/tambahAkun/style.css';
        View::render('Admin/tambahAkun/guru', [
            'title' => 'Tambah Akun Guru',
            'css' => $css,
            'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
        ]);
    }

    public function edit(){
        $css = __DIR__ . '/../View/Admin/editProfilAdmin/style.css';
        View::render('Admin/editProfilAdmin/index', [
            'title' => 'Edit Profil',
            'css' => $css,
            'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
        ]);
    }

    public function logout(){
        $this->sessionService->destroy();
        View::redirect("/");
    }

}
