<?php
require('db_config.php');
include_once('functions.php');
//echo out the xml declaration since the</ characters confuse the PHP parser
echo '<?xml version="1.0" encoding="UTF-8"?>';
//get up to 10 most recent page
$query = "SELECT books.title, reviews.body, reviews.date, users.username, users.user_id, reviews.review_id
          FROM reviews, books, users
          WHERE users.user_id = reviews.user_id
          ORDER BY reviews.date DESC
          LIMIT 10";
//run it
$result = $db->query($query);
//check it
if(!$result){
  die($db->error);
}
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <title>Recent Book Reviews</title>
    <link>https://localhost/reyesariel/bookDiscovery/</link>
    <description>book discovery RSS</description>
    <atom:link href="http://dallas.example.com/rss.xml" rel="self" type="application/rss+xml" />
    <?php while($row = $result->fetch_assoc()){ ?>
    <item>
      <title><?php echo $row['title']; ?></title>
      <link>https://localhost/reyesariel/blog/single.php?post_id=<?php echo $row['post_id']; ?></link>
      <guid>https://localhost/reyesariel/blog/single.php?post_id=<?php echo $row['post_id']; ?></guid>
      <pubDate>1200</pubDate>
      <author><?php echo $row['username']; ?> (<?php echo $row['username']; ?>)</author>
      <description><![CDATA[ <?php echo $row['body']; ?>]]></description>
    </item>
    <?php }//end of while loopy loop ?>
  </channel>
</rss>
