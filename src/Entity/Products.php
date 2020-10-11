<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Groups({"product"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $sellPrice;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $buyPrice;

    /**
     * @ORM\Column(type="float")
     * @Groups({"product"})
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=5)
     * @Groups({"product"})
     */
    private $discount;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups({"product"})
     */
    private $customizable;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"product"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"product"})
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $numberBuy;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"product"})
     */
    private $hidden;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $importance;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"product"})
     */
    private $searchQueryTerms;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"product"})
     */
    private $internalReference;

    /**
     * @ORM\Column(type="string", length=30)
     * @Groups({"product"})
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="productId")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"product"})
     */
    private $orders;

    /**
     * @ORM\ManyToOne(targetEntity=SubCategories::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"subcat"})
     */
    private $subCategoryId;

    /**
     * @ORM\OneToMany(targetEntity=Stickers::class, mappedBy="products")
     */
    private $stickers;

    /**
     * @ORM\OneToMany(targetEntity=ProductsColours::class, mappedBy="products")
     */
    private $productsColours;

    public function __construct()
    {
        $this->setImportance(10);
        $this->setHidden(true);
        $this->setCreatedAt(new \DateTime('now'));
        $this->setUpdatedAt(new \DateTime('now'));
        $this->stickers = new ArrayCollection();
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

    public function getSellPrice(): ?int
    {
        return $this->sellPrice;
    }

    public function setSellPrice(int $sellPrice): self
    {
        $this->sellPrice = $sellPrice;

        return $this;
    }

    public function getBuyPrice(): ?int
    {
        return $this->buyPrice;
    }

    public function setBuyPrice(int $buyPrice): self
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    public function getStock(): ?float
    {
        return $this->stock;
    }

    public function setStock(float $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getCustomizable(): ?string
    {
        return $this->customizable;
    }

    public function setCustomizable(?string $customizable): self
    {
        $this->customizable = $customizable;

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

    public function getNumberBuy(): ?int
    {
        return $this->numberBuy;
    }

    public function setNumberBuy(int $numberBuy): self
    {
        $this->numberBuy = $numberBuy;

        return $this;
    }

    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): self
    {
        $this->hidden = $hidden;

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

    public function getSearchQueryTerms(): ?string
    {
        return $this->searchQueryTerms;
    }

    public function setSearchQueryTerms(string $searchQueryTerms): self
    {
        $this->searchQueryTerms = $searchQueryTerms;

        return $this;
    }

    public function getInternalReference(): ?string
    {
        return $this->internalReference;
    }

    public function setInternalReference(string $internalReference): self
    {
        $this->internalReference = $internalReference;

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

    public function getOrders(): ?Orders
    {
        return $this->orders;
    }

    public function setOrders(?Orders $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getSubCategoryId(): ?SubCategories
    {
        return $this->subCategoryId;
    }

    public function setSubCategoryId(?SubCategories $subCategoryId): self
    {
        $this->subCategoryId = $subCategoryId;

        return $this;
    }

    /**
     * @return Collection|Stickers[]
     */
    public function getStickers(): Collection
    {
        return $this->stickers;
    }

    public function addSticker(Stickers $sticker): self
    {
        if (!$this->stickers->contains($sticker)) {
            $this->stickers[] = $sticker;
            $sticker->setProducts($this);
        }

        return $this;
    }

    public function removeSticker(Stickers $sticker): self
    {
        if ($this->stickers->contains($sticker)) {
            $this->stickers->removeElement($sticker);
            // set the owning side to null (unless already changed)
            if ($sticker->getProducts() === $this) {
                $sticker->setProducts(null);
            }
        }

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
            $productsColour->setProducts($this);
        }

        return $this;
    }

    public function removeProductsColour(ProductsColours $productsColour): self
    {
        if ($this->productsColours->contains($productsColour)) {
            $this->productsColours->removeElement($productsColour);
            // set the owning side to null (unless already changed)
            if ($productsColour->getProducts() === $this) {
                $productsColour->setProducts(null);
            }
        }

        return $this;
    }
}
