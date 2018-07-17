<?php
/**
 * This file is part of fullcalendarbundle
 * Copyrighted by Narmafzam (Farzam Webnegar Sivan Co.), info@narmafzam.com
 * Created by farshad
 * Date: 7/17/18
 */

namespace Farshadi73\FullCalenderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CalendarController
 * @package Farshadi73\FullCalenderBundle\Controller
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
        $startDatetime = date('Y-M-D', $request->get('start'));
        $endDatetime   = date('Y-M-D', $request->get('end'));

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}