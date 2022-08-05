<?php  

declare(strict_types=1);

namespace App\Database;

class DB
{
    protected static ?\PDO $pdo = null;
    
    public static function getInstance(): \PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO(
                'mysql:host=sql11.freesqldatabase.com;dbname=sql11510912',
                'sql11510912',
                'jGv4yKcHnT'
            );
        }

        return self::$pdo;
    }
}