<?php

namespace App\Entity;

use App\Repository\ImagesSuitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesSuitesRepository::class)]
class ImagesSuites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: Suites::class, inversedBy: 'image')]
    private $suite;

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
