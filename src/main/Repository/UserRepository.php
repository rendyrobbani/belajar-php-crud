<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Repository;

use RendyRobbani\PHP\Belajar\CRUD\Entity\User;

interface UserRepository
{
    /**
     * @return User[]
     * @throws \Throwable
     */
    function findAll(): array;

    /**
     * @param int $id
     * @return User|null
     * @throws \Throwable
     */
    function findById(int $id): ?User;

    /**
     * @param User $user
     * @return void
     * @throws \Throwable
     */
    function save(User $user): void;

    /**
     * @param User $user
     * @return void
     * @throws \Throwable
     */
    function update(User $user): void;

    /**
     * @param int $id
     * @return void
     * @throws \Throwable
     */
    function delete(int $id): void;

    /**
     * @return void
     * @throws \Throwable
     */
    function deleteAll(): void;

    /**
     * @return void
     * @throws \Throwable
     */
    function resetAutoIncrement(): void;
}