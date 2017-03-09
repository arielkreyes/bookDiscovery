<?php
if($_POST['did_rate']){
  $book_id = clean_int($_POST['bookId']);
  $user_id = USER_ID;
  $rating = clean_int($_POST['rating']);
  //TODO VALIDATE ZIS. :)

  $query = "INSERT INTO ratings
            (user_id, book_id, rating_value, date)
            VALUES
            ($user_id, $book_id, $rating, now())";
  //run it
  $result = $db->query($query);
  if(!$result){
    $feedback = $db->error;
  }
  //check it
  if($db->affected_rows == 1){
    $feedback = 'Yay :D';
  }//end of affected rows
  else{
    $feedback .= ':(';
  }

}
