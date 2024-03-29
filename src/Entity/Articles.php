<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $article_type; // Define the article_type property here

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug; // Define the article_type property here

    // Add other properties and mappings as needed...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    // Define getters and setters for the article_type property
    public function getArticleType(): ?string
    {
        return $this->article_type;
    }

    public function setArticleType(string $article_type): self
    {
        $this->article_type = $article_type;

        return $this;
    }

    // Define getters and setters for the article_type property
    //...

// Define getters and setters for the slug property
public function getSlug(): ?string
{
    return $this->slug;
}

public function setSlug(string $slug): self
{
    $this->slug = $slug;

    return $this;
}

//...


    // Add getters and setters for other properties as needed...
}
