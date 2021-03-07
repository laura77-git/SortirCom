<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /** @ORM\OneToMany(targetEntity="App\Entity\Outing", mappedBy="Campus") */
    private $outing;

    /**
     * @param mixed $outing
     *
     * @return Campus
     */
    public function setOuting($outing): Campus
    {
        $this->outing = $outing;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOuting()
    {
        return $this->outing;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
