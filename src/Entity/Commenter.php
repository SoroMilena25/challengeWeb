<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CommenterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ApiResource(
    normalizationContext: ['groups' => ['commenter:read']],
    denormalizationContext: ['groups' => ['commenter:write']]
)]
class Commenter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['commenter:read', 'commenter:write'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['commenter:read', 'commenter:write'])]
    private ?User $userID = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['commenter:read', 'commenter:write'])]
    private ?Publication $publicationID = null;

    #[ORM\Column(length: 255)]
    #[Groups(['commenter:read', 'commenter:write'])]
    private ?string $commentaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?User
    {
        return $this->userID;
    }

    public function setUserID(?User $userID): static
    {
        $this->userID = $userID;

        return $this;
    }

    public function getPublicationID(): ?Publication
    {
        return $this->publicationID;
    }

    public function setPublicationID(?Publication $publicationID): static
    {
        $this->publicationID = $publicationID;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

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
}
