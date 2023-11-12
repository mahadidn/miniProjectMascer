<?php

namespace Mdn\MiniProjectSekolah\Repository;

use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Domain\Session;
use Mdn\MiniProjectSekolah\Model\Domain\SessionAdmin;
use Mdn\MiniProjectSekolah\Model\Domain\SessionGuru;
use PHPUnit\Framework\TestCase;

class SessionRepositoryTest extends TestCase {

    private SessionRepository $sessionRepository;
    private AdminRepository $adminRepository;

    protected function setUp(): void{
        $this->adminRepository = new AdminRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());

        
        // $guru = new Guru();
        // $guru->nip = "123123123";
        // $guru->username = "nugraha";
        // $guru->name = "Mahadi Dwi Nugraha";
        // $guru->email = "mahadi@gmail.com";
        // $guru->password = "rahasia";
        // $guru->jabatan = "Kepala TIK";
        // $guru->tglLahir = "2003-08-30";
        // $guru->jenisKelamin = "laki-laki";
        // $guru->fotoProfil = "asdasa";
        // $this->adminRepository->saveGuru($guru);

        // $admin = new Admin();
        // $admin->username = "campus";
        // $admin->name = "abc123";
        // $admin->password = "abc123";
        // $this->adminRepository->saveAdmin($admin);
    }

    public function testSaveSuccess(){
        $sessionAdmin = new SessionAdmin();
        $sessionAdmin->usernameSession = "adminGanteng";
        $sessionAdmin->userType = "admin";
        $sessionAdmin->userId = uniqid();
        $this->sessionRepository->save($sessionAdmin);

        $sessionGuru = new SessionGuru();
        $sessionGuru->usernameSession = "nugraha";
        $sessionGuru->userType = "guru";
        $sessionGuru->userId = uniqid();
        $this->sessionRepository->save($sessionGuru);
        
        $resultAdmin = $this->sessionRepository->findByUserId($sessionAdmin->userId);
        $resultGuru = $this->sessionRepository->findByUserId($sessionGuru->userId);

        self::assertEquals($sessionAdmin->usernameSession, $resultAdmin->usernameSession);

        self::assertEquals($sessionGuru->usernameSession, $resultGuru->usernameSession);

    }

    public function testDeleteByUsernameAdminSuccess(){
        $sessionAdmin = new SessionAdmin();
        $sessionAdmin->userId = uniqid();
        $sessionAdmin->userType = "admin";
        $sessionAdmin->usernameSession = "adminGanteng";

        $this->sessionRepository->save($sessionAdmin);

        $result = $this->sessionRepository->findByUserId($sessionAdmin->userId);

        self::assertEquals($sessionAdmin->usernameSession, $result->usernameSession);
        // self::assertEquals($sessionAdmin->userId, $result->userId);

        $this->sessionRepository->deleteByUserId($sessionAdmin->userId);
        $result = $this->sessionRepository->findByUserId($sessionAdmin->userId);
        self::assertNull($result);

    }

    public function testDeleteByUsernameGuruSuccess(){
        $sessionAdmin = new SessionAdmin();
        $sessionAdmin->userId = uniqid();
        $sessionAdmin->userType = "guru";
        $sessionAdmin->usernameSession = "nugraha";

        $this->sessionRepository->save($sessionAdmin);

        $result = $this->sessionRepository->findByUserId($sessionAdmin->userId);

        self::assertEquals($sessionAdmin->usernameSession, $result->usernameSession);
        self::assertEquals($sessionAdmin->userId, $result->userId);

        $this->sessionRepository->deleteByUserId($sessionAdmin->userId);
        $result = $this->sessionRepository->findByUserId($sessionAdmin->userId);
        self::assertNull($result);

    }

    public function testFindByUsernameNotFound(){
        $result = $this->sessionRepository->findByUserId("notfound");
        self::assertNull($result);
    }

    

}
