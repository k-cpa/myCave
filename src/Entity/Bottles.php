<?php

namespace App\Entity;

use App\Repository\BottlesRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BottlesRepository::class)]
#[Vich\Uploadable]
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

    #[ORM\Column(type: 'integer')]
    // Assert pour year
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

    // GESTION DE L'IMAGE

    #[Vich\UploadableField(mapping:'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;
    
    #[ORM\Column(nullable: false)]
    private ?string $imageName = null;

    // Obligatoire car bug avec symfony qui ne prend pas si on change uniquement une image
    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Grapes>
     */
    #[ORM\ManyToMany(targetEntity: Grapes::class)]
    private Collection $grapes;

    #[ORM\ManyToOne(inversedBy: 'bottles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Regions $regions = null;

    public function __construct()
    {
        $this->grapes = new ArrayCollection();
    }

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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void 
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // Si fichier chargé, met à jour la date
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile() : ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Grapes>
     */
    public function getGrapes(): Collection
    {
        return $this->grapes;
    }

    public function addGrape(Grapes $grape): static
    {
        if (!$this->grapes->contains($grape)) {
            $this->grapes->add($grape);
        }

        return $this;
    }

    public function removeGrape(Grapes $grape): static
    {
        $this->grapes->removeElement($grape);

        return $this;
    }

    public function __toString(): string
    {
        return $this->name; // Remplace "name" par le bon champ à afficher
    }

    public function getRegions(): ?Regions
    {
        return $this->regions;
    }

    public function setRegions(?Regions $regions): static
    {
        $this->regions = $regions;

        return $this;
    }

}
