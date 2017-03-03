<?php
require('db_config.php');
require_once('functions.php');
include('header.php');
  //sanitize errrrthag
  if($_POST['did_register']){
    $username = clean_string($_POST['username']);
    $email = clean_email($_POST['email']);
    $password = clean_string($_POST['password']);
    $policy = clean_int($_POST['policy']);
  //validate
  $valid = 1;
  //username wrong length
  if(strlen($username) < 5 OR strlen($username) > 50){
    $valid = 0;
    $errors['username'] = 'Choose a username between 5 and 50 characters.';
  }else{
    //username already taken
    $query = "SELECT username FROM users
              WHERE username = '$username'
              LIMIT 1";
    //run dis shits
    $result = $db->query($query);
    //check it
    if($result->num_rows == 1){
      $valid = 0;
      $errors['username'] = 'Sorry, that username is already in use. Please Choose another.';
    }//end of if statement query
  }//end of else statement
  //password wrong length!
  if(strlen($password) < 8){
    $valid = 0;
    $errors['password'] = 'Your password needs to be at least 8 characters.';
  }
  //email wrong format
  if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
    $valid = 0;
    $errors['email'] = 'Please provide a valid email.';
  }else{
    //email already taken
    $query = "SELECT email FROM users
              WHERE email = '$email'
              LIMIT 1";
    //run it
    $result = $db->query($query);
    if($result->num_rows == 1){
      $valid = 0;
      $errors['email'] = 'Tha email is already registered. Do you want to log in?';
    }//end of if result num rows
  }
  //policy box not checked
  if($policy !=1){
    $valid = 0;
    $errors['policy'] = 'You must agree to our terms before signing up.';
  }//end of if statement
  //if valid, add the user to the users table! ^_^
  if($valid){
    //add salt to make harder to hack :)
    $password = sha1($password. SALT);
    $query = "INSERT INTO users
              (username, password, email, is_admin)
              VALUES
              ('$username', '$password', '$email', 0)";
              //hashing the passord here....
    //run it
    $result = $db->query($query);
    //if worked, tell them to start discovering!
    if($db->affected_rows == 1){
      //affected rows would be stated during the //check it part of the process in the select statement. used for update, insert, and delete
      $feedback = 'You are now signed up! Begin your discovery now! :)';
    }else{
      //if failed, show user feedback
      $feedback = 'Sorry, your account was not created. :(';
    }//end of else statement
  }//end of if validate
    else{
    $feedback='There are errors in the form, please fix them and try again.';
  }//end of else statement
}//end of if did register
//end parser
?>

<main>
  <section class="featured">
    <h2>You're on your way to a whole new world</h2>
  </section>
  <div class="leftCol">
    <!-- User Create/Register for Account here! :D -->
    <form method="post" action="" class="register">
      <h3>Register Here</h3>
      <?php echo $feedback; ?>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" />
      <span class="hint">Between 5 - 50 Characters</span>
      <label for="email">Email Address</label>
      <input type="email" name="email" id="email" />
      <label for="password">Create Password</label>
      <input type="password" name="password" id="password" />
      <span class="hint">At Least 8 Characters Long</span>
      <label>
        <input type="checkbox" name="policy" value="1" />
        I agree to the <a href="#" target="_blank">terms of service and privacy policy</a>
      </label>
      <input type="submit" value="Register"/>
      <input type="hidden" name="did_register" value="1" />
    </form>
    <a href="login.php">Already have an account? <i class="fa fa-sign-in" aria-hidden="true"></i> Log In.</a>
  </div>
</main>
<?php
include('footer.php');
?>
