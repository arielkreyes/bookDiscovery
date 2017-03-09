<?php
require('db_config.php');
require_once('functions.php');
security_check();
include('header.php');
include('rate_parser.php');
?>
<section class="featured">
  <h2>How To Rate!</h2>
</section>
<main>
  <?php
  $query = "SELECT books.book_cover
            FROM books, ratings
            LIMIT 9";
  ?>
  <figure class='rateSquare oneThird'>
    <img src="uploads/default_small.jpg"/>
    <figcaption>
      <div>
      <?php echo $feedback; ?>
      <form method="post" action="rate.php">
       <label for="rating">
       <input type="range" min="1" max="5" step="1" value="3" name="rating" class="rating_handle">
       </label>
       <p><output for="rating" id="rated">3</output></p>
       <input type="submit" value="Rate It!"/>
       <input type="hidden" name="did_rate" value="true" />
       <input type="hidden" name="bookId" value="1" />
       <!-- TODO change the value to read the book id  -->
     </form>
       <input type="button" value="+ Review" class="review"/>
     </div>
    </figcaption>
  </figure>
</main>
<?php
include('footer.php');
?>
