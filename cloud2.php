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
  <a href="logged_in.php" class="w3-bar-item w3-button">Welcome</a>
  <a href="myprofile.php" class="w3-bar-item w3-button">My Profile</a>
 <a href="stream.php" class="w3-bar-item w3-button">Stream</a>
  <a href="cloud.php" class="w3-bar-item w3-buttonA">Cloud</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
<div class="w3-container transbox" style="margin-left:25%">
<h2>Your Cloud</h2>
<p>HEHEXD</p>
<p></p>
    
    
    
    
    
    <?php
include_once 'upload_php/dbconfig.php';
?>
    
    
    
    
    
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HEHEXD TEEEEEEEEST</title>
<link rel="stylesheet" href="cssupload/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>TEST123</label>
</div>
<div id="body">
 <table width="100%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="/cloud.php">upload new files...</a></label></th>
        
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
  $con=mysqli_connect("localhost","root","","dbtuts");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error(); //FAIL TO CONNECT
}

$result = mysqli_query($con,"SELECT * FROM tbl_uploads"); //SELEKTION AUS DER DB
     if (!$result) {
    printf("Error: %s\n", mysqli_error($con)); //FEHLERMELDUNG
    exit();
}
 
 while($row = mysqli_fetch_array($result))
 {  //ANZEIGE TABELLE AUS DER DB
  ?> 
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>    
        <td><?php echo $row['size'] ?></td>
        <td><a href="upload_php/uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
     
    </table>
    
</div>
<div id="footer">
</div>
</body>
</html>
    
    
    
    
    
    
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
