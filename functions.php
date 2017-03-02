<?php


function convert_timestamp($ugly){
  $date = new DateTime($ugly);
  //echo $date->format('l, F, jS, Y');
  //if echo was not present, it would not be spit out
  return $date->format('l, F, jS, Y');
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

?>
