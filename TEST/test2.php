<?php
session_start();

?>
<?php
 $editicon = '<img src="/images/editicon.jpg" height="13" width="15">';
 $deleteicon = '<img src="/images/deleteicon.png" height="13" width="15">';

$con=mysqli_connect("localhost","root","","test");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    
    if(!isset($_SESSION['userid'])) {
	echo('EINLOGEN REEEEEEEEEEEEEEE');
} 
    if(isset($_SESSION['userid'])) {
    $result = mysqli_query($con,"SELECT * FROM entrytable WHERE id = '".$_SESSION['userid']."' ");
        
    
if($row = mysqli_fetch_array($result)){
    
    
    
    
    
    
        
	echo $deleteicon;
    echo $editicon;
} 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}



?>