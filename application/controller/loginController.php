<?php

class loginController extends Controller
{
    /**
     * PAGE: index
     * Renders the login index page
     */
    public function index()
    {   
        if (empty($_SESSION))
        {
            // load views
            require APP . 'view/_templates/header.php';
            require APP . 'view/login/index.php';
            require APP . 'view/_templates/footer.php';
        } else{
            header('location: ' . URL . 'home/index');
        }
    }

    public function loginAlertMsgs($msg)
    {
        require APP . 'view/login/loginAlertMsgs.php';
    }

    /**
    * ACTION: login
    * Logs user onto website by checking entered information to the database
    */
    public function login()
    {
        // check if the form is set and not empty
        if(isset($_POST['login']))
        {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $validDomain = strstr($email, "@mail.sfsu.edu");
            $isTaken = User::isEmailTaken($email);
            
            if($validDomain && $isTaken)
            {   
                $user = User::getUserInfoByEmail($email);
                $hashRealPW = $user->password;
                $verifyPasswordMatches = password_verify($password, $hashRealPW);                
                
                if($verifyPasswordMatches)
                { 
                    $_SESSION['userID'] = $user->userID;
                    $_SESSION['userEmail'] = $user->email;
                    $_SESSION['firstName'] = $user->firstName;

                    header('refresh: 0; URL=' . URL . 'home');
                }
                else
                {
                    $this->loginAlertMsgs('invalidInfo');
                }
            }
            else
            {
                $this->loginAlertMsgs('invalidDomain');
            }
        }
    }

    public function userLogout()
    {
        $_SESSION = array();
        session_destroy();

        header('refresh: 0; URL=' . URL . 'home');
    }
}