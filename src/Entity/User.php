<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity]
#[ORM\Table(name: '`user`')]
#[ApiResource(
    normalizationContext: ['groups' => ['user:read']],
    denormalizationContext: ['groups' => ['user:write']]
)]
class User implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:read', 'user:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(['user:write'])]
    private ?string $mdp = null;

    public function getPassword(): ?string
    {
        return $this->mdp;
    }

    /**
     * @var Collection<int, Publication>
     */
    #[ORM\OneToMany(targetEntity: Publication::class, mappedBy: 'createur', orphanRemoval: true)]
    #[Groups(['user:read', 'user:write'])]
    private Collection $publications;

    /**
     * @var Collection<int, Aimer>
     */
    #[ORM\OneToMany(targetEntity: Aimer::class, mappedBy: 'userID', orphanRemoval: true)]
    #[Groups(['user:read', 'user:write'])]
    private Collection $aimes;

    /**
     * @var Collection<int, Commenter>
     */
    #[ORM\OneToMany(targetEntity: Commenter::class, mappedBy: 'userID', orphanRemoval: true)]
    #[Groups(['user:read', 'user:write'])]
    private Collection $commentaires;

    /**
     * @var Collection<int, Relation>
     */
    #[ORM\OneToMany(targetEntity: Relation::class, mappedBy: 'abonne', orphanRemoval: true)]
    #[Groups(['user:read', 'user:write'])]
    private Collection $abonnes;

    /**
     * @var Collection<int, Relation>
     */
    #[ORM\OneToMany(targetEntity: Relation::class, mappedBy: 'abonnement', orphanRemoval: true)]
    #[Groups(['user:read', 'user:write'])]
    private Collection $abonnements;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->aimes = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->abonnes = new ArrayCollection();
        $this->abonnements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * @return Collection<int, Publication>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): static
    {
        if (!$this->publications->contains($publication)) {
            $this->publications->add($publication);
            $publication->setCreateur($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): static
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getCreateur() === $this) {
                $publication->setCreateur(null);
            }
        }

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
            $aime->setUserID($this);
        }

        return $this;
    }

    public function removeAime(Aimer $aime): static
    {
        if ($this->aimes->removeElement($aime)) {
            // set the owning side to null (unless already changed)
            if ($aime->getUserID() === $this) {
                $aime->setUserID(null);
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
            $commentaire->setUserID($this);
        }

        return $this;
    }

    public function removeCommentaire(Commenter $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUserID() === $this) {
                $commentaire->setUserID(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Relation>
     */
    public function getAbonnes(): Collection
    {
        return $this->abonnes;
    }

    public function addAbonne(Relation $abonne): static
    {
        if (!$this->abonnes->contains($abonne)) {
            $this->abonnes->add($abonne);
            $abonne->setAbonne($this);
        }

        return $this;
    }

    public function removeAbonne(Relation $abonne): static
    {
        if ($this->abonnes->removeElement($abonne)) {
            // set the owning side to null (unless already changed)
            if ($abonne->getAbonne() === $this) {
                $abonne->setAbonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Relation>
     */
    public function getAbonnements(): Collection
    {
        return $this->abonnements;
    }

    public function addAbonnement(Relation $abonnement): static
    {
        if (!$this->abonnements->contains($abonnement)) {
            $this->abonnements->add($abonnement);
            $abonnement->setAbonnement($this);
        }

        return $this;
    }

    public function removeAbonnement(Relation $abonnement): static
    {
        if ($this->abonnements->removeElement($abonnement)) {
            // set the owning side to null (unless already changed)
            if ($abonnement->getAbonnement() === $this) {
                $abonnement->setAbonnement(null);
            }
        }

        return $this;
    }
}
