<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[Vich\Uploadable]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;
    
    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    /**
     * NOT: This is not a mapped field of entity metadata, just a simple property.
     */
    #[Vich\UploadableField(mapping: 'products_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type : 'string')]
    private ?string $imageName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $premierelongueur;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deuxiemelongueur;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $troisiemelongueur;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surplace;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $livraison;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $surplacepremierprix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $surplacedeuxiemeprix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $surplacetroisiemeprix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $livraisonpremierprix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $livraisondeuxiemeprix;

    #[ORM\Column(length: 255, nullable: true)]
    private ?float $livraisontroisiemeprix;

/**
 * @Gedmo\Timestampable(on="update")
 * @ORM\Column(type="datetime")
 */
private $updatedAt;

/**
 * @return \DateTime
 */
public function getUpdatedAt()
{
    return $this->updatedAt;
}
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    public function getPremiereLongueur(): ?string
    {
        return $this->premierelongueur;
    }

    public function setPremierelongueur(string $premierelongueur): static
    {
        $this->premierelongueur = $premierelongueur;

        return $this;
    }

    public function getDeuxiemeLongueur(): ?string
    {
        return $this->deuxiemelongueur;
    }

    public function setDeuxiemeLongueur(string $deuxiemelongueur): static
    {
        $this->deuxiemelongueur = $deuxiemelongueur;

        return $this;
    }

    public function getTroisiemeLongueur(): ?string
    {
        return $this->troisiemelongueur;
    }

    public function setTroisiemeLongueur(string $troisiemelongueur): static
    {
        $this->troisiemelongueur = $troisiemelongueur;

        return $this;
    }

    public function getSurplace(): ?string
    {
        return $this->surplace;
    }

    public function setSurplace(string $surplace): static
    {
        $this->surplace = $surplace;

        return $this;
    }


    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getSurPlacePremierPrix(): ?float
    {
        return $this->surplacepremierprix;
    }

    public function setSurPlacePremierPrix(float $surplacepremierprix): static
    {
        $this->surplacepremierprix = $surplacepremierprix;

        return $this;
    }

    public function getSurPlaceDeuxiemePrix(): ?float
    {
        return $this->surplacedeuxiemeprix;
    }

    public function setSurPlaceDeuxiemePrix(float $surplacedeuxiemeprix): static
    {
        $this->surplacedeuxiemeprix = $surplacedeuxiemeprix;

        return $this;
    }

    public function getSurPlaceTroisiemePrix(): ?float
    {
        return $this->surplacetroisiemeprix;
    }

    public function setSurPlaceTroisiemePrix(float $surplacetroisiemeprix): static
    {
        $this->surplacetroisiemeprix = $surplacetroisiemeprix;

        return $this;
    }

    public function getLivraisonPremierPrix(): ?float
    {
        return $this->livraisonpremierprix;
    }

    public function setLivraisonPremierprix(float $livraisonpremierprix): static
    {
        $this->livraisonpremierprix = $livraisonpremierprix;

        return $this;
    }

    public function getLivraisonDeuxiemePrix(): ?float
    {
        return $this->livraisondeuxiemeprix;
    }

    public function setLivraisonDeuxiemePrix(float $livraisondeuxiemeprix): static
    {
        $this->livraisondeuxiemeprix = $livraisondeuxiemeprix;

        return $this;
    }

    public function getLivraisonTroisiemePrix(): ?float
    {
        return $this->livraisontroisiemeprix;
    }

    public function setLivraisonTroisiemePrix(float $livraisontroisiemeprix): static
    {
        $this->livraisontroisiemeprix = $livraisontroisiemeprix;

        return $this;
    }
}
