<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuaPresenceSeance
 *
 * @ORM\Table(name="aua_presence_seance")
 * @ORM\Entity
 */
class AuaPresenceSeance
{
    /**
     * @var string
     *
     * @ORM\Column(name="no_mifare_inverse", type="string", length=30, nullable=false)
     */
    private $noMifareInverse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $temps = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="entreesSorties", type="string", length=30, nullable=false)
     */
    private $entreessorties;

    /**
     * @var \AuaListeSeance
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AuaListeSeance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSeance", referencedColumnName="idSeance")
     * })
     */
    private $idseance;

    public function getNoMifareInverse(): ?string
    {
        return $this->noMifareInverse;
    }

    public function setNoMifareInverse(string $noMifareInverse): self
    {
        $this->noMifareInverse = $noMifareInverse;

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

    public function getEntreessorties(): ?string
    {
        return $this->entreessorties;
    }

    public function setEntreessorties(string $entreessorties): self
    {
        $this->entreessorties = $entreessorties;

        return $this;
    }

    public function getIdseance(): ?AuaListeSeance
    {
        return $this->idseance;
    }

    public function setIdseance(?AuaListeSeance $idseance): self
    {
        $this->idseance = $idseance;

        return $this;
    }


}
