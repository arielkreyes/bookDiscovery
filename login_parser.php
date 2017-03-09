<?php
session_start();
require('db_config.php');
//function file here!!
include_once('functions.php');
//begin parsing LOGIN form IF the user has submitted :)
if($_POST['did_login']){
  $feedback = 'parser stuffs';
  //clean the values the user typed in:
  $username = clean_string($_POST['username']);
  $password = clean_string($_POST['password']);

  if(strlen($username) >= 5 AND strlen($username) <= 50 AND strlen($password) >= 8 ){
    //look up user in ze database
    $password = sha1($password . SALT);
    $query = "SELECT user_id
              FROM users
              WHERE username = '$username'
              AND password = '$password'
              LIMIT 1";
    //run it
    $result = $db->query($query);
    //check it
    if($result->num_rows == 1){
      //SUCCESS YO!
      //remember me for a week :)
      $security_key = sha1(microtime() . SALT);
      //store it in ze database!
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];

      $query = "UPDATE users
                SET security_key = '$security_key'
                WHERE user_id = $user_id
                LIMIT 1";
      $result = $db->query($query);
      //week expiration!
      $expiration = time() + 60 * 60 * 24 * 7;

      setcookie('security_key', $security_key, $expiration);
      $_SESSION['security_key'] = $security_key;

      setcookie('user_id', $user_id, $expiration);
      $_SESSION['user_id'] = $user_id;
      //make sure ze query worked!
      if( !$result){
        die($db->error);
      }
      //send to account page
      header('location:account.php');
    }else{
      //show user Error
      $feedback = 'Your username and password combination is incorrect. Please try again.';
    }
  }//end of if num_rows check
  else{
    $feedback = 'Username or password are not the right length. Please try again.';
  }
}//end of if did_login

//is the user trying to log out?
//URL looks like ...login.php?action=logout
if( $_GET['action'] == 'logout' ){

	//remove the security key from the DB
	$user_id = $_SESSION['user_id'];
	$query = "UPDATE users
				SET security_key = ''
				WHERE user_id = $user_id
				LIMIT 1";
	$result = $db->query($query);

	// from php.net session_destroy docs
	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}
	session_destroy();
	//expire the cookies
	setcookie('security_key', '', time() - 9999);
	setcookie('user_id', '', time() - 9999);


} //end of logout logic

//no close PHP here because there is not HTML below in this file...
