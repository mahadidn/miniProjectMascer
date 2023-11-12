<?php

namespace Mdn\MiniProjectSekolah\Service;

require_once __DIR__ . '/../Helper/helper.php';

use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Domain\SessionAdmin;
use Mdn\MiniProjectSekolah\Model\Domain\SessionGuru;
use Mdn\MiniProjectSekolah\Repository\AdminRepository;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;
use PHPUnit\Framework\TestCase;

class SessionServiceTest extends TestCase {

    private SessionService $sessionService;
    private SessionRepository $sessionRepository;
    private LoginRepository $loginRepository;
    private AdminRepository $adminRepository;

    protected function setUp(): void{
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->loginRepository = new LoginRepository(Database::getConnection());
        $this->sessionService = new SessionService($this->sessionRepository, $this->loginRepository);
        $this->adminRepository = new AdminRepository(Database::getConnection());
        
        // $this->sessionRepository->deleteAll();

        // $admin = new Admin();
        // $admin->username = "gojo";
        // $admin->name = "Gojo Satoru";
        // $admin->password = "gojo123";
        // $this->adminRepository->saveAdmin($admin);

        // $guru = new Guru();
        // $guru->nip = "23423453";
        // $guru->username = "Frieren";
        // $guru->name = "Frieren";
        // $guru->email = "frieren@gmail.com";
        // $guru->password = "Rahasia456";
        // $guru->jabatan = "Guru Fisika";
        // $guru->tglLahir = "2003-04-12";
        // $guru->jenisKelamin = "perempuan";
        // $guru->fotoProfil = "asdfasdfa";
        // $this->adminRepository->saveGuru($guru);
    }

    public function testCreateAdmin(){
        $sesionAdmin = $this->sessionService->create("gojo");

        $this->expectOutputRegex("[X-SDN005BukitBestari-Session: $sesionAdmin->userId]");
        
        $result = $this->loginRepository->findByUsername($sesionAdmin->usernameSession);

        self::assertEquals("gojo", $result->username);
    }

    public function testCreateGuru(){
        $sessionGuru = $this->sessionService->create("yotsuba");

        $this->expectOutputRegex("[X-SDN005BukitBestari-Session: $sessionGuru->userId]");

        $result = $this->loginRepository->findByUsername($sessionGuru->usernameSession);
        self::assertEquals("yotsuba", $result->username);
    }

    public function testDestroyAdmin(){
        $sessionAdmin = new SessionAdmin();
        $sessionAdmin->userId = uniqid();
        $sessionAdmin->usernameSession = "adminGanteng";

        $this->sessionRepository->save($sessionAdmin);

        $_COOKIE[SessionService::$COOKIE_NAME] = $sessionAdmin->userId;
        $this->sessionService->destroy();

        $this->expectOutputRegex("[X-SDN005BukitBestari-Session: ]");
        
        $result = $this->sessionRepository->findByUserId($sessionAdmin->usernameSession);
        self::assertNull($result);

    }

    public function testDestroyGuru(){
        $sessionGuru = new SessionGuru();
        $sessionGuru->userId = uniqid();
        $sessionGuru->usernameSession = "yotsuba";

        $this->sessionRepository->save($sessionGuru);

        $_COOKIE[SessionService::$COOKIE_NAME] = $sessionGuru->userId;
        $this->sessionService->destroy();

        $this->expectOutputRegex("[X-SDN005BukitBestari-Session: ]");
        
        $result = $this->sessionRepository->findByUserId($sessionGuru->usernameSession);
        self::assertNull($result);

    }

    public function testCurrentAdmin(){
        $sessionAdmin = new SessionAdmin();
        $sessionAdmin->userId = uniqid();
        $sessionAdmin->usernameSession = "adminGanteng";

        $this->sessionRepository->save($sessionAdmin);

        $_COOKIE[SessionService::$COOKIE_NAME] = $sessionAdmin->userId;
        $user = $this->sessionService->current();

        self::assertEquals($sessionAdmin->usernameSession, $user->username);
    }

}
