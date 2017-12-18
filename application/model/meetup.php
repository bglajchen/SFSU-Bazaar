<?php

class Meetup
{
	// properties the database will manage
	private $meetID = null;
	private $buyerID = null;

	// required properties
	private $status = null;
	private $sellerID = null;

	// optional properties
	private $dateOfMeetup = null;
	private $timeOfMeetup = null;
	private $locationOfMeetup = null;

	public function __construct(	$status,
					$dateOfMeetup = '',
					$timeOfMeetup = '',
					$locationOfMeetup = ''	)
	{
		$this->status		= $status;
		$this->dateOfMeetup	= $dateOfMeetup;
		$this->timeOfMeetup	= $timeOfMeetup;
		$this->locationOfMeetup	= $locationOfMeetup;
	}

	public function create()
	{
		return Database::getInstance()->addMeetup($this);
	}

	public static function get($meetID)
	{
		return Database::getInstance()->getMeetupByID($meetID);
	}

	public function update()
	{
		// TODO: Needs an actual schema for this method.

	}

	public static function delete($meetID)
	{
		Database:: getInstance()->deleteMeetByID($meetID);
	}
}
