<!DOCTYPE html> 
<html> 
<head>
  <meta charset="utf-8">
  <title>Gästebuch</title> 
</head> 
<body>
 
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
 $error = 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
 } else if(empty($name)) {
 $error = 'Bitte einen Namen eingeben<br>';
 } else if(empty($text)) {
 $error = 'Bitte einen Text eingeben<br>'; 
 } else {
 $statement = $pdo->prepare("INSERT INTO gaestebuch (name, email, text) VALUES (:name, :email, :text)");
 $result = $statement->execute(array('name' => $name, 'email' => $email, 'text' => $text));
 
 if($result) {
 echo '<b>Dein Eintrag wurde erfolgreich gespeichert</b><br><br>';
 $show_form = false;
 } else {
 $error = 'Beim Abspeichern ist SWAGleider ein Fehler aufgetreten<br>';
 }
 }
}
?>
 
<?php 
if(!is_null($error)) { //Ein Fehler ist aufgetreten
 echo $error;
}
 
//Ausgabe des Formulars nur wenn $showForm == true ist
if($show_form): 
?>
 <form action="?submit=1" method="post">
 Name:<br>
 <input type="text" size="40" maxlength="250" name="name"><br><br>
 
 E-Mail:<br>
 <input type="email" size="40" maxlength="250" name="email"><br><br>
 
 Text:<br>
 <textarea cols="50" rows="9" name="text"></textarea><br><br>
 
 <input type="submit" value="Eintragen">
 </form> 
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
echo "$anzahl_eintrage Personen sind eingetragen<br><br>";
 
 
//Berechne alles notwendige für die Blätterfunktion
$seite = 1;
if(isset($_GET['seite'])) {
 $seite = intval($_GET['seite']);
}
 
$beitraege_pro_seite = 20;
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
 
 echo "<div style=\"border: 1px solid #000000;\">
 <div style=\"border-bottom:1px solid #000000;  padding: 5px; \">$dateFormatted von <a href=\"mailto:$email\">$name</a></div>
 <div style=\"padding: 5px;\">$text</div>
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
</body>
</html>