<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Repository\AdminRepository;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;
use Mdn\MiniProjectSekolah\Service\AdminService;
use Mdn\MiniProjectSekolah\Service\LoginService;
use Mdn\MiniProjectSekolah\Service\SessionService;

class GuruController {

    private SessionService $sessionService;
    private LoginService $loginService;

    public function __construct(){
        $connection = Database::getConnection();
        $loginRepository = new LoginRepository($connection);
        $this->loginService = new LoginService($loginRepository);
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $loginRepository);
    }

    public function profil(){
        $css = __DIR__ . '/../View/Guru/style.css';
        View::render('/Guru/index', [
            'title' => 'Profil Guru',
            'css' => $css
        ]);
    }

    public function edit(){
        $css = __DIR__ . '/../View/Guru/editProfilGuru/style.css';
        View::render('/Guru/editProfilGuru/index', [
            'title' => 'Edit Profil Guru',
            'css' => $css
        ]);
    }

    public function logout(){
        $this->sessionService->destroy();
        View::redirect("/");
    }

}

