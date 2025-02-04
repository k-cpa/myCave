<?php

namespace App\Entity;

use App\Repository\BottlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: BottlesRepository::class)]
class Bottles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'bottles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cellars $cellar = null;

    #[ORM\ManyToOne(inversedBy: 'bottles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Grapes $grapes = null;

    #[ORM\Column(type: 'integer')]
    private ?int $year = null;

    // Assert pour year
    #[Assert\Range(
        min: 1800, // Année minimale
        notInRangeMessage: 'L\'année doit être comprise entre {{ min }} et l\'année en cours'
    )]
    #[Assert\Callback]
    public function validateYear(ExecutionContextInterface $context): void
    {
        $currentYear = (int) date('Y');
        if ($this->year > $currentYear) {
            $context->buildViolation('L\'année ne peut pas être supérieure à ' . $currentYear . '.')
                ->atPath('year')
                ->addViolation();
        }
    }

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCellar(): ?Cellars
    {
        return $this->cellar;
    }

    public function setCellar(?Cellars $cellar): static
    {
        $this->cellar = $cellar;

        return $this;
    }

    public function getGrapes(): ?Grapes
    {
        return $this->grapes;
    }

    public function setGrapes(?Grapes $grapes): static
    {
        $this->grapes = $grapes;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
