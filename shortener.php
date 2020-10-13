<?php
require("config.php");
require("shorten.php");


$errorsign = "";
if(isset($_POST['userurl'])){
  //var_dump($_POST);
  $userurl = $_POST['userurl'];
  $toshorten = new Shortcode();
  $shortURL = $toshorten->shortenurl($userurl);
  echo "<p>The short code for <a href=\"$userurl\">$userurl</a> is <a href=\"$shortURL\">" . $shortURL . "</a></p>";




}


 ?>
