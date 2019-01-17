
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
#form
{ width: 100%;
  height: 100%;
  margin-left: 35%;
  margin-top: 2%;

}
#lab
{ font-family: sans-serif;
  font-size: 110%;
  color: #f23a3a ;
  margin-top: 5%;

}
#muvname
{
  width: 25%;
  height: 5%;
}
#sbmtbtn
{
  width: 7%;
  height: 120%;
  margin: 6%;
}
#usrname
{
  color: white;
  font-size: 150%;
}
#cont5
{
  display: flex;
  flex-direction: column;
}
#img1
{
  height: 100%;
  width: 100%;
}
.imgcont
{
  position: relative;
}

</style>

<?php
session_start();
$username1 = $_SESSION['logusername'];

?>
<body>
  <div class="pickmuv">PICKMuV</div>
  <div class="tab">
  <button class="tablinks" onclick="openhom()">Home</button>
  <button class="tablinks" onclick="opendash()">Compare</button>
  <button class="tablinks" onclick="openlog()">Login</button>
  <button class="tablinks" onclick="openrate()">Rate Movies</button>
  <button class="tablinks" onclick="openaddmuv()">AddMovie</button>
  </div>
<div id = "usrname">
</div>

<div id = "lab">Add a movie that you suggest should be uploaded</div>
<form method="post" action="addmovie2.php" id="form">
<div id = "cont5">
  <input type="text" id = "muvname" name="moviename" ></input>

  <input type="submit" value="add movie" id="sbmtbtn"></input>
</div>
</form>


<script>
function openaddmuv()
{
  window.location.href = 'addmovie.php';
}
function openhom()
{
window.location.href = 'home2.php';
}
function openlog()
{
window.location.href = "login.php"
}
function opendash()
{
  window.location.href = 'dashboard.php';
}
function openrate()
{
  window.location.href = 'ratemuvs.php';
}
var usr = document.getElementById('usrname');
var usrnam = "<?php echo $username1  ?>";
usr.innerHTML = usrnam ;
</script>
</body>
</html>
