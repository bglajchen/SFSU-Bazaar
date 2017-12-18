<?php

class User
{
	private $userID = null;
	private $firstName = null;
	private $lastName = null;
	private $password = null;
	private $email = null;
	private $imagePath = null;
	private $rating = null;
	private $dateOfAccountCreation = null;
	private $dateOfLastAccountUpdate = null;
	private $isActive = null;

	public function __construct(	$firstName, $lastName, $password,
					$email)
	{
		$this->firstName	= $firstName;
		$this->lastName		= $lastName;
		$this->password		= $password;
		$this->email		= $email;
	}

	/**
     * Magical getter to get the specified property
     * @param $property
     * @return $property
     */
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }

    /**
     * Magical setter to set the specified property
     * @param $property
     * @param $value
     * @return Product
     */
    public function __set($property, $value) {
      if (property_exists($this, $property)) {
        $this->$property = $value;
      }

      return $this;
    }

	public function create()
	{
		return Database::getInstance()->addUser($this);
	}

	public static function get($userID)
	{
		return Database::getInstance()->getUserByID($userID);
	}

	public function update()
	{
		// TODO: Needs an actual schema for updating.
	}

	public static function delete($userID)
	{
		return Database::getInstance()->deleteUserByID($userID);
	}

	/**
     * Passes entered login info to database
     * @param $email
     * @return User
     */
	public static function isEmailTaken($email)
	{
		return Database::getInstance()->doesEmailExist($email);
	}

	public static function getUserInfoByEmail($email)
	{
		return Database::getInstance()->getUserInfoByEmail($email);
	}
}
