<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Exception;
use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Login\LoginRequest;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Service\LoginService;

class HomeController {
    private LoginService $loginService;

    public function __construct(){
        $connection = Database::getConnection();
        $loginRepository = new LoginRepository($connection);
        $this->loginService = new LoginService($loginRepository);
    }
    
    public function index(){
        $css = __DIR__ . '/../View/style.css';
        View::render('index', [
            'title' => 'Home',
            'css' => $css
        ]);

    }

    public function profil(){
        $css = __DIR__ . '/../View/Profil/style.css';
        View::render('Profil/index', [
            'title' => 'Profil Sekolah',
            'css' => $css
        ]);
    }

    public function informasi(){
        $css = __DIR__ . '/../View/Informasi/style.css';
        View::render('Informasi/index', [
            'title' => 'Informasi',
            'css' => $css
        ]);
    }

    public function database(){
        $css = __DIR__ . '/../View/Database/style.css';
        View::render('Database/index', [
            'title' => 'Database',
            'css' => $css,
            'img' => '/imgDatabase/'
        ]);
    }

    public function login(){
        $css = __DIR__ . '/../View/login/style.css';
        View::render('login/index', [
            'title' => 'Login',
            'css' => $css
        ]);
    }

    public function postLogin(){
        $request = new LoginRequest();
        $request->username = $_POST['username'];
        $request->password = $_POST['password'];

        try {
            $response = $this->loginService->login($request);
            if($response->mode == "guru"){
                $css = __DIR__ . '/../View/Guru/style.css';
                View::render('Guru/index', [
                'title' => 'Login',
                'css' => $css,
                'data' => [
                    'name' => $response->name,
                    'email' => $response->email,
                    'nip' => $response->nip,
                    'jenisKelamin' => $response->jenisKelamin,
                    'tanggalLahir' => $response->tglLahir,
                    'jabatan' => $response->jabatan
                ]
            ]);
            }else {
                $css = __DIR__ . '/../View/Admin/style.css';
                View::render('Admin/index', [
                    'title' => 'Login',
                    'css' => $css,
                    'name' => $response->name,
                    'username' => $response->username
                ]);
            }
        }catch(Exception $exception){
            $css = __DIR__ . '/../View/login/style.css';
            View::render('login/index', [
                'title' => 'Login',
                'css' => $css,
                'error' => $exception->getMessage()
            ]);
        }
    }


}

