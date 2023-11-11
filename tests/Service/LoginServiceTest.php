<?php

namespace Mdn\MiniProjectSekolah\Service;

use Exception;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Login\LoginRequest;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use PHPUnit\Framework\TestCase;

class LoginServiceTest extends TestCase {
    
    private LoginService $loginService;
    private LoginRepository $loginRepository;

    protected function setUp(): void{
        $connection = Database::getConnection();
        $this->loginRepository = new LoginRepository($connection);
        $this->loginService = new LoginService($this->loginRepository);
    } 

    public function testLoginNotFound(){
        $this->expectException(Exception::class);

        $request = new LoginRequest();
        $request->username = 'asd';
        $request->password = 'dsf';

        $this->loginService->login($request);
    }

    public function testLoginWrongPassword(){
        // $this->expectException(Exception::class);
        $user = new LoginRequest();
        $user->username = "yotsuba";
        $user->password = "Rahasia123";

        $result = $this->loginService->login($user);
        self::assertEquals($user->username, $result->username);
        self::assertTrue(password_verify($user->password, $result->password));
    }

}
