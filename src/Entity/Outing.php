<?php

namespace App\Entity;

use App\Repository\OutingRepository;
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="Outing")
     */
    private $state;

    /**
     * @param mixed $state
     *
     * @return Outing
     */
    public function setState($state): Outing
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /** @ORM\ManyToOne(targetEntity="App\Entity\Location", inversedBy="Outing") */
    private $location;

    /**
     * @param mixed $location
     *
     * @return Outing
     */
    public function setLocation($location): Outing
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
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

    public function getRegistrationDeadline():?int
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


}
