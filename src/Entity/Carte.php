<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Carte
 * @ApiResource
 * @ORM\Table(name="carte")
 * @ORM\Entity
 */
class Carte
{
    /**
     * @var string
     *
     * @ORM\Column(name="idcarte", type="string", length=55, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcarte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numEtud", type="integer", nullable=true)
     */
    private $numetud;

    public function getIdcarte(): ?string
    {
        return $this->idcarte;
    }

    public function getNumetud(): ?int
    {
        return $this->numetud;
    }

    public function setNumetud(?int $numetud): self
    {
        $this->numetud = $numetud;

        return $this;
    }


}
