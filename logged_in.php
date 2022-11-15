<?php 
session_start();
     
    
if(!isset($_SESSION['userid'])) {
	die('Please <a href="login.php">login</a> first!');

}
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<title>WELCOME</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main2.css">


<body background="images/wall.jpg">

<div class="w3-sidebar w3-bar-block w3-card-2" style="width:10%;">
  <a href="logged_in.php" class="w3-bar-item w3-buttonA">Welcome</a>
    <a href="index.php" class="w3-bar-item w3-button">Start</a>
  <a href="myprofile.php" class="w3-bar-item w3-button">My Profile</a>
  <a href="stream.php" class="w3-bar-item w3-button">Stream</a>
  <a href="cloud.php" class="w3-bar-item w3-button">Cloud</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
<div class="transbox" style="margin-left:25%">
<h2>Welcome to your personal hompage!</h2>
<p>You can show urself your profile and edit it or check the news.</p>
<p></p>
</div>

<script>
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-green";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
    }
}
var audio = document.getElementById("audio");
var isPlaying = false;

function togglePlay() {
  if (isPlaying) {
    audio.pause()
  } else {
    audio.play();
  }
};
audio.onplaying = function() {
  isPlaying = true;
};
audio.onpause = function() {
  isPlaying = false;
};

</script>

</body>
</html>
