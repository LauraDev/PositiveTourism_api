<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="text")
     */
    private $mapUrl;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @Groups({"tour"})
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMapUrl(): ?string
    {
        return $this->mapUrl;
    }

    public function setMapUrl(string $mapUrl): self
    {
        $this->mapUrl = $mapUrl;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }
}
