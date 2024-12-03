<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RelationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Relation
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'abonnes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $abonne = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'abonnements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $abonnement = null;

    public function getAbonne(): ?User
    {
        return $this->abonne;
    }

    public function setAbonne(?User $abonne): static
    {
        $this->abonne = $abonne;

        return $this;
    }

    public function getAbonnement(): ?User
    {
        return $this->abonnement;
    }

    public function setAbonnement(?User $abonnement): static
    {
        $this->abonnement = $abonnement;

        return $this;
    }
}
