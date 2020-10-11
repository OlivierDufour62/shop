<?php

namespace App\Entity;

use App\Repository\StickersCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StickersCategoriesRepository::class)
 */
class StickersCategories
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
     * @ORM\Column(type="integer")
     */
    private $importance;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $public_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Stickers::class, mappedBy="StickersCategories")
     */
    private $stickers;

    public function __construct()
    {
        $this->stickers = new ArrayCollection();
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
            $sticker->setStickersCategories($this);
        }

        return $this;
    }

    public function removeSticker(Stickers $sticker): self
    {
        if ($this->stickers->contains($sticker)) {
            $this->stickers->removeElement($sticker);
            // set the owning side to null (unless already changed)
            if ($sticker->getStickersCategories() === $this) {
                $sticker->setStickersCategories(null);
            }
        }

        return $this;
    }
}
