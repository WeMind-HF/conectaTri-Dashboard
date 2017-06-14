<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * QuoteSupplier
 *
 * @ORM\Table(name="quote_supplier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuoteSupplierRepository")
 * @Serializer\ExclusionPolicy("none")
 */
class QuoteSupplier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var QuoteProduct
     *
     * @ORM\ManyToOne(targetEntity="QuoteProduct")
     * @ORM\JoinColumn(name="quote_product_id", referencedColumnName="id")
     * @Serializer\Exclude()
     */
    private $quoteProduct;

    /**
     * @var Representative
     *
     * @ORM\ManyToOne(targetEntity="Representative")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="id")
     */
    private $representative;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=2, scale=0)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Serializer\Exclude()
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Serializer\Exclude()
     */
    private $updatedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     * @Serializer\Exclude()
     */
    private $deleted = false;


    /**
     * QuoteSupplier constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return QuoteProduct
     */
    public function getQuoteProduct()
    {
        return $this->quoteProduct;
    }

    /**
     * @param QuoteProduct $quoteProduct
     * @return QuoteSupplier
     */
    public function setQuoteProduct($quoteProduct)
    {
        $this->quoteProduct = $quoteProduct;
        return $this;
    }

    /**
     * @return Representative
     */
    public function getRepresentative()
    {
        return $this->representative;
    }

    /**
     * @param Representative $representative
     * @return QuoteSupplier
     */
    public function setRepresentative($representative)
    {
        $this->representative = $representative;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return QuoteSupplier
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return QuoteSupplier
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return QuoteSupplier
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return QuoteSupplier
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return QuoteSupplier
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}
