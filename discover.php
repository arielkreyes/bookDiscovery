<?php
require('db_config.php');
require_once('functions.php');
security_check();
include('header.php');
?>
    <section class="featured discoverFeatured">
      <img src="images/discover_featured.jpg" />
        <h2>New Books. New Adventures. New Knowledge.</h2>
        <p>Search and discover the latest and greatest.</p>
    </section>
    <main class="discover">
      <h3>Discover</h3>
      <p>Here are some new titles. Check em' out! Right now. Go. :)</p>
    </main>
<?php
include('footer.php');
?>
