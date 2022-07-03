<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 * @Vich\Uploadable
 * @ORM\Table(name="produit", indexes={@ORM\Index(columns={"nom", "description"}, flags={"fulltext"})})
 */
class Produit
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
    private $nom;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $quantite;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $images;

    /**
     * @var mixed
     * @Assert\File(
     *     maxSize = "2000k",
     *     mimeTypes = {"image/jpeg", "image/png"}
     * )
     * @Vich\UploadableField(mapping="products", fileNameProperty="images")
     */
    private $imageFile;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="produits")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Series::class, inversedBy="produits")
     */
    private $serie;

    /**
     * @ORM\ManyToOne(targetEntity=Transaction::class, inversedBy="produits")
     */
    private $Transaction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"nom"})
     */
    private $slug;

  

    public function __toString()
    {
        return $this->description." ".$this->nom;;
    }

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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

    /**
     * @return string|null
     */

    public function getShortDescription(): ?string
    {
        if (strlen($this->description) < 40) {
            return $this->description;
        }

        return substr($this->description, 0, 40) . '...';
    }
    
    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSerie(): ?series
    {
        return $this->serie;
    }

    public function setSerie(?series $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getTransaction(): ?Transaction
    {
        return $this->Transaction;
    }

    public function setTransaction(?Transaction $Transaction): self
    {
        $this->Transaction = $Transaction;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of imageFile
     *
     * @return  mixed
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  mixed  $imageFile
     *
     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}
