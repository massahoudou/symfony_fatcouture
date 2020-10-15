<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 *@UniqueEntity("titre")
 * @Vich\Uploadable()
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string|null
     * @ORM\Column(type="string" , length=255)
     */
    private $filename;

    /**
     * @Assert\Image(
     *     mimeTypes="image/jpeg"
     * )
     * @var File|null
     * @Vich\UploadableField(mapping="produits_image" , fileNameProperty="filename")
     */
    private $imagefile;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min="3",minMessage="le titre est trop court !",
     *     max="15",maxMessage="le titre est trop long !"
     * )
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min="3",minMessage="le prix est trop court !",
     *     max="15",maxMessage="le prix est trop long !"
     * )
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min="10",
     *     minMessage="la description est trop court "
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $misajour_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $solder;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $iduser;

    public function __construct()
    {
        $this->misajour_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMisajourAt(): ?\DateTimeInterface
    {
        return $this->misajour_at;

    }

    public function setMisajourAt(\DateTimeInterface $misajour_at): self
    {
        $this->misajour_at = $misajour_at;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param string|null $filename
     * @return Produit
     */
    public function setFilename(?string $filename): Produit
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getImagefile(): ?File
    {
        return $this->imagefile;
    }

    /**
     * @param File|null $imagefile
     * @return Produit
     */
    public function setImagefile(?File $imagefile): Produit
    {

        $this->imagefile = $imagefile;
        if ($this->imagefile instanceof UploadedFile)
        {
            $this->misajour_at = new  \DateTime('now');
        }
        return $this;
    }

    public function getSolder(): ?bool
    {
        return $this->solder;
    }

    public function setSolder(bool $solder): self
    {
        $this->solder = $solder;

        return $this;
    }



    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

}
