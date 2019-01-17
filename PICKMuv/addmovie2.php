<html>
<style>

body{
  background-color: black;
}
.tab {
  overflow: hidden;
  border: 1px solid;
  background-color: #f23a3a;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: #f23a3a;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  color: white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #7c0606;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: red;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.tablinks
{
  font-size: 120%;
}
.pickmuv
{
  font-size: 300%;
  font-family: arial black;
  color : #f23a3a;
}
</style>
<html>
<body>
  <div class="pickmuv">PICKMuV</div>
  <div class="tab">
  <button class="tablinks" onclick="openhom()">Home</button>
  <button class="tablinks" onclick="opendash()">Compare</button>
  <button class="tablinks" onclick="openlog()">Login</button>
  <button class="tablinks" onclick="openrate()">Rate Movies</button>
  <button class="tablinks" onclick="openaddmuv()">AddMovie</button>
  </div>
</html>



<?php

DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'MovieReg');
  $addmovie = $_POST["moviename"];
  require('simple_html_dom.php');
  $addmov = strtolower($addmovie);
  $addmuv = str_replace(" ", "_", $addmov);

  $html = file_get_html('https://www.rottentomatoes.com/m/'.$addmuv);
  $rate = $html->find('span.meter-value.superPageFontColor',0);
  $rottom = $rate->plaintext;


  $muv = str_replace(" ", "%20", $addmovie);
  $s = '/search?source=hp&ei=dCpAXISzCIPHrQGd14GwDA&q='.$muv.'&btnK=Google+Search&oq='.$muv.'&gs_l=psy-ab.3..35i39j0i67j0i20i263j0l2j0i131l2j0j0i131j0.1214.2855..3211...0.0..0.290.1709.0j4j4......0....1..gws-wiz.....0.CjUu6ojPm2c';
  $link = 'https://www.google.com'.$s;
  $html1 = file_get_html($link);
  $rateq = $html1->find('div.sDYTm', 0);
  $rate1 = $rateq->plaintext;
  $n = strlen($rate1);
  $imdb = '';
  for ($x = 0; $x <= $n-7; $x++) {
      $imdb = $imdb.$rate1[$x];
  }
  echo $imdb;

  echo $rottom;
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $sql = "INSERT INTO addmovie(Name, rottom, imdb) VALUES('$addmovie', '$rottom' , '$imdb') ";
  if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";

    session_start();
    $_SESSION['logusername']= $username;

} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
}
  $mysqli->close();
 ?>
