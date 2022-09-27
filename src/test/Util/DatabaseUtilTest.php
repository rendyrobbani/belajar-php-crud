<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Util;

use PHPUnit\Framework\TestCase;

class DatabaseUtilTest extends TestCase
{
    public function testGetConnection()
    {
        $connection = DatabaseUtil::getConnection();
        self::assertNotNull($connection);
    }
}
