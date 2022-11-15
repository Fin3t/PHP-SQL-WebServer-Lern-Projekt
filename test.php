<?php
session_start();

?>
<!DOCTYPE html>
<html>
    
        <link rel="stylesheet" href="css/main1.css">
 
<body background="images/wall.jpg">
    
    
<ul>
   <li><a class="active" href="index.php">Start</a></li>   
    <li><a href="registration.php">Registration</a></li>
    <li><a href="logged_in.php">Member</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li style="float:right"><a href="about.php">About</a></li>
    <li style="float:right"><?php
$link_address = 'myprofile.php';
$logout = 'logout.php';
$logouticon = '<img src="images/makefg.png" height="13" width="15">';
 $con=mysqli_connect("localhost","root","","test");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!isset($_SESSION['userid'])) {
	echo('<a href="login.php">Login</a>');
}  
if(isset($_SESSION['userid'])) {
$result = mysqli_query($con,"SELECT * FROM entrytable WHERE id = '".$_SESSION['userid']."' ");

if($row = mysqli_fetch_array($result))
     $huan = $row['email'];
{
echo "<a href='".$link_address."'>$huan</a>";  
}

mysqli_close($con);
    ?></li><li style="float:right"><?php
 if(isset($_SESSION['userid'])) {
    echo"<a href='".$logout."'>$logouticon</a>";   
    
 }
    	
}  


    ?></li>  
</ul>
    
	<title>Start</title>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$show_form = true; 
$error = null;
 
//Das Formular wurde abgesendet, überprüfe den Inhalt und speichere es ab
if(isset($_GET['submit'])) {
 $name = trim($_POST['name']);
 $email = trim($_POST['email']);
 $text = trim($_POST['text']);
 
 //Überprüfen dass die E-Mail-Adresse gültig ist
 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $error = 'Bitte eine gültige E-Mail-Adresse eingeben<br>';     //FORMULAR FÜR EINTRAG
 } else if(empty($name)) {
 $error = 'Bitte einen Namen eingeben<br>';
 } else if(empty($text)) {
 $error = 'Bitte einen Text eingeben<br>'; 
 } else if(count($_POST)>0) {
        if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
 $error = '<strong>Captcha Falsch!</strong><br>';
        } else {
 $statement = $pdo->prepare("INSERT INTO gaestebuch (name, email, text) VALUES (:name, :email, :text)");
 $result = $statement->execute(array('name' => $name, 'email' => $email, 'text' => $text));

 if($result) {
 echo '<b>Dein Eintrag wurde erfolgreich gespeichert</b><br><br>';
 $show_form = false;
 header('Location: index.php');
 exit;
 } else {
 $error = 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
 }
 }
}}
?>
    
    
<div class="transbox">
    <h1>Welcome!</h1>
    <h2>We have satisfied customers!</h2>
    
    
<?php 
    
if(!is_null($error)) { //Ein Fehler ist aufgetreten
 echo $error;
}
 
//Ausgabe des Formulars nur wenn $showForm == true ist
if($show_form): 
    
?>
    
<?php 
endif;
?>
 
<hr>
 
<?php 

/***********************
 * Ausgabe der Einträge
 ***********************/
 
//Ermittelt die Anzahl der Beiträge
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM gaestebuch WHERE deleted_at IS NULL");
$statement->execute();
$row = $statement->fetch();
$anzahl_eintrage = $row['anzahl'];
echo "$anzahl_eintrage Persons have left a comment!<br><br>";
 
 
//Berechne alles notwendige für die Blätterfunktion
$seite = 1;
if(isset($_GET['seite'])) {
 $seite = intval($_GET['seite']);
}
 
$beitraege_pro_seite = 5;
$start = ($seite-1)*$beitraege_pro_seite;
 
//Abfrage der Datenbank und Ausgabe der Daten
$statement = $pdo->prepare("SELECT * FROM gaestebuch WHERE deleted_at IS NULL ORDER BY id DESC LIMIT :start, :limit");
$statement->bindParam(':start', $start, PDO::PARAM_INT);
$statement->bindParam(':limit', $beitraege_pro_seite, PDO::PARAM_INT);
$statement->execute();
while($row = $statement->fetch()) {
 $name = htmlentities($row['name']);
 $email = htmlentities($row['email']);
 $text = nl2br(htmlentities($row['text']));
 $date = new DateTime($row['created_at']);
 $dateFormatted = $date->format('d.m.y H:i');
 $neuertext = wordwrap( $text, 50, "<br />\n" );

echo
    
"<div style=\"border: 1px solid #000000;\">
 <div style=\"border-bottom:1px solid #000000;  padding: 5px; \">$dateFormatted von <a href=\"mailto:$email\">$name</a></div>
 <div class=\"text\">$neuertext</div>
 </div><br>";
    
    
    
    
}
 
//Berechne die Anzahl der Seiten:
$anzahl_seiten = ceil($anzahl_eintrage / floatval($beitraege_pro_seite));
 
//Ausgabe der Seitenlinks:

echo "<div align=\"center\">";
echo "<b>Seite:</b> ";
 
 
//Ausgabe der Links zu den verschiedenen Seiten
for($a=1; $a <= $anzahl_seiten; $a++) {
 //Wenn der User sich auf dieser Seite befindet, keinen Link ausgeben
 if($seite == $a){
 echo " <b>$a</b> ";
 } else { //Aus dieser Seite ist der User nicht, also einen Link ausgeben
 echo " <a href=\"?seite=$a\">$a</a> ";
 }
}
echo "</div>";
 
?>
    
 <hr>
          
  
<input type="checkbox"  id="spoiler2" /> 
  <label for="spoiler2" >Leave a Comment</label>
<div class="spoiler">
        
        
        
        
        
        
        <form action="?submit=1" method="post">
     <table class="transboxregistrationxD">
         <tr class="register-tr">
             <td class="register-td">Name:</td>
         </tr>
    <tr class="register-tr">
        <td class="register-td"><input type="text" size="40" maxlength="50" name="name"></td>
         </tr>
    <tr class="register-tr">
        <td class="register-td">E-Mail:</td>
         </tr> 
    <tr class="register-tr">
        <td class="register-td"><input type="email" size="40" maxlength="50" name="email"> </td>
         </tr>
<tr class="register-tr">
    <td class="register-td">Text:</td>
         </tr>
<tr class="register-tr">
    <td class="register-td"><textarea cols="50" rows="3" name="text" maxlength="150"></textarea></td>
         </tr>
    <tr class="register-tr">
        <td class="register-td">Captcha:<img src="captcha.php"><input type="text" name="vercode" /> </td>
         </tr>
    <tr class="register-tr">
        <td class="test2"><input type="submit" value="Eintragen"></td>
         </tr>
            </table>
                </form>       
                    </div> 
                        </div>
        
    
</body>
</html>    
    
