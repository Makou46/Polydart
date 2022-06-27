<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PayementReference;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="Transaction")
     */
    private $produits;

    /**
     * @ORM\ManyToOne(targetEntity=PayementType::class, inversedBy="transactions")
     */
    private $PayementType;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPayementReference(): ?string
    {
        return $this->PayementReference;
    }

    public function setPayementReference(string $PayementReference): self
    {
        $this->PayementReference = $PayementReference;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setTransaction($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getTransaction() === $this) {
                $produit->setTransaction(null);
            }
        }

        return $this;
    }

    public function getPayementType(): ?PayementType
    {
        return $this->PayementType;
    }

    public function setPayementType(?PayementType $PayementType): self
    {
        $this->PayementType = $PayementType;

        return $this;
    }
}
