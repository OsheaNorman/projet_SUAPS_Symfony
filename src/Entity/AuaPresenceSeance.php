<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ApiResource
 * @ORM\Table(name="aua_presence_seance")
 * @ORM\Entity
 */
class AuaPresenceSeance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var int
     *
     * @ORM\Column(name="typeBadge", type="integer", nullable=false)
     */
    private $typebadge;

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getTypebadge(): ?int
    {
        return $this->typebadge;
    }

    public function setTypebadge(int $typebadge): self
    {
        $this->typebadge = $typebadge;

        return $this;
    }


}
