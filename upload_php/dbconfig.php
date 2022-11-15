
<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "passwort123";
$dbName = "dbtuts";
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
            
                    
            
            
?>