<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EstablishmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentsRepository::class)]
#[ApiResource()]
class Establishments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\OneToMany(mappedBy: 'establishment', targetEntity: Suites::class)]
    private $suites;


    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'establishment')]
    private $user;

    #[ORM\OneToMany(mappedBy: 'establishment', targetEntity: ImagesEstablishments::class, cascade: ['persist'])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'establishment', targetEntity: Reservations::class)]
    private $reservations;




    public function __construct()
    {
        $this->suites = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->images = new ArrayCollection();

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Suites>
     */
    public function getSuites(): Collection|null
    {
        return $this->suites;
    }

    public function addSuite(Suites $suite): self
    {
        if (!$this->suites->contains($suite)) {
            $this->suites[] = $suite;
            $suite->setEstablishment($this);
        }

        return $this;
    }

    public function removeSuite(Suites $suite): self
    {
        if ($this->suites->removeElement($suite)) {
            // set the owning side to null (unless already changed)
            if ($suite->getEstablishment() === $this) {
                $suite->setEstablishment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user = $user;
            $user->addEstablishment($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->removeElement($user)) {
            $user->removeEstablishment($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ImagesEstablishments>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function getMainImage() {
        return $this->images->get(array_rand($this->images->toArray()));
    }

    public function addImage(ImagesEstablishments $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setEstablishment($this);
        }

        return $this;
    }

    public function removeImage(ImagesEstablishments $image): self
    {
        if ($this->images->removeElement($image) ){
            // set the owning side to null (unless already changed)
            if ($image->getEstablishment() === $this) {
                $image->setEstablishment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservations>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setEstablishment($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getEstablishment() === $this) {
                $reservation->setEstablishment(null);
            }
        }

        return $this;
    }





}
