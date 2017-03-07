<?php
require('db_config.php');
require_once('functions.php');
include('header.php');
?>
<section class="featured">
  <h2>How To Rate!</h2>
</section>
<main>
  <figure class='rateSquare'>
    <img src="uploads/default_small.jpg"/>
    <figcaption>
      <div>
       <label for="rating">
       <input type="range" min="1" max="5" step="1" value="3" id="rating" data-rangeslider>
       </label>
       <div class="rangeOutput">
         <output for="rating" id="rated">3</output>
       <input type="button" value="+ Review" class="review"/>
       </div>
     </div>
      <p>RATE#</p>
    </figcaption>
  </figure>
</main>
<?php
include('footer.php');
?>
