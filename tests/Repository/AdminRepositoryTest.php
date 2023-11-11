<?php

namespace Mdn\MiniProjectSekolah\Repository;

use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use PHPUnit\Framework\TestCase;

class AdminRepositoryTest extends TestCase {
    private AdminRepository $adminRepository;

    protected function setUp(): void{
        $this->adminRepository = new AdminRepository(Database::getConnection());
    }

    public function testSaveGuruSuccess(){
        $guru = new Guru();
        $guru->nip = "123123123";
        $guru->username = "nugraha";
        $guru->name = "Mahadi Dwi Nugraha";
        $guru->email = "mahadi@gmail.com";
        $guru->password = "rahasia";
        $guru->jabatan = "Kepala TIK";
        $guru->tglLahir = "2003-08-30";
        $guru->jenisKelamin = "laki-laki";
        $guru->fotoProfil = "asdasa";
        
        $result = $this->adminRepository->saveGuru($guru);
        
        self::assertEquals($guru->nip, $result->nip);
        self::assertEquals($guru->name, $result->name);
    }

    public function testAdminSuccess(){
        $admin = new Admin();
        $admin->username = "admin";
        $admin->name = "admin 123";
        $admin->password = "rahasia admin";

        $result = $this->adminRepository->saveAdmin($admin);
        self::assertEquals($admin->username, $result->username);
        self::assertEquals($admin->password, $result->password);
    }

    public function testFindByUsername(){
        $guru = $this->adminRepository->findByUsername("mahadi");
        self::assertEquals("mahadi", $guru->username);
    }

}
