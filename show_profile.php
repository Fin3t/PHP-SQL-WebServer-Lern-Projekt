<?php 
session_start();
     
    
if(!isset($_SESSION['userid'])) {
	die('Please <a href="login.php">login</a> first!');

}
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<title>SHOW</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main2.css">

<body background="images/wall.jpg">

<div class="w3-sidebar w3-bar-block w3-card-2" style="width:10%;">
  <a href="logged_in.php" class="w3-bar-item w3-button">Welcome</a>
    <button class="w3-buttonA w3-block w3-left-align" onclick="myAccFunc()">
        My Profile <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoAcc" class="w3-hide w3-white w3-card-2 w3-show">
  <a href="show_profile.php" class="w3-bar-item w3-buttonA2">Show Profile</a>
  <a href="edit_profile.php" class="w3-bar-item w3-button2">Edit Profile</a>
  </div>
 
   <a href="stream.php" class="w3-bar-item w3-button">Stream</a>
      <a href="cloud.php" class="w3-bar-item w3-button">Cloud</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
<div class="w3-container transbox" style="margin-left:25%">
<h2>Your Profile</h2>
<p>Below you can see your data according to your id:</p>

<table class="HEHEXD"
       
       
<tr class="register-tr">
<td class="tabelle">
    <?php
    
 $con=mysqli_connect("localhost","root","passwort123","test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM entrytable WHERE id = '".$_SESSION['userid']."' ");

echo "<table border='1' border-color=black>
<tr>
<th>E-Mail</th>
<th>Registration Date</th>
<th>Password</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['created_at'] . "</td>";
echo "<td>" . '***' . "</td>";
echo "</tr>";
}
echo "</table>";


mysqli_close($con);
    ?>
    </td>
</tr>
</table>

    
    
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
