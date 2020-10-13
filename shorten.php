<?php

class Shortcode{
  private $timestamp;
  private $conn;
	private $ip;
  private $code;

    //Establish connection to the database
    public function __construct(){
		    require("config.php");
		      $this->conn=$conn;
		      $this->ip = $_SERVER["REMOTE_ADDR"];
          $this->timestamp = date("Y-m-d H:i:s");
    }

    //Shorten an url
    function shortenurl($url){
      if(!$url)
        throw new Exception("Please insert URL", 1);

      $shorturl = $this->checkDB($url);
      if(!$shorturl)
        $shorturl = $this->shortcode($url);

      return $shorturl;

    }


    //Check if inserted url is already in the databas
    function checkDB($url){
      $checksql = "SELECT long_url, short_code FROM urls.shortener WHERE long_url = '$url'";
      $query = mysqli_query($this->conn, $checksql);
      $selected = mysqli_fetch_assoc($query);
      if (!$selected) {
        return NULL;
        //return 'Error: ' . mysqli_error($this->conn);
      }
      //echo mysqli_affected_rows() . " Record(s) Dropped";

      $longurl = $selected['long_url'];
      $short = $selected['short_code'];
      return $short;
    }

    //Save the user input URL and the generated code
    function shortcode($url){
      //shortcode adress
      $this->code = "https://localhost/" . substr(md5(uniqid(rand())), 1, 8);
      $insertsql = "INSERT INTO urls.shortener(long_url, short_code) VALUES ('$url', '$this->code')";
      $query2 = mysqli_query($this->conn, $insertsql);
      return $this->code;
    }

    function Listing($user,$code){
      $entry = "$user $code";
      $entry.= "\n";
      $list = file('long-short.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $key = array_search('$user', $list);
      $temp = $list[$key];
      if(empty($temp))
        file_put_contents('long-short.txt', $entry, FILE_APPEND | LOCK_EX);
      return "Already in the list";

    }



}

 ?>
