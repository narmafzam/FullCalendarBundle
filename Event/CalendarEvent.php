<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\Event;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Narmafzam\FullCalenderBundle\Entity\Interfaces\EventEntityInterface;
use Narmafzam\FullCalenderBundle\Event\Interfaces\CalendarEventInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CalendarEvent
 * @package Narmafzam\FullCalenderBundle\Event
 */
class CalendarEvent extends Event implements CalendarEventInterface
{
    /**
     * @var \DateTime
     */
    protected $startDatetime;

    /**
     * @var \DateTime
     */
    protected $endDatetime;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Collection
     */
    protected $events;

    /**
     * CalendarEvent constructor.
     * @param \DateTime $start
     * @param \DateTime $end
     * @param Request|null $request
     */
    public function __construct(\DateTime $start, \DateTime $end, Request $request = null)
    {
        $this->startDatetime = $start;
        $this->endDatetime   = $end;
        $this->request       = $request;
        $this->events        = new ArrayCollection();
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
     * @return \DateTime
     */
    public function getEndDatetime(): \DateTime
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
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return Collection
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    /**
     * @param EventEntityInterface $event
     */
    public function addEvents(EventEntityInterface $event): void
    {
        if ($this->getEvents()->contains($event)) {

            return;
        } else {

            $this->getEvents()->add($event);
        }
    }
}