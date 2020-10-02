<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
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
    private $reference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $shippedAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userinfo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $items;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $publicId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=Addresses::class, inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $addressId;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="orders")
     */
    private $productId;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $customerNote;

    public function __construct()
    {
        $this->productId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getShippedAt(): ?\DateTimeInterface
    {
        return $this->shippedAt;
    }

    public function setShippedAt(?\DateTimeInterface $shippedAt): self
    {
        $this->shippedAt = $shippedAt;

        return $this;
    }

    public function getUserinfo(): ?string
    {
        return $this->userinfo;
    }

    public function setUserinfo(string $userinfo): self
    {
        $this->userinfo = $userinfo;

        return $this;
    }

    public function getItems(): ?string
    {
        return $this->items;
    }

    public function setItems(string $items): self
    {
        $this->items = $items;

        return $this;
    }

    public function getPublicId(): ?string
    {
        return $this->publicId;
    }

    public function setPublicId(string $publicId): self
    {
        $this->publicId = $publicId;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getAddressId(): ?Addresses
    {
        return $this->addressId;
    }

    public function setAddressId(?Addresses $addressId): self
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProductId(): Collection
    {
        return $this->productId;
    }

    public function addProductId(Products $productId): self
    {
        if (!$this->productId->contains($productId)) {
            $this->productId[] = $productId;
            $productId->setOrders($this);
        }

        return $this;
    }

    public function removeProductId(Products $productId): self
    {
        if ($this->productId->contains($productId)) {
            $this->productId->removeElement($productId);
            // set the owning side to null (unless already changed)
            if ($productId->getOrders() === $this) {
                $productId->setOrders(null);
            }
        }

        return $this;
    }

    public function getCustomerNote(): ?string
    {
        return $this->customerNote;
    }

    public function setCustomerNote(?string $customerNote): self
    {
        $this->customerNote = $customerNote;

        return $this;
    }
}
