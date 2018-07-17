<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\Entity\Interfaces;

/**
 * Interface AttributeInterface
 * @package Narmafzam\FullCalenderBundle\Entity\Interfaces
 */
interface AttributeInterface
{
    /**
     * @return string
     */
    public function getAttr(): string;

    /**
     * @param string $attr
     */
    public function setAttr(string $attr): void;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     */
    public function setValue(string $value): void;

    /**
     * @return EventEntityInterface
     */
    public function getEvent(): EventEntityInterface;

    /**
     * @param EventEntityInterface $event
     */
    public function setEvent(EventEntityInterface $event): void;
}