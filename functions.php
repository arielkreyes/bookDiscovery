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
