<!DOCTYPE html>
<html>
    
        <link rel="stylesheet" href="css/main1.css">
 
<body background="images/wall.jpg">
    
    

<ul>
  <li><a href="index.php">Start</a></li>    
  <li><a href="registration.php">Registration</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li style="float:right"><a href="about.php">About</a></li>
</ul>
<div class="transboxindex" style="margin-left:30.5%">
<h1>Logout successfull</h1>
<?php header( "refresh:3;url=../index.php" ); ?> 
Return to <a href="index.php">start</a>
    </div>

<?php
    
session_start();
session_destroy();
 
?>


    

</body>
</html>