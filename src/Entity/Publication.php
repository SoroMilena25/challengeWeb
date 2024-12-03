<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img2 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $createur = null;

    /**
     * @var Collection<int, Aimer>
     */
    #[ORM\OneToMany(targetEntity: Aimer::class, mappedBy: 'publicationID', orphanRemoval: true)]
    private Collection $aimes;

    /**
     * @var Collection<int, Commenter>
     */
    #[ORM\OneToMany(targetEntity: Commenter::class, mappedBy: 'publicationID', orphanRemoval: true)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->aimes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getImg2(): ?string
    {
        return $this->img2;
    }

    public function setImg2(?string $img2): static
    {
        $this->img2 = $img2;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreateur(): ?User
    {
        return $this->createur;
    }

    public function setCreateur(?User $createur): static
    {
        $this->createur = $createur;

        return $this;
    }

    /**
     * @return Collection<int, Aimer>
     */
    public function getAimes(): Collection
    {
        return $this->aimes;
    }

    public function addAime(Aimer $aime): static
    {
        if (!$this->aimes->contains($aime)) {
            $this->aimes->add($aime);
            $aime->setPublicationID($this);
        }

        return $this;
    }

    public function removeAime(Aimer $aime): static
    {
        if ($this->aimes->removeElement($aime)) {
            // set the owning side to null (unless already changed)
            if ($aime->getPublicationID() === $this) {
                $aime->setPublicationID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commenter>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commenter $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setPublicationID($this);
        }

        return $this;
    }

    public function removeCommentaire(Commenter $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPublicationID() === $this) {
                $commentaire->setPublicationID(null);
            }
        }

        return $this;
    }
}
