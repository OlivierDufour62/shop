<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     * @Groups({"users"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=40)
     * @Groups({"users"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"users"})
     */
    private $phonenumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $lastconnect;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $lastbuy;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $lastip;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lastaddressId;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $numberorder;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $favpaymentmode;

    /**
     * @ORM\Column(type="string", length=80)
     * @Groups({"users"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     * @Groups({"users"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups({"users"})
     */
    private $pseudo;

    /**
     * @ORM\OneToMany(targetEntity=Addresses::class, mappedBy="user_id",cascade={"persist"})
     * @Groups({"address"})
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="userId")
     */
    private $orders;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
        $this->setUpdatedAt(new \DateTime('now'));
        $this->addresses = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

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

    public function getLastconnect(): ?\DateTimeInterface
    {
        return $this->lastconnect;
    }

    public function setLastconnect(?\DateTimeInterface $lastconnect): self
    {
        $this->lastconnect = $lastconnect;

        return $this;
    }

    public function getLastbuy(): ?\DateTimeInterface
    {
        return $this->lastbuy;
    }

    public function setLastbuy(?\DateTimeInterface $lastbuy): self
    {
        $this->lastbuy = $lastbuy;

        return $this;
    }

    public function getLastip(): ?string
    {
        return $this->lastip;
    }

    public function setLastip(?string $lastip): self
    {
        $this->lastip = $lastip;

        return $this;
    }

    public function getLastaddressId(): ?int
    {
        return $this->lastaddressId;
    }

    public function setLastaddressId(?int $lastaddressId): self
    {
        $this->lastaddressId = $lastaddressId;

        return $this;
    }

    public function getNumberorder(): ?string
    {
        return $this->numberorder;
    }

    public function setNumberorder(?string $numberorder): self
    {
        $this->numberorder = $numberorder;

        return $this;
    }

    public function getFavpaymentmode(): ?string
    {
        return $this->favpaymentmode;
    }

    public function setFavpaymentmode(?string $favpaymentmode): self
    {
        $this->favpaymentmode = $favpaymentmode;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection|Addresses[]
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Addresses $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
            $address->setUserId($this);
        }

        return $this;
    }

    public function removeAddress(Addresses $address): self
    {
        if ($this->addresses->contains($address)) {
            $this->addresses->removeElement($address);
            // set the owning side to null (unless already changed)
            if ($address->getUserId() === $this) {
                $address->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Orders $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUserId($this);
        }

        return $this;
    }

    public function removeOrder(Orders $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getUserId() === $this) {
                $order->setUserId(null);
            }
        }

        return $this;
    }
}
