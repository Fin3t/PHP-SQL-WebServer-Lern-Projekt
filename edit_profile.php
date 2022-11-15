<?php 
session_start();
     
    
if(!isset($_SESSION['userid'])) {
	die('Please <a href="login.php">login</a> first!');

}
$userid = $_SESSION['userid'];

?>
<!DOCTYPE html>
<html>
<title>EDIT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main2.css">

<body background="images/wall.jpg">
    

<div class="w3-sidebar w3-bar-block w3-card-2" style="width:10%;">
  <a href="logged_in.php" class="w3-bar-item w3-button">Welcome</a>
    <button class="w3-buttonA w3-block w3-left-align" onclick="myAccFunc()">
        My Profile <i class="fa fa-caret-down"></i>
    </button>
    <div id="demoAcc" class="w3-hide w3-white w3-card-2 w3-show">
  <a href="show_profile.php" class="w3-bar-item w3-button2">Show Profile</a>
  <a href="edit_profile.php" class="w3-bar-item w3-buttonA2">Edit Profile</a> 
  </div>
 
  <a href="stream.php" class="w3-bar-item w3-button">Stream</a>
      <a href="cloud.php" class="w3-bar-item w3-button">Cloud</a>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
    
<div class="w3-container transbox" style="margin-left:25%">
<h2>Edit Profile</h2>
<p>Edit your pofile here.</p>
<p></p>


	<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="edit_profile.php" enctype="multipart/form-data"  ">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
  <a href="view2.php" class="w3-button w3-black">View Pictures</a>
</div>

    </div>
<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "test");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

 	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
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

