<?php

namespace Mdn\MiniProjectSekolah\Service;

use Exception;
use Mdn\MiniProjectSekolah\Model\Admin\AdminRegisterRequest;
use Mdn\MiniProjectSekolah\Model\Admin\AdminRequest;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Guru\GuruRegisterRequest;
use Mdn\MiniProjectSekolah\Repository\AdminRepository;
use PHPUnit\Framework\TestCase;

class AdminServiceTest extends TestCase {
    private AdminService $adminService;
    private AdminRepository $adminRepository;

    protected function setUp(): void{
        $connection = Database::getConnection();
        $this->adminRepository = new AdminRepository($connection);
        $this->adminService = new AdminService($this->adminRepository);
    }

    public function testRegisterGuru(){
        $request =  new GuruRegisterRequest();
        $request->nip = "2342342";
        $request->username = "mahadi";
        $request->name = "Mahadi Dwi Nugraha";
        $request->email = "mahadi@gmail.com";
        $request->password = "mahadi4567";
        $request->jabatan = "Guru";
        $request->tglLahir = "2003-03-12";
        $request->jenisKelamin = "Laki-laki";
        $request->fotoProfil = "afadsfa";

        $response = $this->adminService->registerGuru($request);

        self::assertEquals($request->nip, $response->guru->nip);
        self::assertEquals($request->name, $response->guru->name);
        self::assertTrue(password_verify($request->password, $response->guru->password));
    }

    public function testRegisterGuruFailed(){
        $this->expectException(Exception::class);
        $request =  new GuruRegisterRequest();
        $request->nip = "";
        $request->username = "";
        $request->name = "";
        $request->email = "";
        $request->password = "";
        $request->jabatan = "";
        $request->tglLahir = "";
        $request->jenisKelamin = "";
        $request->fotoProfil = "";

        $this->adminService->registerGuru($request);
        
    }

    public function testRegisterGuruDuplicate(){
        $guru = new Guru();
        $guru->nip = "23423453";
        $guru->username = "Frieren";
        $guru->name = "Frieren";
        $guru->email = "frieren@gmail.com";
        $guru->password = "Rahasia456";
        $guru->jabatan = "Guru Fisika";
        $guru->tglLahir = "2003-04-12";
        $guru->jenisKelamin = "perempuan";
        $guru->fotoProfil = "asdfasdfa";

        $this->adminRepository->saveGuru($guru);

        $this->expectException(Exception::class);

        $request = new GuruRegisterRequest();
        $request->nip = "23423453";
        $request->username = "Frieren";
        $request->name = "Frieren";
        $request->email = "frieren@gmail.com";
        $request->password = "Rahasia456";
        $request->jabatan = "Guru Fisika";
        $request->tglLahir = "2003-04-12";
        $request->jenisKelamin = "perempuan";
        $request->fotoProfil = "asdfasdfa";

        $this->adminService->registerGuru($request);

    }

    public function testRegisterAdmin(){
        $request =  new AdminRegisterRequest();
        $request->username = "admin";
        $request->name = "admingg";
        $request->password = "admin123";

        $response = $this->adminService->registerAdmin($request);

        self::assertEquals($request->username, $response->admin->username);
        self::assertEquals($request->name, $response->admin->name);
        self::assertTrue(password_verify($request->password, $response->admin->password));
    }

}

