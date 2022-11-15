<?php 
session_start();
     
    
if(!isset($_SESSION['userid'])) {
	die('Please <a href="login.php">login</a> first!');

}
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<title>NEWS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main2.css">

<body background="images/wall.jpg">
<div class="w3-sidebar w3-bar-block w3-card-2" style="width:10%;">
  <a href="logged_in.php" class="w3-bar-item w3-button">Welcome</a>
  <a href="myprofile.php" class="w3-bar-item w3-button">My Profile</a>
  <a href="stream.php" class="w3-bar-item w3-buttonA">Stream</a>
      <a href="cloud.php" class="w3-bar-item w3-button">Cloud</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
<div class="w3-container transbox" style="margin-left:25%">
<h2>LOLTYLER</h2>
<p>Live Stream:</p></div>
<p><iframe style="margin-left:25%" width="1010" height="500"
src="https://player.twitch.tv/?volume=0.57&!muted&channel=loltyler1">
</iframe></p>

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
