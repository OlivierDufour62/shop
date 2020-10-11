<?php

namespace App\Entity;

use App\Repository\StickersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StickersRepository::class)
 */
class Stickers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $size_multiplier;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $public_id;

    /**
     * @ORM\ManyToOne(targetEntity=StickersCategories::class, inversedBy="stickers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $StickersCategories;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="stickers")
     */
    private $products;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $reference;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSizeMultiplier(): ?float
    {
        return $this->size_multiplier;
    }

    public function setSizeMultiplier(float $size_multiplier): self
    {
        $this->size_multiplier = $size_multiplier;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPublicId(): ?string
    {
        return $this->public_id;
    }

    public function setPublicId(string $public_id): self
    {
        $this->public_id = $public_id;

        return $this;
    }

    public function getStickersCategories(): ?StickersCategories
    {
        return $this->StickersCategories;
    }

    public function setStickersCategories(?StickersCategories $StickersCategories): self
    {
        $this->StickersCategories = $StickersCategories;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
}
