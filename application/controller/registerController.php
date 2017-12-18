<?php

class RegisterController extends Controller
{
    /**
     * PAGE: index
     * Renders the register index page
     */
    public function index()
    {
        if (empty($_SESSION))
        {
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/register/index.php';
            require APP . 'view/_templates/footer.php';
        }
        else
        {
            header('location: ' . URL . 'home');
        }
    }

    public function registerAlertMsgs($msg)
    {
      require APP . 'view/register/registerAlertMsgs.php';
    }

    /**
     * ACTION: checkIfEmailExist
     * Checks if email already exist in the database
     */
    public function checkIfEmailExist()
    {
        $email = filter_input(INPUT_POST, 'email');
        $isTaken = User::isEmailTaken($email);

        if(!empty($isTaken))
        {
            $this->registerAlertMsgs('exist');
        }
        else
        {
            return $this->register();
        }
    }

   /**
    * ACTION: register
    * Registers users and saves their information in the database
    */
    public function register()
    {
      	if(isset($_POST['register'])  && !empty($_POST['firstName'])
                                      && !empty($_POST['lastName'])
                                      && !empty($_POST['email'])
                                      && !empty($_POST['password'])
                                      && !empty($_POST['confirm'])
                                      && !empty($_POST['capcha'])
                                      && !empty($_POST['terms']))
      	{
            // get all data about user
      		  $newUser = $this->getNewUser();

        		if(!empty($newUser))
        		{
                // save user info to the database
          			$newUser->create();

                $this->registerAlertMsgs('success');
        		}
      	}
        else
        {
            $this->registerAlertMsgs('blank');
        }
    }

    /**
     * ACTION HELPER: getData
     * Get all the user's data for registration
     * @return User
     */
    public function getNewUser()
    {
      	$firstName = filter_input(INPUT_POST, 'firstName');
      	$lastName = filter_input(INPUT_POST, 'lastName');
      	$email = filter_input(INPUT_POST, 'email');
      	$password = filter_input(INPUT_POST, 'password');
      	$pwConfirm = filter_input(INPUT_POST, 'confirm');
      	$capcha = filter_input(INPUT_POST, 'capcha');
      	$terms = filter_input(INPUT_POST, 'terms');

        // making sure registering email domain is correct
      	$validDomain = strstr($email, "@mail.sfsu.edu");

        if($validDomain !== $email)
        {
            if($password == $pwConfirm)
            {
                // hashing password before saving into database
                $password = password_hash($password, PASSWORD_DEFAULT);

                return new User($firstName, $lastName, $password, $email);
            }
            else
            {
                $this->registerAlertMsgs('mismatch');
            }
        }
        else if($validDomain == $email)
        {
            $this->registerAlertMsgs('invalid');
        }
    }
}
