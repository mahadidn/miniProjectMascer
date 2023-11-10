<?php

namespace Mdn\MiniProjectSekolah\Model;

class Database {
    private static ?\PDO $pdo = null;

    public static function getConnection(): \PDO{
        
        if (self::$pdo == null){
            require_once __DIR__ . '/../../config/database.php';

            $config = getDatabaseConfig();
            self::$pdo = new \PDO(
                $config['database']['url'],
                $config['database']['username'],
                $config['database']['password']
            );
        }
        return self::$pdo;
    }    

}
