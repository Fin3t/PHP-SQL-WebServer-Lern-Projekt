<!DOCTYPE html>
<html>
    
        <link rel="stylesheet" href="css/main1.css">
 
<body background="images/wall.jpg">
    
    

<ul>
  <li><a href="index.php">Start</a></li>    
  <li><a href="registration.php">Registration</a></li>
    <li><a href="logged_in.php">Member</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li style="float:right"><a href="about.php">About</a></li>
</ul>


	
    <title>Login</title>
     <div class="transboxindex" style="margin-left:30.5%">
	<h1>Login</h1>
   
	 <h2><font size="-0,5">Login Below!</font></h2>
	

<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '5kzxrd!poS)E9]GT');

if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM entrytable WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
if ($user !== false && password_verify($passwort, $user['passwort'])) {
	$_SESSION['userid'] = $user['id'];
    header( "refresh:3;url=../index.php" ); 
	die('LOGIN SUCESSFULLY. GO BACK TO <a href="index.php">START</a>');
    
} else {
	$errorMessage ="EMAIL OR PASSWORD WRONG<br>";
 }
}
?>

<?php
if(isset($errorMessage)) {
	echo $errorMessage;
}
?>

<form action="?login=1" method="post">
    <table class="transboxregistration">
        <tr class="register-tr">
            <td class="register-td">E-Mail:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="email" size="40" maxlength="250" name="email" placeholder="enter email ..."></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td">Password:</td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="password" size="40" maxlength="250" name="passwort" placeholder="enter password ..."><br></td>
        </tr>
        <tr class="register-tr">
            <td class="register-td"><input type="submit" value="Login"></td>
        </tr>

    </table>
</form> 
    
    </div>  
    
    
    
    
    
    
    
</body>
</html>

