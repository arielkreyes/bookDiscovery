<?php
require('db_config.php');
include_once('functions.php');
include('header.php');

if(isset($_GET['review_id'])){
  $review_id = $_GET['review_id'];
}else{
  $review_id = 0;
}
?>
<main>
<?php
//get the most recent 2 published book reviews
$query = "SELECT books.title, reviews.body, reviews.date, users.username, reviews.review_id, reviews.user_id
          FROM reviews, books, users
          WHERE users.user_id = reviews.user_id
          AND reviews.review_id = $review_id
          ORDER BY reviews.date DESC
          LIMIT 1";
//run the query
$result = $db->query($query);
//check to see if the result has rows(reviews) :D
if($result->num_rows >= 1){
  //loop through each row found, displaying the article each time
  while($row = $result->fetch_assoc()){
  ?>
  <article>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['body']; ?></p>
    <div class="reviewInfo">
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
