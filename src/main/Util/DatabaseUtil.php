<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Util;

use RendyRobbani\PHP\Belajar\CRUD\Config\DatabaseConfig;

class DatabaseUtil
{
    /**
     * @var \PDO|null
     */
    private static ?\PDO $connection = null;

    /**
     * @return \PDO|null
     */
    public static function getConnection(): ?\PDO
    {
        if (self::$connection == null) {
            $config = DatabaseConfig::getConfig();
            self::$connection = new \PDO("{$config['DB_CONN']}:host={$config['DB_HOST']}:{$config['DB_PORT']};dbname={$config['DB_NAME']}", $config['DB_USER'], $config['DB_PASS']);
        }
        return self::$connection;
    }
}