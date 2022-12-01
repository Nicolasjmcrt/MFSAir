<?php

namespace App\Entity;

use App\Repository\TownRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TownRepository::class)]
class Town
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $Name = null;

    #[ORM\Column(length: 64)]
    private ?string $state = null;

    #[ORM\OneToMany(mappedBy: 'town', targetEntity: Airport::class)]
    private Collection $airports;

    public function __construct()
    {
        $this->airports = new ArrayCollection();
    }

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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection<int, Airport>
     */
    public function getAirports(): Collection
    {
        return $this->airports;
    }

    public function addAirport(Airport $airport): self
    {
        if (!$this->airports->contains($airport)) {
            $this->airports->add($airport);
            $airport->setTown($this);
        }

        return $this;
    }

    public function removeAirport(Airport $airport): self
    {
        if ($this->airports->removeElement($airport)) {
            // set the owning side to null (unless already changed)
            if ($airport->getTown() === $this) {
                $airport->setTown(null);
            }
        }

        return $this;
    }
}
