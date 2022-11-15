<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

if(isset($_GET['login'])) {
 $email = $_POST['email'];
 $passwort = $_POST['passwort'];
 
 $statement = $pdo->prepare("SELECT * FROM entrytable WHERE email = :email");
 $result = $statement->execute(array('email' => $email));
 $user = $statement->fetch();
 
if ($user !== false && password_verify($passwort, $user['passwort'])) {
	$_SESSION['userid'] = $user['id'];
	die('LOGIN SUCESSFULLY. GO TO <a href="test2.php">NEXT SECTION</a>');
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
 <a href="test2.php" class="w3-bar-item w3-buttonA">Welcome</a>
    </table>
</form> 
    
    </div>  