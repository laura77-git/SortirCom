<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
{
    // j'ai créee une constante pour les noms des campus pour récupérer
    // les noms des campus dans la liste déroulante du formulaire d'inscription
    const NAME = [
        1 => 'Saint Herblain',
        2 => 'Chartres De Bretagne',
        3 => 'La Roche su yon'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="campus", orphanRemoval=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Outing::class, mappedBy="campus", orphanRemoval=true)
     */
    private $Outing;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->Outing = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setCampus($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCampus() === $this) {
                $user->setCampus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Outing[]
     */
    public function getOuting(): Collection
    {
        return $this->Outing;
    }

    public function addOuting(Outing $outing): self
    {
        if (!$this->Outing->contains($outing)) {
            $this->Outing[] = $outing;
            $outing->setCampus($this);
        }

        return $this;
    }

    public function removeOuting(Outing $outing): self
    {
        if ($this->Outing->removeElement($outing)) {
            // set the owning side to null (unless already changed)
            if ($outing->getCampus() === $this) {
                $outing->setCampus(null);
            }
        }

        return $this;
    }

}






