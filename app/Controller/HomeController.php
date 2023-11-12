<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Exception;
use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Login\LoginRequest;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;
use Mdn\MiniProjectSekolah\Service\LoginService;
use Mdn\MiniProjectSekolah\Service\SessionService;

class HomeController {
    private SessionService $sessionService;

    public function __construct(){
        $connection = Database::getConnection();
        $sessionRepository = new SessionRepository($connection);   
        $loginRepository = new LoginRepository($connection);    
        $this->sessionService = new SessionService($sessionRepository, $loginRepository);
    }
    
    public function index(){
        $user = $this->sessionService->current();
        if($user == null){
            View::redirect('/home');
        }else if ($user->userType == "guru"){
            $css = __DIR__ . '/../View/Guru/style.css';
            View::render('Guru/index', [
                'title' => 'Profil Guru',
                'css' => $css,
                'data' => [
                    'nip' => $user->nip,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jabatan' => $user->jabatan,
                    'tanggalLahir' => $user->tglLahir,
                    'jk' => $user->jenisKelamin,
                    'fotoProfil' => $user->fotoProfil
                ],
                'fitur' => [
                    'login' => true
                ]
            ]);
        }else if ($user->userType == "admin"){
            $css = __DIR__ . '/../View/Admin/style.css';
            View::render('Admin/index', [
                'title' => 'Profil Admin',
                'css' => $css,
                'username' => $user->username,
                'name' => $user->name,
                'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
            ]);
        }
    }

    public function home(){
        $user = $this->sessionService->current();
        if($user == null){
            $css = __DIR__ . '/../View/style.css';
            View::render('index', [
                'title' => 'home',
                'css' => $css
            ]);
        }else if ($user->userType == "guru"){
            $css = __DIR__ . '/../View/style.css';
            View::render('index', [
                'title' => 'home',
                'css' => $css,
                'data' => [
                    'nip' => $user->nip,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jabatan' => $user->jabatan,
                    'tanggalLahir' => $user->tglLahir,
                    'jk' => $user->jenisKelamin,
                    'fotoProfil' => $user->fotoProfil
                ],
                'fitur' => [
                    'login' => true
                ]
            ]);
        }else if ($user->userType == "admin"){
            $css = __DIR__ . '/../View/style.css';
            View::render('index', [
                'title' => 'home',
                'css' => $css,
                'username' => $user->username,
                'name' => $user->name,
                'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
            ]);
        }
    }

    public function profil(){
        $user = $this->sessionService->current();
        if($user == null){
            $css = __DIR__ . '/../View/Profil/style.css';
            View::render('Profil/index', [
                'title' => 'Profil Sekolah',
                'css' => $css
            ]);
        }else if ($user->userType == "guru"){
            $css = __DIR__ . '/../View/Profil/style.css';
            View::render('Profil/index', [
                'title' => 'Profil Sekolah',
                'css' => $css,
                'data' => [
                    'nip' => $user->nip,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jabatan' => $user->jabatan,
                    'tanggalLahir' => $user->tglLahir,
                    'jk' => $user->jenisKelamin,
                    'fotoProfil' => $user->fotoProfil
                ],
                'fitur' => [
                    'login' => true
                ]
            ]);
        }else if ($user->userType == "admin"){
            $css = __DIR__ . '/../View/Profil/style.css';
            View::render('Profil/index', [
                'title' => 'Profil Sekolah',
                'css' => $css,
                'username' => $user->username,
                'name' => $user->name,
                'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
            ]);
        }
    }

    public function informasi(){
        $user = $this->sessionService->current();
        if($user == null){
            $css = __DIR__ . '/../View/Informasi/style.css';
            View::render('Informasi/index', [
                'title' => 'Informasi',
                'css' => $css
            ]);
        }else if ($user->userType == "guru"){
            $css = __DIR__ . '/../View/Informasi/style.css';
            View::render('Informasi/index', [
                'title' => 'Informasi',
                'css' => $css,
                'data' => [
                    'nip' => $user->nip,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jabatan' => $user->jabatan,
                    'tanggalLahir' => $user->tglLahir,
                    'jk' => $user->jenisKelamin,
                    'fotoProfil' => $user->fotoProfil
                ],
                'fitur' => [
                    'login' => true
                ]
            ]);
        }else if ($user->userType == "admin"){
            $css = __DIR__ . '/../View/Informasi/style.css';
            View::render('Informasi/index', [
                'title' => 'Informasi',
                'css' => $css,
                'username' => $user->username,
                'name' => $user->name,
                'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
            ]);
        }
    }

    public function database(){
        $user = $this->sessionService->current();
        if($user == null){
            $css = __DIR__ . '/../View/Database/style.css';
            View::render('Database/index', [
                'title' => 'Data Guru & Pendidik',
                'css' => $css,
                'img' => '/imgDatabase/'
            ]);
        }else if ($user->userType == "guru"){
            $css = __DIR__ . '/../View/Database/style.css';
            View::render('Database/index', [
                'title' => 'Data Guru & Pendidik',
                'css' => $css,
                'img' => '/imgDatabase/',
                'data' => [
                    'nip' => $user->nip,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'jabatan' => $user->jabatan,
                    'tanggalLahir' => $user->tglLahir,
                    'jk' => $user->jenisKelamin,
                    'fotoProfil' => $user->fotoProfil
                ],
                'fitur' => [
                    'login' => true
                ]
            ]);
        }else if ($user->userType == "admin"){
            $css = __DIR__ . '/../View/Database/style.css';
            View::render('Database/index', [
                'title' => 'Data Guru & Pendidik',
                'css' => $css,
                'username' => $user->username,
                'name' => $user->name,
                'img' => '/imgDatabase/',
                'fitur' => [
                    'tambahAkun' => true,
                    'login' => true
                ]
            ]);
        }
    }

}

