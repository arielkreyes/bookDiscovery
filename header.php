<?php
// session_start();
//security check!  If the user does not have a valid key, send them back to the login form
$user_id = $_SESSION['user_id'];
$security_key = $_SESSION['security_key'];
$query = "SELECT *
			FROM users
			WHERE user_id = $user_id
			AND security_key = '$security_key'
			LIMIT 1";
$result = $db->query($query);
if( !$result ){
	header('Location:../login.php?e=noresult');
}
if( $result->num_rows == 1 ){
	//this person is allowed into the admin panel
	$row = $result->fetch_assoc();
	define('USERNAME', $row['username']);
	define('IS_ADMIN', $row['is_admin']);
	define('USER_ID', $row['user_id']);
}else{
	header('Location:../login.php?e=norows');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Book Discovery</title>
    <link rel="stylesheet" href="css/reset.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="alternate" type="application/rss+xml" href="rss.php" title="book discovery RSS feed!" />
    <script src="https://use.fontawesome.com/ea07c8ffc1.js"></script>
  </head>
  <body>
    <header>
      <a href="index.php"><h1>Book Discovery</h1></a>
      <nav class="utility">

          <?php if('did_login'){ ?>
          //if user succesfully logged in show username instead of register in utility nav bar
          <ul>
          <li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register </a></li>
          <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a></li>
          <li><a href="rss.php"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          <li><a href="#" alt="Search Icon" title="Search Icon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
          </ul>
          <ul class="utilityloggedin">
            <li class="users"><a href="admin_editprofile.php"><?php echo USERNAME; ?></a></li>
            <li class="blog"><a href="../">Back to Blog</a></li>
            <li class="logout warn"><a href="../login.php?action=logout">Log Out</a></li>
          </ul>
          <?php }//end of did log in  ?>
         <form class="search" action="search.php" method="get">
              <label for="the_keywords">
            <input type="search" name="keywords" id="the_keywords" placeholder="Discover..." value="<?php echo $keywords ?>"></label>
          </form>
      </nav>
      <nav class="global">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="#">Rate</a></li>
          <li><a href="#">Discover</a></li>
        </ul>
      </nav>
    </header>
