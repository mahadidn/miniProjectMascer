<?php

namespace Mdn\MiniProjectSekolah\Repository;

use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;

class LoginRepository {
    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
    }

    public function findByUsername(string $username): Admin|Guru|null{
        $statementAdmin = $this->connection->prepare("SELECT username, name, password FROM admin WHERE username = ?");
        $statementAdmin->execute([$username]);

        $statementGuru = $this->connection->prepare("SELECT username, nip, name, email, jabatan, tanggalLahir, jk, foto_profil, password FROM guru WHERE username = ?");
        $statementGuru->execute([$username]);

        try {
            if($row = $statementAdmin->fetch()){
                $admin = new Admin();
                $admin->username = $row['username'];
                $admin->name = $row['name'];
                $admin->password = $row['password'];
                return $admin;
            }else if ($row = $statementGuru->fetch()){
                $guru = new Guru();
                $guru->username = $row['username'];
                $guru->email = $row['email'];
                $guru->nip = $row['nip'];
                $guru->name = $row['name'];
                $guru->jenisKelamin = $row['jk'];
                $guru->jabatan = $row['jabatan'];
                $guru->tglLahir = $row['tanggalLahir'];
                $guru->fotoProfil = $row['foto_profil'];
                $guru->password = $row['password'];
                return $guru;
            }else {
                return null;
            }
        }finally {
            $statementAdmin->closeCursor();
            $statementGuru->closeCursor();
        }

    }

}
