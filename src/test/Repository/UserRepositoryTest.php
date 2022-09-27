<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Repository;

use PHPUnit\Framework\TestCase;
use RendyRobbani\PHP\Belajar\CRUD\Entity\User;
use RendyRobbani\PHP\Belajar\CRUD\Util\DatabaseUtil;

class UserRepositoryTest extends TestCase
{
    private static ?\PDO $connection;

    private static ?UserRepository $repository;

    public static function setUpBeforeClass(): void
    {
        self::$connection = DatabaseUtil::getConnection();
        self::$repository = new UserRepositoryImpl(self::$connection);
    }

    public static function tearDownAfterClass(): void
    {
        self::$repository = null;
        self::$connection = null;
    }

    public function testDeleteAll()
    {
        self::$repository->deleteAll();
        self::assertTrue(true);
    }

    public function testResetAutoIncrement()
    {
        self::$repository->resetAutoIncrement();
        self::assertTrue(true);
    }

    public function testSave()
    {
        $user = new User();
        $user->setNama('Rendy');
        $user->setTanggalLahir(new \DateTime('1995-10-17'));
        self::$repository->save($user);
        self::assertNotNull($user->getId());
    }

    public function testFindById()
    {
        $user = self::$repository->findById(1);
        self::assertNotNull($user);
        self::assertEquals(1, $user->getId());
        self::assertEquals('Rendy', $user->getNama());
        self::assertEquals('1995-10-17', date_format($user->getTanggalLahir(), 'Y-m-d'));
    }

    public function testUpdate()
    {
        $before = self::$repository->findById(1);
        $before->setNama('Rendy Robbani');
        self::$repository->update($before);
        $after = self::$repository->findById(1);
        self::assertEquals($before->getId(), $after->getId());
        self::assertEquals($before->getNama(), $after->getNama());
        self::assertEquals($before->getTanggalLahir(), $after->getTanggalLahir());
    }

    public function testFindAll()
    {
        $users = self::$repository->findAll();
        self::assertEquals(1, sizeof($users));
    }

    public function testDelete()
    {
        self::$repository->delete(1);
        $user = self::$repository->findById(1);
        self::assertNull($user);
    }
}
