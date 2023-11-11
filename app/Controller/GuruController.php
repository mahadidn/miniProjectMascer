<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Repository\AdminRepository;
use Mdn\MiniProjectSekolah\Service\AdminService;

class GuruController {

    private AdminService $adminService;

    public function __construct(){
        $connection = Database::getConnection();
        $adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($adminRepository);
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

}

