<?php

namespace App\Entity;

use App\Repository\CellarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CellarsRepository::class)]
class Cellars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'cellars', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    /**
     * @var Collection<int, Bottles>
     */
    #[ORM\OneToMany(targetEntity: Bottles::class, mappedBy: 'cellar', orphanRemoval: true)]
    private Collection $bottles;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    /**
     * @var Collection<int, Ratings>
     */
    #[ORM\OneToMany(targetEntity: Ratings::class, mappedBy: 'cellar', orphanRemoval: true)]
    private Collection $ratings;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;


    public function __construct()
    {
        $this->bottles = new ArrayCollection();
        $this->created_at = new \DateTimeImmutable();
        $this->ratings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Bottles>
     */
    public function getBottles(): Collection
    {
        return $this->bottles;
    }

    public function addBottle(Bottles $bottle): static
    {
        if (!$this->bottles->contains($bottle)) {
            $this->bottles->add($bottle);
            $bottle->setCellar($this);
        }

        return $this;
    }

    public function removeBottle(Bottles $bottle): static
    {
        if ($this->bottles->removeElement($bottle)) {
            // set the owning side to null (unless already changed)
            if ($bottle->getCellar() === $this) {
                $bottle->setCellar(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->user; 
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Ratings>
     */
    public function getRatings(): Collection
    {
        return $this->ratings;
    }

    public function addRating(Ratings $rating): static
    {
        if (!$this->ratings->contains($rating)) {
            $this->ratings->add($rating);
            $rating->setCellar($this);
        }

        return $this;
    }

    public function removeRating(Ratings $rating): static
    {
        if ($this->ratings->removeElement($rating)) {
            // set the owning side to null (unless already changed)
            if ($rating->getCellar() === $this) {
                $rating->setCellar(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
