<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * Etud
 * @ApiResource
 * @ORM\Table(name="testVue")
 * @ORM\Entity
 */
class TestVue
{
    /**
     * @var string|null
     * @ORM\Id
     * @ORM\Column(name="nom", type="string", length=55, nullable=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="idcarte", type="string", length=55, nullable=false)
     */
    private $idcarte;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdcarte(): ?string
    {
        return $this->idcarte;
    }

    public function setIdcarte(string $idcarte): self
    {
        $this->idcarte = $idcarte;

        return $this;
    }


}
