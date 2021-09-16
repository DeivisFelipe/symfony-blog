<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 * 
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
{
    /**
     * @var int
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     * 
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     * 
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     * 
     * @ORM\Column(name="short_bio", type="string", length=500)
     */
    private $shortBio;

    /**
     * @var string
     * 
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     * 
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     * 
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     * 
     * @ORM\Column(name="github", type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @ORM\OneToMany(targetEntity=BlogPost::class, mappedBy="author", orphanRemoval=true)
     */
    private $blogPosts;

    public function __construct()
    {
        $this->blogPosts = new ArrayCollection();
    }

    /**
     * Get id
     * 
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get name
     * 
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name
     * 
     * @param string $name
     * 
     * @return Author
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title
     * 
     * @param string $title
     * 
     * @return Author
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get username
     * 
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set username
     * 
     * @param string $username
     * 
     * @return Author
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get company
     * 
     * @return string
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Set company
     * 
     * @param string $company
     * 
     * @return Author
     */
    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get shortbio
     * 
     * @return string
     */
    public function getShortBio(): ?string
    {
        return $this->shortBio;
    }

    /**
     * Set shortBio
     * 
     * @param string $shortBio
     * 
     * @return Author
     */
    public function setShortBio(string $shortBio): self
    {
        $this->shortBio = $shortBio;

        return $this;
    }

    /**
     * Get phone
     * 
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Set phone
     * 
     * @param string $phone
     * 
     * @return Author
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get facebook
     * 
     * @return string
     */
    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    /**
     * Set facebook
     * 
     * @param string $facebook
     * 
     * @return Author
     */
    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get twitter
     * 
     * @return string
     */
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    /**
     * Set twitter
     * 
     * @param string $twitter
     * 
     * @return Author
     */
    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get github
     * 
     * @return string
     */
    public function getGithub(): ?string
    {
        return $this->github;
    }

    /**
     * Set github
     * 
     * @param string $github
     * 
     * @return Author
     */
    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    /**
     * @return Collection|BlogPost[]
     */
    public function getBlogPosts(): Collection
    {
        return $this->blogPosts;
    }

    public function addBlogPost(BlogPost $blogPost): self
    {
        if (!$this->blogPosts->contains($blogPost)) {
            $this->blogPosts[] = $blogPost;
            $blogPost->setAuthor($this);
        }

        return $this;
    }

    public function removeBlogPost(BlogPost $blogPost): self
    {
        if ($this->blogPosts->removeElement($blogPost)) {
            // set the owning side to null (unless already changed)
            if ($blogPost->getAuthor() === $this) {
                $blogPost->setAuthor(null);
            }
        }

        return $this;
    }
}
