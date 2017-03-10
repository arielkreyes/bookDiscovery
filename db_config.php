<?php
error_reporting( E_ALL & ~E_NOTICE );
$host = 'localhost';
$username = 'ar_bookdiscovery';
$password = 'peRu9JpTGBVTXEPb';
$database = 'ar_bookdiscovery';
//connect to the database!
$db = new mysqli($host, $username, $password, $database);
//starts ze session :)
session_start();
//check to make sure it works :)
if($db->connect_error > 0){
  die('Can not connect to ze Database. Try again...maybe later...');
}//end of if statement
//hashes and salts enter here!
define('SALT', 'mnkdfotikosjzsghkljdflkgj');
// define path for background images for the featured section
define('ROOT_URL', 'http://localhost/bookDiscovery/');
define('ROOT_PATH', 'C:\xampp\htdocs\bookDiscovery');
//
?>
