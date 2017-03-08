<?php
require('db_config.php');
require_once('functions.php');
include('header.php');
?>
 <section class="featured userAccount">
   <?php
   $query = "SELECT username, user_avatar
             FROM users
             WHERE ";
   ?>
   <div class="featuredTitle">
   <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>Welcome, <?php echo USERNAME; ?></h2>
   </div>
   <nav class="userNav">
     <ul>
       <li><a href="discover.php"><i class="fa fa-compass fa-2x" aria-hidden="true"></i></a></li>
       <li><a href="rate.php"><i class="fa fa-star-half-o fa-2x" aria-hidden="true"></i></a></li>
       <li><a href="user_account_settings.php"><i class="fa fa-cogs fa-2x" aria-hidden="true"></i></a></li>
     </ul>
   </nav>
 </section>
<main>
  <section class="default currentlyReading">
  <figure>
    <h4>Currently Reading</h4>
    <img src="https://placeimg.com/150/200/any" />
    <figcaption>
      <ul class="bookInfo">
        <li>//TITLE</li>
        <li>//AUTHOR</li>
      </ul>
      <input type="button" value="I'm Finished">
      <!-- when clicked will insert book into the books read table for the user -->
      <input type="button" value="Rate &amp; Review" />
    </figcaption>
  </figure>
  <!-- TODO: determine if user has chosen a book to show which book they are currently Reading -->
  </section>
  <section class="default recentlyRated">
  <h4>Recently Rated Titles</h4>
  <!-- LIMIT of 4 recently rated books -->
  <?php
  $query = "SELECT books.title, books.author, books.book_cover, ratings.rating_value, ratings.date
            FROM books, ratings, reviews
            WHERE books.book_id = ratings.book_id
            AND ratings.book_id = reviews.book_id
            ORDER BY date DESC
            LIMIT 5";
  //run it
  $result = $db->query($query);
  //check to see if the result has rows (RATED BOOKS)
	if( $result->num_rows >= 1 ){
		//loop through each row found, displaying the article each time
		while( $row = $result->fetch_assoc() ){
  ?>
    <figure class="rateSquare">
      <img src="https://placeimg.com/150/200/any" alt="<?php echo $row['book_cover'] . ' Book Cover'; ?>" title="<?php echo $row['book_cover'];?>"/>
      <figcaption>
        <p><?php echo $row['rating_value']; ?></p>
        <!-- //if rated book does not have a review attached then show review button
        //else do not show the review button or show as greyed out(not applicable) -->
        <input type="button" class="review" value="+ Review"/>
      </figcaption>
    </figure>
  </section>
<?php }//end of while loop
}//end of if num_rows ?>
  <section class="default bookshelf readBooks">
    <p>
      Images/Javascript of read books
    </p>
  </section>

  <section class="default bookshelf wishlist">
    <p>
      Images/Javascript of wishlist
    </p>
  </section>
</main>
<?php include('footer.php');  ?>
