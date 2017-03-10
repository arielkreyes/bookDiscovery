<?php
require('db_config.php');
require_once('functions.php');
include('login_parser.php');
security_check();
include('header.php');
?>

<main>
  <section class="featured">
    <img src="images/login_featured.jpg" />
    <h2>welcome Back!</h2>
    <p>
      Quick! Get back to rating and reviewing your favorite titles and the best part? Discover new adventures!
    </p>
  </section>
  <div class="leftCol">
    <!-- User Create/Register for Account here! :D -->
    <!--TODO: turn action into $_SERVER :) -->
    <form action="login.php" class="f-login wrap" method="post" >
      <h3>Login to your account here! </h3>
      <?php echo $feedback; ?>
      <label for="login-username">Username</label>
      <input id="login-username" type="text" name="username" value="" autofocus required />

      <label for="login-password">Password</label>
      <input id="login-password" type="password" name="password" value="" required />

      <input type="submit" name="submit" value="Log In"/>
      <input type="hidden" name="did_login" value="true" />
    </form>
  </div>
</main>
<?php
include('footer.php');
?>
