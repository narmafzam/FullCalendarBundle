<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Narmafzam\FullCalenderBundle\Controller;

use Narmafzam\FullCalenderBundle\Event\CalendarEvent;
use Narmafzam\FullCalenderBundle\Event\Interfaces\CalendarEventInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CalendarController
 * @package Narmafzam\FullCalenderBundle\Controller
 */
class CalendarController extends Controller
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * CalendarController constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return EventDispatcher
     */
    public function getEventDispatcher(): EventDispatcher
    {
        return $this->eventDispatcher;
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loadCalendarAction(Request $request): Response
    {
        $startDatetime = new \DateTime();
        $startDatetime->setTimestamp($request->get('start'));

        $endDatetime = new \DateTime();
        $endDatetime->setTimestamp($request->get('end'));

        $events        = $this->getEventDispatcher()->dispatch(CalendarEventInterface::CONFIGURE,
            new CalendarEvent($startDatetime, $endDatetime, $request))->getEvents();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $returnEvents = array();

        foreach ($events as $event) {

            $returnEvents[] = $event->toArray();
        }

        $response->setContent(json_encode($returnEvents));

        return $response;
    }
}