<?php
include('header.php');
?>

<main id="register">
  <section class="featured">
    <h2>welcome Back!</h2>
    <p>
      Quick! Get back to rating and reviewing your favorite titles and the best part? Discover new adventures!
    </p>
  </section>
  <div class="leftCol">
    <!-- User Create/Register for Account here! :D -->
    <form method="post" action="" class="register">
      <h3>Register Here</h3>

      <label for="fname">First Name</label>
      <input type="text" name="fname" id="fname" />
      <label for="lname">Last Name</label>
      <input type="text" name="lname" id="lname" />
      <label for="email">Email Address</label>
      <input type="email" name="email" id="email" />
      <label for="password">Create Password</label>
      <input type="password" name="password" id="password" />

      <label>
        <input type="checkbox" name="policy" value="1" />
        I agree to the <a href="#" target="_blank">terms of service and privacy policy</a>
      </label>

      <input type="submit" value="Register"/>
      <input type="hidden" name="did_register" value="1" />
    </form>
    <a href="#">Already have an account? <i class="fa fa-sign-in" aria-hidden="true"></i> Log In.</a>
  </div>
</main>
<?php
include('footer.php');
?>
