
<?php
session_start();

if(!isset($_SESSION['userid'])) {
	die('Please <a href="login.php">login</a> first!');

}
$userid = $_SESSION['userid'];
if (!isset($_SESSION["easter-egg"])) {
    $_SESSION["easter-egg"] = 0;
}
?>
<!DOCTYPE html>
<html>
<title>MYPROFILE</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link rel="stylesheet" href="css/main2.css">

<body background="images/wall.jpg">
<audio id="audio" src="mp3/Accordion.mp3" preload="auto"></audio>
<div class="w3-sidebar w3-bar-block w3-card-2" style="width:10%;">
  <a href="logged_in.php" class="w3-bar-item w3-button">Welcome</a>
    <button class="w3-buttonA w3-block w3-left-align" onclick="myAccFunc()">
        My Profile <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoAcc" class="w3-hide w3-white w3-card-2 w3-show">
  <a href="show_profile.php" class="w3-bar-item2 w3-button2">Show Profile</a>
  <a href="edit_profile.php" class="w3-bar-item2 w3-button2">Edit Profile</a>  
  </div>
 
  <a href="stream.php" class="w3-bar-item w3-button">Stream</a>
    <a href="cloud.php" class="w3-bar-item w3-button">Cloud</a>  
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
   <form>

  <input type="text" name="searched-text" id="searched-text" placeholder="Search..." accesskey="s">
       
</form> 
    
</div>
    
<div class="w3-container transbox" style="margin-left:25%">
<h2>My Profile</h2>
<p>Choose your prefered options.</p>
<p></p>
</div>
<div class="CENTER" style="margin-left:35%">
    <?php
if (!empty($_GET["searched-text"])) {
    htmlentities($_GET["searched-text"]) . "</h3>";
    // The comparison is case-insensitive
    if (strcasecmp($_GET["searched-text"], "accordion") == 0) {
        $_SESSION["easter-egg"]++;
        if ($_SESSION["easter-egg"] == 1) {
        echo "EASTER EGG BOIIIIIIS<br>";
        echo "<audio id='mp3/Accordion.mp3' controls preload autoplay='autoplay' loop><source src='mp3/Accordion.mp3' /></audio>";
        
   
        echo "<div style=\"border: 5px solid #000000;\">
            
            <img src='images/spongebob.gif" ,"' alt='error'>
            <img src='images/patrick.gif" ,"' alt='error'>
            <img src='images/accordion.gif" ,"' alt='error'>
            <img src='images/skya.gif" ,"' alt='error'></div><br>";
          
            $_SESSION["easter-egg"] = 0;
        }
    }
    else {
        $_SESSION["easter-egg"] = 0;
    }
}
else {
    $_SESSION["easter-egg"] = 0;
}
?>
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
