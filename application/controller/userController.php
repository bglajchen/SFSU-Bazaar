<?php

/* 
 * User Controller
 */

class UserController extends Controller
{   
    
    /**
     * PAGE: index
     * Renders the user's index page
     */
    public function index()
    {   
        $user = User::get(2);

        require APP . 'view/_templates/header.php';
        require APP . 'view/user/index.php';
        require APP . 'view/_templates/footer.php';
    }
}

