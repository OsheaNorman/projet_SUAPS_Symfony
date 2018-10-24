<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource
 * @ORM\Table(name="vue_presence")
 * @ORM\Entity(repositoryClass="App\Repository\VuePresenceRepository")
 */
class VuePresence
{
    /**
     * @ORM\Id
     * @ORM\Column(name="idSeance", type="integer")
     */
    private $idSeance;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=40)
     */
    private $nom;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=20)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $temps;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     */
    private $no_etudiant;

    /**
     * @ORM\Column(name="tempsSeance", type="datetime")
     */
    private $tempsSeance;

    public function getIdSeance(): ?int
    {
        return $this->idSeance;
    }

    public function setIdSeance(int $idSeance): self
    {
        $this->idSeance = $idSeance;
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

    public function getTemps(): ?\DateTimeInterface
    {
        return $this->temps;
    }

    public function setTemps(\DateTimeInterface $temps): self
    {
        $this->temps = $temps;
        return $this;
    }

    public function getNoEtudiant(): ?int
    {
        return $this->no_etudiant;
    }

    public function setNoEtudiant(?int $no_etudiant): self
    {
        $this->no_etudiant = $no_etudiant;
        return $this;
    }

    public function getTempsSeance(): ?\DateTimeInterface
    {
        return $this->tempsSeance;
    }

    public function setTempsSeance(\DateTimeInterface $tempsSeance): self
    {
        $this->tempsSeance = $tempsSeance;
        return $this;
    }
}
