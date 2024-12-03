<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AimerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Aimer
{

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'aimes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userID = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'aimes')]
    #[ORM\JoinColumn(nullable: false)]
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
