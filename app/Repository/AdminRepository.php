<?php

namespace Mdn\MiniProjectSekolah\Repository;

use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Domain\Admin;

class AdminRepository {
    private \PDO $connection;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
    }

    public function findByUsername(string $username): Admin|Guru|null {
        $statementAdmin = $this->connection->prepare("SELECT username, password FROM admin WHERE username = ?");
        $statementAdmin->execute([$username]);

        $statementGuru = $this->connection->prepare("SELECT username, password FROM guru WHERE username = ?");
        $statementGuru->execute([$username]);

        try {
            if($row = $statementAdmin->fetch()){
                $admin = new Admin();
                $admin->username = $row['username'];
                $admin->password = $row['password'];
                return $admin;
            }else if ($row = $statementGuru->fetch()){
                $guru = new Guru();
                $guru->username = $row['username'];
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

    public function saveGuru(Guru $guru): Guru{
        $statement = $this->connection->prepare("INSERT INTO guru(nip, username, name, email, password, jabatan, tanggalLahir, jk, foto_profil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([$guru->nip, $guru->username, $guru->name, $guru->email, $guru->password, $guru->jabatan, $guru->tglLahir, $guru->jenisKelamin, $guru->fotoProfil]);

        return $guru;
    }

    public function saveAdmin(Admin $admin): Admin {
        $statement = $this->connection->prepare("INSERT INTO admin (username, name, password) VALUES (?, ?, ?)");
        $statement->execute([$admin->username, $admin->name, $admin->password]);

        return $admin;
    }

}

