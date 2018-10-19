<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Etud
 * @ApiResource(routePrefix="/library")
 * @ORM\Table(name="etud")
 * @ORM\Entity
 */
class Etud
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=55, nullable=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="numEtud", type="integer", nullable=false)
     * @ORM\Id
     */
    private $numetud;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumetud(): ?int
    {
        return $this->numetud;
    }


}
