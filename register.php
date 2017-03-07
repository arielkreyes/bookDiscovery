<?php
require('db_config.php');
require_once('functions.php');
include('header.php');
include('register_parser.php');
?>

<main>
  <section class="featured">
    <h2>You're on your way to a whole new world</h2>
  </section>
  <div class="leftCol">
    <!-- User Create/Register for Account here! :D -->
    <form method="post" action="" class="register">
      <h3>Register Here</h3>
      <?php show_feedback($feedback, $errors); ?>
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
