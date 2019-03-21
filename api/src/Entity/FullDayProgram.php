<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\FullDayProgramRepository")
 */
class FullDayProgram
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="json", nullable=true)
     */
    private $included = [];

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="json", nullable=true)
     */
    private $excluded = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tour", inversedBy="program")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tour;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIncluded(): ?array
    {
        return $this->included;
    }

    public function setIncluded(?array $included): self
    {
        $this->included = $included;

        return $this;
    }

    public function getExcluded(): ?array
    {
        return $this->excluded;
    }

    public function setExcluded(?array $excluded): self
    {
        $this->excluded = $excluded;

        return $this;
    }

    public function getTour(): ?Tour
    {
        return $this->tour;
    }

    public function setTour(?Tour $tour): self
    {
        $this->tour = $tour;

        return $this;
    }
}
