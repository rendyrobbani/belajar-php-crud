<?php

namespace RendyRobbani\PHP\Belajar\CRUD\Entity;

class User
{
    /**
     * @var int|null
     */
    private ?int $id = null;

    /**
     * @var string|null
     */
    private ?string $nama = null;

    /**
     * @var \DateTime|null
     */
    private ?\DateTime $tanggalLahir = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getNama(): ?string
    {
        return $this->nama;
    }

    /**
     * @param string|null $nama
     */
    public function setNama(?string $nama): void
    {
        $this->nama = $nama;
    }

    /**
     * @return \DateTime|null
     */
    public function getTanggalLahir(): ?\DateTime
    {
        return $this->tanggalLahir;
    }

    /**
     * @param \DateTime|null $tanggalLahir
     */
    public function setTanggalLahir(?\DateTime $tanggalLahir): void
    {
        $this->tanggalLahir = $tanggalLahir;
    }
}