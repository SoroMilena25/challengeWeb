<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AimerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity]
#[ApiResource(
    normalizationContext: ['groups' => ['aimer:read']],
    denormalizationContext: ['groups' => ['aimer:write']]
)]
class Aimer
{

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'aimes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['aimer:read', 'aimer:write'])]
    private ?User $userID = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'aimes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['aimer:read', 'aimer:write'])]
    private ?Publication $publicationID = null;

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
}
