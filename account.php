<?php
require('db_config.php');
require_once('functions.php');
include('security.php');
include('header.php');
 ?>
 <section class="featured userAccount">
   <p>
     <i class="fa fa-user-circle-o" aria-hidden="true"></i>
   </p>
   <h2>Welcome, USERNAME</h2>
   <nav class="userNav">
     <ul>
       <li><a href="#"><i class="fa fa-compass" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
       <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
     </ul>
   </nav>
 </section>
<main>
  <figure class="currentlyReading">
    <h4>Currently Reading</h4>
    <img src="uploads/default_small.jpg" />
    <figcaption>
      <ul class="bookInfo">
        <li>BOOK TITLE</li>
        <li>BOOK AUTHOR</li>
      </ul>
      <input type="button" value="I'm Finished">
      <input type="button" value="Rate &amp; Review" />
    </figcaption>
  </figure>
  <?php
  $query = "SELECT title, author FROM books";
  //run it
  $result = $db->query($query);
  //check it
  //check to see if the result has rows (posts)
	if( $result->num_rows >= 1 ){
		//loop through each row found, displaying the article each time
		$row = $result->fetch_assoc() ){
  ?>

  <section class="recentlyRated">
    <!-- LIMIT of 5 recently rated books -->
    <figure class='rateSquare'>
      <img src="uploads/default_small.jpg" alt="Prince of Thorns Book Cover" title="Prince of Thorns Book Cover"/>
      <figcaption>
        <div class="rangeslider"></div>
        <p>RATE_VALUE</p>
        <input type="button" class="review" value="+ Review"/>
      </figcaption>
    </figure>
  </section>

  <section class="bookshelf readBooks">
    <p>
      Images/Javascript of read books
    </p>
  </section>

  <section class="bookshelf wishlist">
    <p>
      Images/Javascript of wishlist
    </p>
  </section>
</main>
<?php include('footer.php');  ?>
