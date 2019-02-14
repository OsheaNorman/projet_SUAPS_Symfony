<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Table(name="aua_exterieur_sport")
 * @ORM\Entity(repositoryClass="App\Repository\AuaExterieurSportRepository")
 */
class AuaExterieurSport
{

    /**
	 * @ORM\Id
     * @ORM\Column(name="no_exterieur", type="string", length=20)
     */
    private $no_exterieur;

    /**
	 * @ORM\Id
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
	 * @ORM\Id
     * @ORM\Column(type="string", length=20)
     */
    private $prenom;

    /**
	 * @ORM\Id
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo;


    public function getNoExterieur(): ?string
    {
        return $this->no_exterieur;
    }

    public function setNoExterieur(string $no_exterieur): self
    {
        $this->no_exterieur = $no_exterieur;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
