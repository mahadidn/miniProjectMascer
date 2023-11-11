<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;

class AdminController {
    
    public function index(){
        $css = __DIR__ . '/../View/Admin/style.css';
        View::render('Admin/index', [
            'title' => 'Profil Admin',
            'css' => $css
        ]);
    }

    public function edit(){
        $css = __DIR__ . '/../View/Admin/editProfilAdmin/style.css';
        View::render('Admin/editProfilAdmin/index', [
            'title' => 'Edit Profil',
            'css' => $css
        ]);
    }

}
