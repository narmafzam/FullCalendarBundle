<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Farshadi73 (Farzam Webnegar Sivan Co.), info@farshadi73.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Farshadi73\FullCalenderBundle\Entity\Interfaces;
use Doctrine\Common\Collections\Collection;

/**
 * Interface EventEntityInterface
 * @package Farshadi73\FullCalenderBundle\Entity\Interfaces
 */
interface EventEntityInterface
{
    /**
     * @return null|string
     */
    public function getEventId(): ? string;

    /**
     * @param string $eventId
     */
    public function setEventId(string $eventId): void;

    /**
     * @return null|string
     */
    public function getTitle(): ? string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @return null|string
     */
    public function getUrl(): ? string;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void;

    /**
     * @return null|string
     */
    public function getBackgroundColor(): ? string;

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void;

    /**
     * @return Collection
     */
    public function getAttributes(): Collection;

    /**
     * @return null|\DateTime
     */
    public function getStartDatetime(): ? \DateTime;

    /**
     * @param \DateTime $startDatetime
     */
    public function setStartDatetime(\DateTime $startDatetime): void;

    /**
     * @return null|\DateTime
     */
    public function getEndDatetime(): ? \DateTime;

    /**
     * @param \DateTime $endDatetime
     */
    public function setEndDatetime(\DateTime $endDatetime): void;

    /**
     * @return bool
     */
    public function isAllDay(): bool;

    /**
     * @param bool $allDay
     */
    public function setAllDay(bool $allDay): void;

    /**
     * @param AttributeInterface $attribute
     */
    public function addAttribute(AttributeInterface $attribute): void;

    /**
     * @param AttributeInterface $attribute
     */
    public function removeAttribute(AttributeInterface $attribute): void;

    /**
     * @return array
     */
    public function toArray(): array;
}