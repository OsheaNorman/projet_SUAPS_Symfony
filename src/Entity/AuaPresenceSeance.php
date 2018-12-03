<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Table(name="aua_presence_seance")
 * @ORM\Entity(repositoryClass="App\Repository\AuaPresenceSeanceRepository")
 */
class AuaPresenceSeance
{

    /**
     * @ORM\Id
     * @ORM\Column(name="idSeance", type="integer")
     */
    private $idSeance;

    /**
	 * @ORM\Id
     * @ORM\Column(type="string", length=30)
     */
    private $no_mifare_inverse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $temps;

    /**
     * @ORM\Id
     * @ORM\Column(name="entreesSorties", type="string", length=30)
     */
    private $entreesSorties;



    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function setIdSeance(int $idSeance): self
    {
        $this->idSeance = $idSeance;

        return $this;
    }

    public function getNoMifareInverse(): ?string
    {
        return $this->no_mifare_inverse;
    }

    public function setNoMifareInverse(string $no_mifare_inverse): self
    {
        $this->no_mifare_inverse = $no_mifare_inverse;

        return $this;
    }

    public function getTemps(): ?\DateTimeInterface
    {
        return $this->temps;
    }

    public function setTemps(\DateTimeInterface $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getEntreesSorties(): ?string
    {
        return $this->entreesSorties;
    }

    public function setEntreesSorties(string $entreesSorties): self
    {
        $this->entreesSorties = $entreesSorties;

        return $this;
    }
}
