<?php require('db_config.php');
//use _once on function definitions to prevent duplicates and breakin' yo shit.
include_once('functions.php');
include('header.php');

//extract and sanitize the keywords that the user is searching footer
$keywords = clean_string( $_GET['keywords']);
//pagination configuration
$per_page = 1;
//start on page 1
$current_page = 1;
?>
    <main>
      <?php
      //get all the published posts taht contain the keywords in their title or body
      $query = "SELECT DISTINCT *
                FROM reviews
                WHERE is_published = 1
                AND (title LIKE '%$keywords%' OR body LIKE '%$keywords%' )";
      //run the query. Catch the returned info in a result object
      $result = $db->query($query);
      //how many posts were found?
      $total_reviews = $result->num_rows;

      //check to see if the result has rows(posts) :D
      if( $result->num_rows >= 1 ){
        //how many pages needed to hold all results?
        $total_pages = ceil( $total_posts / $per_page );
        //what page is the user trying to view?
        //URL will look like search.php?keyword=cheese&page=2
        //if the ?page variable is not set, we are on page 1
        if( $_GET['page']){
          $current_page = $_GET['page'];
        }
        //make sure they are viewing a valid page
        if( $current_page <= $total_pages ){
          echo "<h2>Search Results for $keywords</h2>";
    			echo "<h3>Showing page $current_page of $total_pages</h3>";
          //modify the original query to get teh right subset of results
          $offset = $current_page - 1 * $per_page;
    			$query = $query . " LIMIT $offset, $per_page";
          //run the modified query
          $result = $db->query($query);
          //loop through each row found, displaying the article each time
          while($row = $result->fetch_assoc()){
       ?>

       <article>
         <h2>
           <a href="single.php?review_id=<?php echo $row['review_id'] ?>">
           <?php echo $row['title']; ?>
           </a>
         </h2>
         <div class="review-info">
           <?php echo convert_timestamp($row['date']); ?>
         </div>

         <p><?php echo $row['body']; ?></p>
       </article>

    <?php
      }//end while there are posts
      $prev = $current_page - 1;
			$next = $current_page + 1;
    ?>
  <section class="pagination">
    <?php if( $current_page != 1 ){ ?>
			<a href="search.php?keywords=<?php echo $keywords; ?>&amp;page=<?php
				echo $prev; ?>">
			Previous Page</a>
		<?php } ?>
    <?php if( $current_page < $total_pages ){ ?>
      <a href="search.php?keywords=<?php echo $keywords; ?>&amp;page=<?php
        echo $next; ?>">
      Next Page</a>
    <?php } ?>
  </section>
  <?php
    }//end if the user is on a valid page
    else{
      echo 'Invalid Page';
    }

  } //end if there are posts
  else{
    echo 'Sorry, no posts to show.';
  }
  ?>
  </main>
<?php
include('footer.php');
?>
