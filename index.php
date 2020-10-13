<?php

require("config.php");
require_once("database_create.php");
require("shorten.php");
/*
$shorttest = new Shortcode($db);
echo $shorttest;
$longurl1= "https://google.com/";

try{
  $shortURL = $shorttest->shortenurl($longurl1);
  echo 'Short URL: ' .$shorURL;
}
catch(Exception $e){
  echo $e->getMessage();
}
}
*/

/*Input Form*/
 ?>
 <!DOCTYPE html>
 <html>
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>URL Shortener</title>
  </head>
  <body>
  		<h1>URL Shortener</h1>
     <form action="shortener.php" method="post">
  		Insert URL: <input type="text" name="userurl"><br>
  		<br>
  		<input type="submit" value="Submit">
  	</form>
  </body>
 </html>
