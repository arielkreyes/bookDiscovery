<?php


function convert_timestamp($ugly){
  $date = new DateTime($ugly);
  //echo $date->format('l, F, jS, Y');
  //if echo was not present, it would not be spit out
  return $date->format('l, F, jS, Y');
}
function convert_timestampRSS($ugly){
  $date = new DateTime($ugly);
  //echo $date->format('l, F, jS, Y');
  //if echo was not present, it would not be spit out
  return $date->format('r');
}
/**
 * [to validate and sanitize user inputed data]
 * @param  [string] $dirtydata [string data(ie.username) inputted by user]
 * @return [type]   [description]
 */
function clean_string($dirtydata){
  //feed into field to dump into function itself
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirtydata, FILTER_SANITIZE_STRING));
}
function clean_int($dirtydata){
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirtydata, FILTER_SANITIZE_NUMBER_INT));
}
function clean_email($dirtydata){
  global $db;
  return mysqli_real_escape_string($db, filter_var($dirtydata, FILTER_SANITIZE_EMAIL));
}
/**
 * Helper function to display user feedback after parsing a form
 * @param  string $feedback  A quick feedback message to the user.
 * @param  array $errors 	A list of any inline field errors.
 * @return string 	Displays a div containing all the feedback and errors.
 */
function show_feedback( $feedback, $errors = array() ){
	if( isset($feedback) ){
		echo '<div class="feedback">';
		echo $feedback;
	//if there are errors, show them as a list
		if( ! empty($errors) ){
			echo '<ul>';
			foreach ($errors as $error) {
				echo '<li>' . $error . '</li>';
			}
			echo '</ul>';
		}
		echo '</div>';
	}
}
 function security_check($redirect = false){
   global $db;
   $user_id = $_SESSION['user_id'];
   $security_key = $_SESSION['security_key'];
   $query = "SELECT *
   			FROM users
   			WHERE user_id = $user_id
   			AND security_key = '$security_key'
   			LIMIT 1";
   $result = $db->query($query);
   if( !$result ){
   	//secret squirrel pages only. >:D
    if($redirect){
   	header('Location:login.php?e=noresult');
      }
   }
   if( $result->num_rows == 1 ){
   	//this person is allowed into the admin panel
   	$row = $result->fetch_assoc();
   	define('USERNAME', $row['username']);
   	define('IS_ADMIN', $row['is_admin']);
   	define('USER_ID', $row['user_id']);
   }else{
     if($redirect){
   	header('Location:login.php?e=norows');
    }
   }
 }

 function show_book_cover( $book_id ){
  global $db;
  $query = "SELECT book_cover
      FROM books
      WHERE book_id = $book_id
      LIMIT 1";
  $result = $db->query($query);
  if( $result->num_rows == 1 ){
    //display the image if it exists, otherwise show the default userpic
    $row = $result->fetch_assoc();
    if( $row['book_cover'] != '' ){
      echo '<img src="' . ROOT_URL . 'uploads/' . $row['book_cover'] .
      '.jpg" class="bookCover" alt="' . $row['book_cover'] . 'Book Cover">';
    }else{
      echo '<img src="' . ROOT_URL . 'images/default' . '.jpg" class="bookCover" alt="default bookcover">';
    }
  }
 }
