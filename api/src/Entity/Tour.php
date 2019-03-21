<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(normalizationContext={"groups"={"tour"}})
 * @ApiFilter(BooleanFilter::class, properties={"isValidated"})
 * @ORM\Entity(repositoryClass="App\Repository\TourRepository")
 */
class Tour
{
    /**
     * @Groups({"tour"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text", nullable=true)
     */
    private $clientBenefits;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text", nullable=true)
     */
    private $communityBenefits;

    /**
     * @Groups({"tour"})
     * @ORM\OneToOne(targetEntity="App\Entity\Contact", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $duration;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="boolean")
     */
    private $isValidated;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $overviewImage;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $overviewTitle;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $overviewSubtitle;

    /**
     * @Groups({"tour"})
     * @ORM\OneToMany(targetEntity="App\Entity\Pictures", mappedBy="tour", orphanRemoval=true)
     */
    private $pictures;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $price;

    /**
     * @Groups({"tour"})
     * @ORM\OneToMany(targetEntity="App\Entity\FullDayProgram", mappedBy="tour", orphanRemoval=true)
     */
    private $program;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $volunteering;

    public function __construct()
    {
        $this->isValidated = false;
        $this->pictures = new ArrayCollection();
        $this->program = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientBenefits(): ?string
    {
        return $this->clientBenefits;
    }

    public function setClientBenefits(?string $clientBenefits): self
    {
        $this->clientBenefits = $clientBenefits;

        return $this;
    }

    public function getCommunityBenefits(): ?string
    {
        return $this->communityBenefits;
    }

    public function setCommunityBenefits(?string $communityBenefits): self
    {
        $this->communityBenefits = $communityBenefits;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
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

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getIsValidated(): ?bool
    {
        return $this->isValidated;
    }

    public function setIsValidated(bool $isValidated): self
    {
        $this->isValidated = $isValidated;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
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

    public function getOverviewImage(): ?string
    {
        return $this->overviewImage;
    }

    public function setOverviewImage(string $overviewImage): self
    {
        $this->overviewImage = $overviewImage;

        return $this;
    }

    public function getOverviewTitle(): ?string
    {
        return $this->overviewTitle;
    }

    public function setOverviewTitle(?string $overviewTitle): self
    {
        $this->overviewTitle = $overviewTitle;

        return $this;
    }

    public function getOverviewSubtitle(): ?string
    {
        return $this->overviewSubtitle;
    }

    public function setOverviewSubtitle(?string $overviewSubtitle): self
    {
        $this->overviewSubtitle = $overviewSubtitle;

        return $this;
    }

    /**
     * @return Collection|Pictures[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setTour($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getTour() === $this) {
                $picture->setTour(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|FullDayProgram[]
     */
    public function getProgram(): Collection
    {
        return $this->program;
    }

    public function addProgram(FullDayProgram $program): self
    {
        if (!$this->program->contains($program)) {
            $this->program[] = $program;
            $program->setTour($this);
        }

        return $this;
    }

    public function removeProgram(FullDayProgram $program): self
    {
        if ($this->program->contains($program)) {
            $this->program->removeElement($program);
            // set the owning side to null (unless already changed)
            if ($program->getTour() === $this) {
                $program->setTour(null);
            }
        }

        return $this;
    }

    public function getVolunteering(): ?string
    {
        return $this->volunteering;
    }

    public function setVolunteering(?string $volunteering): self
    {
        $this->volunteering = $volunteering;

        return $this;
    }
}
