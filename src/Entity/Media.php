<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text", length=0, nullable=false)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="long_description", type="text", length=0, nullable=false)
     */
    private $longDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="datetime", nullable=false)
     */
    private $releaseDate;

    /**
     * @var string
     *
     * @ORM\Column(name="cover_image", type="string", length=255, nullable=false)
     */
    private $coverImage;

    /**
     * @var array
     *
     * @ORM\Column(name="staff", type="json", nullable=false)
     */
    private $staff;

    /**
     * @var array
     *
     * @ORM\Column(name="casting", type="json", nullable=false)
     */
    private $casting;

    /**
     * @var string
     *
     * @ORM\Column(name="mediaType", type="string", length=255, nullable=false)
     */
    private $mediatype;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="media")
     * @ORM\JoinTable(name="media_category",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Language", inversedBy="media")
     * @ORM\JoinTable(name="media_language",
     *   joinColumns={
     *     @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     *   }
     * )
     */
    private $language = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->language = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getStaff(): ?array
    {
        return $this->staff;
    }

    public function setStaff(array $staff): self
    {
        $this->staff = $staff;

        return $this;
    }

    public function getCasting(): ?array
    {
        return $this->casting;
    }

    public function setCasting(array $casting): self
    {
        $this->casting = $casting;

        return $this;
    }

    public function getMediatype(): ?string
    {
        return $this->mediatype;
    }

    public function setMediatype(string $mediatype): self
    {
        $this->mediatype = $mediatype;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language[] = $language;
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->language->removeElement($language);

        return $this;
    }

}
