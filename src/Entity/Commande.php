<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Length(
     *     min="3",minMessage="le nom est trop court !",
     *     max="20",maxMessage="le nom est trop long !"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
    * @Assert\Length(
     *     min="3",minMessage="le prenom est trop court !",
     *     max="205",maxMessage="le prenom est trop long !"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer", length=255)
    * @Assert\Length(
     *     min="7",minMessage="le telephone est trop court !",
     *     max="10",maxMessage="le telephone est trop long !"
     * )
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     * @Assert\Length(
     *     min="12",minMessage="le mail est trop court !",
     *     max="40",maxMessage="le mail est trop long !")
     * 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
    * @Assert\Length(
     *     min="3",minMessage="l adresse est trop court !",
     *     max="15",maxMessage="l adresse  est trop long !"
     * )
     * 
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     *      * @Assert\Length(
     *     min="3",minMessage="la BP est trop court !",
     *     max="6",maxMessage="la BP est trop long !"
     * )
     */
    private $BP;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Reserve_at;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     */
    private $idproduit;


    public function __construct()
    {
        $this->Reserve_at = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getBP(): ?string
    {
        return $this->BP;
    }

    public function setBP(string $BP): self
    {
        $this->BP = $BP;

        return $this;
    }

    public function getReserveAt(): ?\DateTimeInterface
    {
        return $this->Reserve_at;
    }

    public function setReserveAt(\DateTimeInterface $Reserve_at): self
    {
        $this->Reserve_at = $Reserve_at;

        return $this;
    }


    public function getIdproduit(): ?Produit
    {
        return $this->idproduit;
    }

    public function setIdproduit(?Produit $idproduit): self
    {
        $this->idproduit = $idproduit;

        return $this;
    }

}
