<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Narmafzam\FullCalenderBundle\Entity\Interfaces\AttributeInterface;
use Narmafzam\FullCalenderBundle\Entity\Interfaces\EventEntityInterface;

/**
 * Class EventEntity
 * @package Narmafzam\FullCalenderBundle\Entity
 */
class EventEntity implements EventEntityInterface
{
    /**
     * @var string if you want define a specific id for any events
     *
     * @ORM\Column(type="string")
     */
    protected $eventId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $backgroundColor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $startDatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $endDatetime;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $allDay = false;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Narmafzam\FullCalenderBundle\Entity\Attribute", mappedBy="event", cascade={"persist", "remove"})
     */
    protected $attributes;

    /**
     * EventEntity constructor.
     */
    public function __construct()
    {
        $this->attributes = new ArrayCollection();
    }

    /**
     * @return null|string
     */
    public function getEventId(): ? string
    {
        return $this->eventId;
    }

    /**
     * @param string $eventId
     */
    public function setEventId(string $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ? string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ? string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getBackgroundColor(): ? string
    {
        return $this->backgroundColor;
    }

    /**
     * @param string $backgroundColor
     */
    public function setBackgroundColor(string $backgroundColor): void
    {
        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @return \DateTime
     */
    public function getStartDatetime(): \DateTime
    {
        return $this->startDatetime;
    }

    /**
     * @param \DateTime $startDatetime
     */
    public function setStartDatetime(\DateTime $startDatetime): void
    {
        $this->startDatetime = $startDatetime;
    }

    /**
     * @return null|\DateTime
     */
    public function getEndDatetime(): ? \DateTime
    {
        return $this->endDatetime;
    }

    /**
     * @param \DateTime $endDatetime
     */
    public function setEndDatetime(\DateTime $endDatetime): void
    {
        $this->endDatetime = $endDatetime;
    }

    /**
     * @return bool
     */
    public function isAllDay(): bool
    {
        return $this->allDay;
    }

    /**
     * @param bool $allDay
     */
    public function setAllDay(bool $allDay): void
    {
        $this->allDay = $allDay;
    }

    /**
     * @param AttributeInterface $attribute
     */
    public function addAttribute(AttributeInterface $attribute): void
    {
        if ($this->getAttributes()->contains($attribute)) {

            return;
        } else {

            $attribute->setEvent($this);
            $this->getAttributes()->add($attribute);
        }
    }

    /**
     * @param AttributeInterface $attribute
     */
    public function removeAttribute(AttributeInterface $attribute): void
    {
        if (!$this->getAttributes()->contains($attribute)) {

            return;
        } else {

            $this->getAttributes()->removeElement($attribute);
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $event      = array();

        if (!is_null($this->getEventId())) {
            $event['id'] = $this->getEventId();
        }

        $event['title'] = $this->title;
        $event['start'] = $this->startDatetime->format("Y-m-d\TH:i:sP");

        foreach ($this->getAttributes() as $attribute) {

            if ($attribute instanceof AttributeInterface) {

                $event['attributes'][$attribute->getAttr()] = $attribute->getValue();
            }
        }

        if ($this->endDatetime !== null) {
            $event['end'] = $this->endDatetime->format("Y-m-d\TH:i:sP");
        }

        $event['allDay'] = $this->allDay;

        return $event;
    }
}