<?php
	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
	{
		header('Location: login.php');
		exit();
	}


    $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $userN = $_POST['login'];
    $userlist = file ('users.txt');

    $success = false;
    foreach ($userlist as $user){
        $user = str_replace(array("\n","\r"), '', $user);
        $user_details = explode('|', $user);
        if ($user_details[0] == $userN && password_verify($_POST['password'],$user_details[1])) {
            $success = true;
            break;
        }
    }
    if ($success) {
        $_SESSION['zalogowany'] = true;
        header('Location: index.php'); 
    } else {
        $_SESSION['blad'] = '<div class="error">Nieprawidłowy login i/lub hasło!</div>';
        header('Location: login.php');
    }
?>