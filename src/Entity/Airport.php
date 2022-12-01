<?php

namespace App\Entity;

use App\Repository\AirportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AirportRepository::class)]
class Airport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $Name = null;

    #[ORM\Column]
    private ?int $runways_number = null;

    #[ORM\ManyToOne(inversedBy: 'airports')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Town $town = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getRunwaysNumber(): ?int
    {
        return $this->runways_number;
    }

    public function setRunwaysNumber(int $runways_number): self
    {
        $this->runways_number = $runways_number;

        return $this;
    }

    public function getTown(): ?Town
    {
        return $this->town;
    }

    public function setTown(?Town $town): self
    {
        $this->town = $town;

        return $this;
    }
}
