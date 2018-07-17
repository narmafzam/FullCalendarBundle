<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Farshadi73 (Farzam Webnegar Sivan Co.), info@farshadi73.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Farshadi73\FullCalenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Farshadi73\FullCalenderBundle\Entity\Interfaces\AttributeInterface;
use Farshadi73\FullCalenderBundle\Entity\Interfaces\EventEntityInterface;

/**
 * Class Attribute
 * @package Farshadi73\FullCalenderBundle\Entity
 */
class Attribute implements AttributeInterface
{
    /**
     * @var string
     */
    protected $attr;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var EventEntityInterface
     *
     * @ORM\ManyToOne(targetEntity=Farshadi73\FullCalenderBundle\Entity\EventEntity", inversedBy="attributes")
     */
    protected $event;

    /**
     * Attribute constructor.
     *
     * @param string $attr
     * @param string $value
     */
    public function __construct(string $attr, string $value)
    {
        $this->attr  = $attr;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getAttr(): string
    {
        return $this->attr;
    }

    /**
     * @param string $attr
     */
    public function setAttr(string $attr): void
    {
        $this->attr = $attr;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return EventEntityInterface
     */
    public function getEvent(): EventEntityInterface
    {
        return $this->event;
    }

    /**
     * @param EventEntityInterface $event
     */
    public function setEvent(EventEntityInterface $event): void
    {
        $this->event = $event;
    }
}