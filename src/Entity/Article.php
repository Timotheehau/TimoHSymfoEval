<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $generation = null;

    #[ORM\Column(nullable: true)]
    private ?int $gestation = null;

    #[ORM\Column(nullable: true)]
    private ?int $humeurMax = null;

    #[ORM\Column(nullable: true)]
    private ?int $humeurMin = null;

    #[ORM\Column(nullable: true)]
    private ?int $energie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    // getters et setters
    public function getId(): ?int { return $this->id; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): self { $this->title = $title; return $this; }
    public function getContent(): ?string { return $this->content; }
    public function setContent(string $content): self { $this->content = $content; return $this; }

    public function getGeneration(): ?int { return $this->generation; }
    public function setGeneration(?int $generation): self { $this->generation = $generation; return $this; }
    public function getGestation(): ?int { return $this->gestation; }
    public function setGestation(?int $gestation): self { $this->gestation = $gestation; return $this; }
    public function getHumeurMax(): ?int { return $this->humeurMax; }
    public function setHumeurMax(?int $humeurMax): self { $this->humeurMax = $humeurMax; return $this; }
    public function getHumeurMin(): ?int { return $this->humeurMin; }
    public function setHumeurMin(?int $humeurMin): self { $this->humeurMin = $humeurMin; return $this; }
    public function getEnergie(): ?int { return $this->energie; }
    public function setEnergie(?int $energie): self { $this->energie = $energie; return $this; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }
}
