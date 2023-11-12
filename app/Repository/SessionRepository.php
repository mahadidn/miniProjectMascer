<?php

namespace Mdn\MiniProjectSekolah\Repository;

use Mdn\MiniProjectSekolah\Model\Domain\Session;
use Mdn\MiniProjectSekolah\Model\Domain\SessionAdmin;
use Mdn\MiniProjectSekolah\Model\Domain\SessionGuru;

class SessionRepository {

    private \PDO $connection;
    private LoginRepository $loginRepository;

    public function __construct(\PDO $connection){
        $this->connection = $connection;
        $this->loginRepository = new LoginRepository($connection);
    }

    public function save(SessionGuru|SessionAdmin $session): SessionGuru|SessionAdmin {

        if($session->userType == "admin") {

            $statementAdmin = $this->connection->prepare("INSERT INTO sessionsAdmin(usernameSession ,userId) VALUES (?, ?)");
            $statementAdmin->execute([$session->usernameSession, $session->userId]);
            $session->userType = "admin";

            return $session;
        }else if($session->userType == "guru"){
            $statementGuru = $this->connection->prepare("INSERT INTO sessionsGuru(usernameSession, userId) VALUES (?, ?)");
            $statementGuru->execute([$session->usernameSession, $session->userId]);
            $session->userType = "guru";

            return $session;
        }
    }

    public function findByUserId(string $userId): SessionAdmin|SessionGuru|null {
        $statementAdmin = $this->connection->prepare("SELECT usernameSession, userId FROM sessionsAdmin WHERE userId = ?");
        $statementAdmin->execute([$userId]);

        $statementGuru = $this->connection->prepare("SELECT usernameSession, userId FROM sessionsGuru WHERE userId = ?");
        $statementGuru->execute([$userId]);

        try {
            if($row = $statementAdmin->fetch()){
                $session = new SessionAdmin();
                $session->usernameSession = $row['usernameSession'];
                $session->userType = "admin";
                $session->userId = $row['userId'];
                return $session;
            }
            if ($row = $statementGuru->fetch()){
                $session = new SessionGuru();
                $session->usernameSession = $row['usernameSession'];
                $session->userType = "guru";
                $session->userId = $row['userId'];
                return $session;
            }else {
                return null;
            }

        }finally {
            $statementAdmin->closeCursor();
            $statementGuru->closeCursor();
        }

    }
    
    public function deleteByUserId(string $userId): void {
        $result = $this->findByUserId($userId);

        if($result->userType == "admin"){
            $statementAdmin = $this->connection->prepare("DELETE FROM sessionsAdmin WHERE userId = ?");
            $statementAdmin->execute([$userId]);
        }else if($result->userType == "guru"){
            $statementGuru = $this->connection->prepare("DELETE FROM sessionsGuru WHERE userId = ?");
            $statementGuru->execute([$userId]);
        }
    }

    public function deleteAll(): void {
        $this->connection->exec("DELETE FROM sessionsAdmin");
        $this->connection->exec("DELETE FROM sessionsGuru");
    }
}

