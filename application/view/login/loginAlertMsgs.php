<?php

switch($msg)
{
    case 'invalidInfo':
        header('refresh: 0; URL=' . URL . 'login/index');
        $message = "Invalid email or password! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        break;
    case 'invalidDomain':
        header('refresh: 0; URL=' . URL . 'login/index');
        $message = "Invalid email domain! Login using valid email domain!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        break;
  default:
        echo "Error";
}

?>


