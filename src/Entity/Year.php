<?php

namespace App\Entity;

use App\Repository\YearRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: YearRepository::class)]
class Year
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 1800, // Année minimale
        notInRangeMessage: 'L\'année doit être comprise entre {{ min }} et l\'année en cours'
    )]
    private ?int $year = null;

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

    public function getId(): ?int
    {
        return $this->id;
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
}
