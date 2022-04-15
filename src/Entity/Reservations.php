<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
#[ApiResource()]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $arrival_date;

    #[ORM\Column(type: 'date')]
    private $departure_date;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservations')]
    private $user;

    #[ORM\ManyToOne(targetEntity: Establishments::class, inversedBy: 'reservations')]
    private $establishment;

    #[ORM\ManyToOne(targetEntity: Suites::class, inversedBy: 'reservations')]
    private $suite;



    public function __construct()
    {
        $this->establishment = new ArrayCollection();
        $this->suite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrival_date;
    }

    public function setArrivalDate(\DateTimeInterface $arrival_date): self
    {
        $this->arrival_date = $arrival_date;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEstablishment(): ?Establishments
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishments $establishment): self
    {
        $this->establishment = $establishment;

        return $this;
    }

    public function getSuite(): ?Suites
    {
        return $this->suite;
    }

    public function setSuite(?Suites $suite): self
    {
        $this->suite = $suite;

        return $this;
    }



}
