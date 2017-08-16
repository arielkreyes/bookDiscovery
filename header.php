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
          <?php if(defined('USERNAME')){ ?>
					<ul class="utilityLoggedin">
            <li class="users"><a href="account.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo ' ' . USERNAME; ?></a></li>

            <li class="logoutWarn"><a href="login.php?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
						<li><a href="rss.php"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
						<li><a href="#" alt="Search Icon" title="Search Icon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
          </ul>
					<?php }else{//end of did log in  ?>
          <ul>
          <li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register </a></li>
          <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</a></li>
          <li><a href="rss.php"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          <li><a href="#" alt="Search Icon" title="Search Icon"><i class="fa fa-search" aria-hidden="true"></i></a></li>
          </ul>
					<?php }//end of else ?>
         <form class="search" action="search.php" method="get">
              <label for="the_keywords">
            <input type="search" name="keywords" id="the_keywords" placeholder="Discover..." value="<?php echo $keywords ?>"></label>
            <input type="submit" value="Find" class="btn_search" />
          </form>
      </nav>
      <nav class="global">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="rate.php">Rate</a></li>
          <li><a href="discover.php">Discover</a></li>
        </ul>
      </nav>
    </header>
