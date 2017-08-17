<?php
require('db_config.php');
require_once('functions.php');
security_check();
include('header.php');
include('rate_parser.php');
?>
<section class="featured rate">
  <!-- <img src="images/rate_featured.jpg" /> -->
<div class="featuredText">
<h2>Rate It. Review It. Love It.</h2>
</div>
</section>
<main>
  <h3>Rate & Review</h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
  <div class="ratingArea">
  <figure class="rateSquare oneThird">
        <img src="uploads/chemist.jpg" alt="The Chemist by Stephanie Meyer"/>
    <figcaption>
        <h4>The Chemist</h4>
  <h5>by Stephanie Meyer</h5>
      <div>
      <form method="post" action="rate.php">
       <label for="rating">
       <input type="range" min="1" max="5" step="1" value="3" name="rating" class="rating_handle">
       </label>
       <p><output for="rating" id="rated">3</output></p>
       <input type="submit" value="Rate It!"/>
       <input type="hidden" name="did_rate" value="true" />
       <input type="hidden" name="bookId" value="1" />
     </form>
       <input type="button" value="+ Review" class="review"/>
     </div>
    </figcaption>
  </figure>
    <figure class="rateSquare oneThird">
        <img src="uploads/princeofthorns.jpg" alt="The Chemist by Stephanie Meyer"/>
    <figcaption>
        <h4>Prince of Thorns</h4>
  <h5>by Martin Lawrence</h5>
      <div>
      <form method="post" action="rate.php">
       <label for="rating">
       <input type="range" min="1" max="5" step="1" value="3" name="rating" class="rating_handle">
       </label>
       <p><output for="rating" id="rated">3</output></p>
       <input type="submit" value="Rate It!"/>
       <input type="hidden" name="did_rate" value="true" />
       <input type="hidden" name="bookId" value="1" />
     </form>
       <input type="button" value="+ Review" class="review"/>
     </div>
    </figcaption>
  </figure>
  </div>
</main>
<?php
include('footer.php');
?>
