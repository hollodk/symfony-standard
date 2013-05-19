<?php

namespace Club\UserBundle\Listener;

class Booking
{
	protected $em;
	protected $security_context;

	public function __construct(\Doctrine\ORM\EntityManager $em,$security_context)
	{
		$this->em = $em;
		$this->security_context = $security_context;
	}

	public function onBookingConfirm(\Club\BookingBundle\Event\FilterBookingEvent $event)
	{
		$booking = $event->getBooking();

		$log = new Log();
		$log->setEvent('onBookingConfirm');
		$log->setSeverity('informational');
		$log->setLogType('booking');
		$log->setLog('Created a new booking');
		$log->setUser($this->security_context->getToken()->getUser());

		$this->em->persist($log);
		$this->em->flush();
	}
}
