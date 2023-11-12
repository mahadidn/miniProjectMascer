<?php

namespace Mdn\MiniProjectSekolah\Controller;

use Mdn\MiniProjectSekolah\App\View;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Session;
use Mdn\MiniProjectSekolah\Model\Login\LoginRequest;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;
use Mdn\MiniProjectSekolah\Service\LoginService;
use Mdn\MiniProjectSekolah\Service\SessionService;

class LoginController {

    private LoginService $loginService;
    private SessionService $sessionService;

    public function __construct(){
        $connection = Database::getConnection();
        $loginRepository = new LoginRepository($connection);
        $this->loginService = new LoginService($loginRepository);
        $sesionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sesionRepository, $loginRepository);
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
                
                $this->sessionService->create($response->username);
                View::redirect('/');

            }else {
                $this->sessionService->create($response->username);
                View::redirect('/');
            }
        }catch(\Exception $exception){
            $css = __DIR__ . '/../View/login/style.css';
            View::render('login/index', [
                'title' => 'Login',
                'css' => $css,
                'error' => $exception->getMessage()
            ]);
        }
    }

}   

