<!DOCTYPE html>
<html>
    
        <link rel="stylesheet" href="css/main1.css">
 
<body background="images/wall.jpg">
    
    
<ul>
    <li><a href="index.php">Start</a></li>    
    <li><a class="active" href="registration.php">Registration</a></li>
    <li><a href="logged_in.php">Member</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li style="float:right"><a href="about.php">About</a></li>
</ul>

 <title>Registration</title>
         <div class="transboxindex" style="margin-left:30.5%">
 <h1>Registration</h1>
 <h2><font size="-0,5">Register Below!</font></h2>
 
    
<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '5kzxrd!poS)E9]GT');

 $showFormular = true;
 
 if(isset($_GET['register'])) {
 $error = false;
 $email = $_POST['email'];
 $username = $_POST['username'];
 $passwort = $_POST['passwort'];
 $passwort2 = $_POST['passwort2'];
 
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo 'Please enter a valid E-Mail<br>';
	$error = true;
}
if(strlen($passwort) == 0) {
	echo 'Please enter a password<br>';
	$error = true;
}
if($passwort != $passwort2) {
	echo 'The passwords have to match<br>';
	$error = true;
}
 if(empty($username)) {
 $error = 'Please use a Username!<br>'; 
 }

//Email Check
if(!$error) {
	$statement = $pdo->prepare("SELECT * FROM entrytable WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();
    
if(!$error) {
	$statement = $pdo->prepare("SELECT * FROM entrytable WHERE username = :username");
	$result = $statement->execute(array('username' => $username));
	$hehexd = $statement->fetch();
    
if($hehexd !== false) {
    echo 'This Username is already taken<br>';
    $error = true;
	
if($user !== false) {
	echo 'This E-Mail is already taken<br>';
	$error = true;
}
}
}
}

//No Errors, create User
if(!$error) {
	$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
	
$statement = $pdo->prepare("INSERT INTO entrytable (username, email, passwort) VALUES (:username, :email, :passwort)");
$result = $statement->execute(array('username' => $username, 'email' => $email, 'passwort' => $passwort_hash));

if($result) {
	echo 'Your registration was successfully, you can <a href="login.php">login</a> with your account now.';
 
	$showFormular = false;
} else {
	echo 'Save failed, please try again<br>';
}}}

if ($showFormular) {
?>
 
<form action="?register=1" method="post">
    <table class="transboxregistration">
        <tr class="register-tr">
            <td class="register-td">E-Mail:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="email" size="40" maxlength="250" name="email" placeholder="enter email ..."></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td">Username:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="text" size="40" maxlength="250" name="username" placeholder="enter username ..."></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td">Your Password:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="password" size="40" maxlength="250" name="passwort" placeholder="enter password ..."><br></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td">Rep. Password:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="password" size="40" maxlenght="250" name="passwort2" placeholder="repeat password ..."><br></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="submit" value="Register"></td>
        </tr>

    </table>
</form>
    </div>    

<?php

}
?>

</body>
</html>