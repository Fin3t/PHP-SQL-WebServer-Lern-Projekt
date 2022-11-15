<?php 
session_start();
     
    
if(!isset($_SESSION['userid'])) {
	die('Please <a href="test1.php">login</a> first!');

}
$userid = $_SESSION['userid'];



echo "HALLO"

?>
 <a href="test1.php" class="w3-bar-item w3-buttonA">BACK</a>

//////////////////////////////////////////////////////////////

    <?php
    
 $con=mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM entrytable WHERE id = '".$_SESSION['userid']."' ");

while($row = mysqli_fetch_array($result))
{

echo "<td>" . $row['email'] . "</td>";
}



mysqli_close($con);
    ?>
