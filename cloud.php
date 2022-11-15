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
<p>////////////////////////////////</p>
<p></p>  
<?php
include_once 'upload_php/dbconfig.php';
?>    
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<div id="header">
</div>
<div class="transboxregistrationxD" id="body">
<form action="upload_php/upload.php" method="post" enctype="multipart/form-data">
<input type="file" class="w3-button w3-black" name="file" />
<button type="submit" name="btn-upload">upload</button>
</form>
<a href="cloud2.php" class="w3-button w3-black">View Cloud</a>
<br /><br />
<?php
if(isset($_GET['success']))
{
?>
<label>File Uploaded Successfully...  <a href="cloud2.php">click here to view file.</a></label>
<?php
}
else if(isset($_GET['fail']))
{
?>
<label>Problem While File Uploading !</label>
<?php
}
else
{
?>
<label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
<?php
 }
 ?>
</div>  
<div id="footer">
</div>
</body>
</html> 
</div>
</body>
</html>
