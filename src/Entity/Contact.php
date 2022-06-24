<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commission;

    /**
     * @ORM\OneToMany(targetEntity=MessageContact::class, mappedBy="ContactType")
     */
    private $messageContacts;

    public function __construct()
    {
        $this->messageContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getCommission(): ?string
    {
        return $this->commission;
    }

    public function setCommission(string $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * @return Collection<int, MessageContact>
     */
    public function getMessageContacts(): Collection
    {
        return $this->messageContacts;
    }

    public function addMessageContact(MessageContact $messageContact): self
    {
        if (!$this->messageContacts->contains($messageContact)) {
            $this->messageContacts[] = $messageContact;
            $messageContact->setContactType($this);
        }

        return $this;
    }

    public function removeMessageContact(MessageContact $messageContact): self
    {
        if ($this->messageContacts->removeElement($messageContact)) {
            // set the owning side to null (unless already changed)
            if ($messageContact->getContactType() === $this) {
                $messageContact->setContactType(null);
            }
        }

        return $this;
    }
}
