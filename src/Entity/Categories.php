<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 * @ORM\Table(name="categories")
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="id", type="integer", length=11, nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    public function getId()
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

    /**
     * @ORM\OneToMany(targetEntity="Products", mappedBy="category_id", cascade="all", orphanRemoval=true)
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): void
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategoryId($this->id);
        }
    }

    public function removeProduct(Products $product): void
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->setCategoryId(null);
        }
    }

}
