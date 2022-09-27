<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Repository;

use RendyRobbani\PHP\Belajar\CRUD\Entity\User;

class UserRepositoryImpl implements UserRepository
{
    /**
     * @var \PDO
     */
    private \PDO $connection;

    /**
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    function findAll(): array
    {
        $users = [];
        $query = 'SELECT id, nama, tanggal_lahir FROM user';
        $statement = $this->connection->query($query);
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $user = new User();
            $user->setId($row['id']);
            $user->setNama($row['nama']);
            $user->setTanggalLahir(new \DateTime($row['tanggal_lahir']));
            $users[] = $user;
        }
        return $users;
    }

    /**
     * @inheritDoc
     */
    function findById(int $id): ?User
    {
        $query = 'SELECT id, nama, tanggal_lahir FROM user WHERE id=?';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);
        if (!$result) return null;
        $user = new User();
        $user->setId($result['id']);
        $user->setNama($result['nama']);
        $user->setTanggalLahir(new \DateTime($result['tanggal_lahir']));
        return $user;
    }

    /**
     * @inheritDoc
     */
    function save(User $user): void
    {
        $query = 'INSERT INTO user (nama, tanggal_lahir) VALUES (?,?)';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $user->getNama());
        $statement->bindValue(2, date_format($user->getTanggalLahir(), 'Y-m-d'));
        $statement->execute();
        $user->setId($this->connection->lastInsertId());
    }

    /**
     * @inheritDoc
     */
    function update(User $user): void
    {
        $query = 'UPDATE user SET nama=?, tanggal_lahir=? WHERE id=?';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $user->getNama());
        $statement->bindValue(2, date_format($user->getTanggalLahir(), 'Y-m-d'));
        $statement->bindValue(3, $user->getId(), \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @inheritDoc
     */
    function delete(int $id): void
    {
        $query = 'DELETE FROM user WHERE id=?';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    /**
     * @inheritDoc
     */
    function deleteAll(): void
    {
        $query = 'DELETE FROM user';
        $this->connection->exec($query);
    }

    /**
     * @inheritDoc
     */
    function resetAutoIncrement(): void
    {
        $query = 'ALTER TABLE user AUTO_INCREMENT=0';
        $this->connection->exec($query);
    }
}