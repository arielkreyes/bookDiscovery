<?php
require('db_config.php');
require_once('functions.php');
security_check();
include('header.php');

if(isset($_GET['review_id'])){
  $review_id = $_GET['review_id'];
}else{
  $review_id = 0;
}
?>
    <section class="featured discover">
      <div class="featuredText">
        <h2>New Books. New Adventures. New Knowledge.</h2>
        <p>Search and discover the latest and greatest.</p>
        </div>
    </section>
    <main class="discover">
      <h3>Discover</h3>
      <p>Here are some recently reviewed titles. Check em' out!</p>
      <?php
      //get the most recent 2 published book reviews
      $query = "SELECT books.title, reviews.body, reviews.date, users.username, users.user_id, reviews.review_id
                FROM reviews, users, books
                WHERE users.user_id = reviews.user_id
                AND books.book_id = reviews.book_id
                ORDER BY reviews.date DESC
                LIMIT 2";
      //run the query
      $result = $db->query($query);
      //check to see if the result has rows(reviews) :D
      if($result->num_rows >= 1){
        //loop through each row found, displaying the article each time
        while($row = $result->fetch_assoc()){
        ?>


      <article>
        <h4><?php echo $row['title']; ?></h4>
        <p><?php echo $row['body']; ?></p>
        <div>
          By <?php echo $row['username']; ?>
          on <?php echo convert_timestamp($row['date']); ?>
        </div>
      </article>
    <?php
      }//end of while loop
    }//if there are posts statement
    ?>
    </main>
<?php
include('footer.php');
?>
