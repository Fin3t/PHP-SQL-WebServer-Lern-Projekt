<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HEHEXD</title>
<link rel="stylesheet" href="cssupload/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>HEHEXD123TEST</label>
</div>
<div id="body">
 <table width="80%" border="1">
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
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
     
    </table>
    
</div>
</body>
</html>