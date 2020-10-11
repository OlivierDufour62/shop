<?php

namespace App\Entity;

use App\Repository\ColoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColoursRepository::class)
 */
class Colours
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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $importance;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $public_id;

    /**
     * @ORM\OneToMany(targetEntity=ProductsColours::class, mappedBy="colours")
     */
    private $productsColours;

    public function __construct()
    {
        $this->productsColours = new ArrayCollection();
    }

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

    public function getImportance(): ?int
    {
        return $this->importance;
    }

    public function setImportance(int $importance): self
    {
        $this->importance = $importance;

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

    /**
     * @return Collection|ProductsColours[]
     */
    public function getProductsColours(): Collection
    {
        return $this->productsColours;
    }

    public function addProductsColour(ProductsColours $productsColour): self
    {
        if (!$this->productsColours->contains($productsColour)) {
            $this->productsColours[] = $productsColour;
            $productsColour->setColours($this);
        }

        return $this;
    }

    public function removeProductsColour(ProductsColours $productsColour): self
    {
        if ($this->productsColours->contains($productsColour)) {
            $this->productsColours->removeElement($productsColour);
            // set the owning side to null (unless already changed)
            if ($productsColour->getColours() === $this) {
                $productsColour->setColours(null);
            }
        }

        return $this;
    }
}
