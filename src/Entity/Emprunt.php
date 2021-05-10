<?php

namespace App\Entity;

use App\Entity\Livre;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmpruntRepository;

/**
 * @ORM\Entity(repositoryClass=EmpruntRepository::class)
 */
class Emprunt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRend;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="emprunts")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="emprunts")
     */
    private $livre;




    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getDateRend(): ?\DateTimeInterface
    {
        return $this->dateRend;
    }

    public function setDateRend(?\DateTimeInterface $dateRend): self
    {
        $this->dateRend = $dateRend;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }
}
