<?php

switch($msg)
{
	case 'exist':
		header('refresh: 0; URL=' . URL . 'register/index');
		$message = "Account with the email " . $_POST['email'] . " already exists.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		break;
	case 'success':
		header('refresh: 0; URL=' . URL . 'login/index');
		$message = "Succesfully registered!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		break;
	case 'blank':
		header('refresh: 0; URL=' . URL . 'register/index');
		$message = "Check for blank fields and check all boxes.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		break;
	case 'mismatch':
		header('refresh: 0; URL=' . URL . 'register/index');
		$message = "Password confirmation does not match the password you entered.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		break;
	case 'invalid':
		header('refresh: 0; URL=' . URL . 'register/index');
		$message = "Invalid email domain! Re-enter email with valid email domain!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		break;
	default:
		echo "Error";
}

?>

