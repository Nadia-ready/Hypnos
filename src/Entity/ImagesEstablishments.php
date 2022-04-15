<?php

namespace App\Entity;

use App\Repository\ImagesEstablishmentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesEstablishmentsRepository::class)]
class ImagesEstablishments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Establishments::class, inversedBy: 'image')]
    private $establishment;

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

    public function getEstablishment(): ?Establishments
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishments $establishment): self
    {
        $this->establishment = $establishment;

        return $this;
    }

    public function __toString() {
        return "/uploads/" . $this->name;
    }
}
