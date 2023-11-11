<?php

namespace Mdn\MiniProjectSekolah\Service;

use Exception;
use Mdn\MiniProjectSekolah\Model\Admin\AdminRequest;
use Mdn\MiniProjectSekolah\Model\Admin\AdminResponse;
use Mdn\MiniProjectSekolah\Model\Guru\GuruLoginRequest;
use Mdn\MiniProjectSekolah\Model\Guru\GuruLoginResponse;
use Mdn\MiniProjectSekolah\Model\Login\LoginRequest;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;

class LoginService {

    private LoginRepository $loginRepository;
    private GuruLoginRequest $guruLoginRequest;
    private AdminRequest $adminLoginRequest;
    

    public function __construct(LoginRepository $loginRepository){
        $this->loginRepository = $loginRepository;
    }

    // login
    public function login(LoginRequest $request){
        $this->validateLoginRequest($request);
        $user = $this->loginRepository->findByUsername($request->username);
        if ($user == null){
            throw new Exception("Username atau Password salah!");
        }
        if (password_verify($request->password, $user->password)){
            
            if ($user->mode == "guru"){
                $response = $user;
                $response->name = $user->name;
                return $response;
            }else{
                $response = $user;
                return $response;
            }

        }else {
            throw new Exception("Username atau Password salah!");
        }

    }

    public function validateLoginRequest(LoginRequest $request){
        if ($request->username == null || $request->password == null || trim($request->username) == "" || trim($request->password) == ""){
            throw new Exception("Username atau Password tidak boleh kosong!");
        }
    }
    

}

