<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Config;

use PHPUnit\Framework\TestCase;

class DatabaseConfigTest extends TestCase
{
    public function testGetConfig()
    {
        $config = DatabaseConfig::getConfig();
        self::assertNotNull($config);
        self::assertEquals('mysql', $config['DB_CONN']);
        self::assertEquals('localhost', $config['DB_HOST']);
        self::assertEquals('3306', $config['DB_PORT']);
        self::assertEquals('belajar_crud', $config['DB_NAME']);
        self::assertEquals('root', $config['DB_USER']);
        self::assertEquals('', $config['DB_PASS']);
    }
}
