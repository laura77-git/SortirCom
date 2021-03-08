<?php

namespace App\Entity;

use App\Repository\OutingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity(repositoryClass=OutingRepository::class)
 */
class Outing
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

    /**
     * @ORM\Column(type="time")
     */
    private $duration;

    /**
     * @ORM\Column(type="date")
     */
    private $registration_deadline;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_of_registration_max;

    /**
     * @ORM\Column(type="text")
     */
    private $outing_info;

    /**
     * @ORM\Column(type="text")
     */
    private $state;

    
    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="outing")
     */
    private $Users;

    /**
     * @ORM\ManyToOne(targetEntity=State::class, inversedBy="outings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $State;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="outings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity=Campus::class, inversedBy="Outing")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campus;
    private $users;

    /**
     * @var ArrayCollection
     */

    public function __construct()
    {
        $this->Users = new ArrayCollection();
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

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getRegistrationDeadline(): ?int
    {
        return $this->registration_deadline;
    }

    public function setRegistrationDeadline($registration_deadline): self
    {
        $this->registration_deadline = $registration_deadline;

        return $this;
    }

    public function getNumberOfRegistrationMax(): ?int
    {
        return $this->number_of_registration_max;
    }

    public function setNumberOfRegistrationMax(int $number_of_registration_max): self
    {
        $this->number_of_registration_max = $number_of_registration_max;

        return $this;
    }

    public function getOutingInfo(): ?string
    {
        return $this->outing_info;
    }

    public function setOutingInfo(string $outing_info): self
    {
        $this->outing_info = $outing_info;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

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
            $user->addOuting($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeOuting($this);
        }

        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCampus(): ?Campus
    {
        return $this->campus;
    }

    public function setCampus(?Campus $campus): self
    {
        $this->campus = $campus;

        return $this;
    }


}