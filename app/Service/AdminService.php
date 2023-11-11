<?php

namespace Mdn\MiniProjectSekolah\Service;

use Exception;
use Mdn\MiniProjectSekolah\Model\Admin\AdminRegisterRequest;
use Mdn\MiniProjectSekolah\Model\Admin\AdminRegisterResponse;
use Mdn\MiniProjectSekolah\Model\Database;
use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Guru\GuruRegisterRequest;
use Mdn\MiniProjectSekolah\Model\Guru\GuruRegisterResponse;
use Mdn\MiniProjectSekolah\Repository\AdminRepository;

class AdminService {
    private AdminRepository $adminRepository;

    public function __construct(AdminRepository $adminRepository){
        $this->adminRepository = $adminRepository;
    }

    // bikin akun guru
    public function registerGuru(GuruRegisterRequest $request): GuruRegisterResponse{

        $this->validateGuruRegistRequest($request);

        try {
            Database::beginTransaction();
            $guru = $this->adminRepository->findByUsername($request->username);
            if ($guru != null){
                throw new Exception("Username sudah digunakan!");
            }

            $guru = new Guru();
            $guru->nip = $request->nip;
            $guru->username = $request->username;
            $guru->name = $request->name;
            $guru->email = $request->email;
            $guru->password = password_hash($request->password, PASSWORD_BCRYPT);
            $guru->jabatan = $request->jabatan;
            $guru->tglLahir = $request->tglLahir;
            $guru->jenisKelamin = $request->jenisKelamin;
            $guru->fotoProfil = $request->fotoProfil;

            $this->adminRepository->saveGuru($guru);

            $response = new GuruRegisterResponse();
            $response->guru = $guru;
            Database::commitTransaction();
            return $response;
        }catch(\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }

    }

    private function validateGuruRegistRequest(GuruRegisterRequest $request){
        if($request->username == null || $request->name == null || $request->password == null || trim($request->username) == "" || trim($request->name) == "" || trim($request->password) == ""){
            throw new Exception("Username, Nama dan Password tidak boleh kosong!");
        }
    }

    public function registerAdmin(AdminRegisterRequest $request): AdminRegisterResponse {
        $this->validateAdminRegistRequest($request);

        try {
            Database::beginTransaction();
            $admin = $this->adminRepository->findByUsername($request->username);
            if ($admin != null){
                throw new Exception("Username sudah digunakan!");
            }

            $admin = new Admin();
            $admin->username = $request->username;
            $admin->name = $request->name;
            $admin->password = password_hash($request->password, PASSWORD_BCRYPT);

            $this->adminRepository->saveAdmin($admin);
            
            $response = new AdminRegisterResponse();
            $response->admin = $admin;
            Database::commitTransaction();
            return $response;
        }catch(\Exception $exception){
            Database::rollbackTransaction();
            throw $exception;
        }

    }

    private function validateAdminRegistRequest(AdminRegisterRequest $request){
        if($request->username == null || $request->name == null || $request->password == null 
            || trim($request->username) == "" || trim($request->name) == "" || trim($request->password) == ""){
                throw new Exception("Username, Nama dan Password tidak boleh kosong!");
            }
    }
}

