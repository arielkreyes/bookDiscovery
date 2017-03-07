<?php
//begin parser
if($_POST['did_register']){
  //sanitize everything
  $username = clean_string($_POST['username']);
  $email = clean_string($_POST['email']);
  $password = clean_string($_POST['password']);
  $policy = clean_int($_POST['policy']);
  //validate
  $valid = 1;
  //username wrong Length
  if(strlen($username) < 5 OR strlen($username) > 50){
      $valid = 0;
      $errors['username'] = 'choose a username between 5 and 50 characters long.';
    }else{
    //username is already taken
    $query = "SELECT username FROM users
              WHERE username = '$username'
              LIMIT 1";
    //runs it
    $result = $db->query($query);
    if($result->num_rows == 1){
      $valid = 0;
      $errors['username'] = 'Sorry, that username is already in use. Please choose another.';
    }
  }//end of run it
  //password wrong Length
  if(strlen($password) < 8 ){
    $valid = 0;
    $errors['password'] = 'Your password needs to be at least 8 characters. Please try again.';
  }
  //email not correct format
  if( ! filter_var($email, FILTER_VALIDATE_EMAIL)){
    $valid = 0;
    $errors['email'] = 'Please provide a valid email address.';
  }//END OF email validator
  else{
    //email has been traken
    $query = "SELECT email FROM users
              WHERE email = '$email'
              LIMIT 1";
    $result = $db->query($query);
    if($result->num_rows == 1){
      $valid = 0;
      $errors['email'] = 'That email is already registered. Do you want to log in instead?';
    }//end of run it
  }//end of else/run it
  //policy box not checked! >:|
  if($policy !=1){
    $valid = 0;
    $errors['policy'] = 'Please agree to our terms before signing up.';
  }
  //if valid update our table with our new user!! :D
  if($valid){
    //add salt to make it hard for hackers to have fun -_-
    $password = sha1($password . SALT);
    echo $query = "INSERT INTO users
              (username, password, email)
              VALUES
              ('$username', '$password', '$email')";
    $result = $db->query($query);
    //if it worked, tell user to login and start exploring
    if($db->affected_rows == 1){
      $feedback = 'Yay! youre created.';
    }
  }//end of if valid staetment!
  else{
    //if failed, show user feedback Please
    $feedback = 'There are errors in the form, please fix them and try again';
  }
}//end of did_register parser
