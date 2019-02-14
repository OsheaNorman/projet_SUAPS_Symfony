<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuaListeSeance
 *
 * @ORM\Table(name="aua_liste_seance")
 * @ORM\Entity
 */
class AuaListeSeance
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSeance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idseance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsSeance", type="datetime", nullable=false)
     */
    private $tempsseance;

    /**
     * @var int
     *
     * @ORM\Column(name="limitePersonnes", type="integer", nullable=false)
     */
    private $limitepersonnes;

    public function getIdseance(): ?int
    {
        return $this->idseance;
    }

    public function getTempsseance(): ?\DateTimeInterface
    {
        return $this->tempsseance;
    }

    public function setTempsseance(\DateTimeInterface $tempsseance): self
    {
        $this->tempsseance = $tempsseance;

        return $this;
    }

    public function getLimitepersonnes(): ?int
    {
        return $this->limitepersonnes;
    }

    public function setLimitepersonnes(int $limitepersonnes): self
    {
        $this->limitepersonnes = $limitepersonnes;

        return $this;
    }


}
