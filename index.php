<?php
require "init.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet">
    <title>⌂ Accueil ⌂</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php
    $query = $codb->query("SELECT * FROM `mes_gites` ");
    $mes_gites = $query->fetchall();
    $modifier="";
        
        if(isset($_POST['modifier'])){
            $modifier=$_POST['modifier'];
        }
    for ($i = 0; $i < count($mes_gites); $i++) {
        echo "<div class='gite'>";
        // echo "<div>'<img src='../assets/img/' alt=''>'</div>";
        echo "<div>",$mes_gites[$i]->id,"</div>";
        echo "<div>",$mes_gites[$i]->Nom_gite,"</div>";
        echo "<div>",$mes_gites[$i]->Descript_gite,"</div>";
        echo "<div>",$mes_gites[$i]->Nbre_couchage,"</div>";
        echo "<div>",$mes_gites[$i]->Nbre_sdb,"</div>";
        echo "<div>",$mes_gites[$i]->Emplacement_geo,"</div>";
        echo "</div>";
    }
    ?>
</body>
<img src="" alt="">

</html>

<?php


require 'classes/utilisateur.class.php';
new Utilisateur();
/*
//Création bdd ▼ Gîtes ▼
$servername = 'localhost';
$username = 'root';
$password = '';
try{
    $dbco = new PDO("mysql:host=$servname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS gites DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $dbco->exec($sql);
    echo '<div class="echo"> Base de données "Gîtes" bien créée =====(ಠ_ಠ)====</div>';
}
catch(PDOException $e){
echo "Erreur lors de la création de la base de données 'Gîtes' : " . $e->getMessage();
}

            $servname = 'localhost';
            $dbname = 'gites';
            $user = 'root';
            $pass = '';


$servname = 'localhost';
$dbname = 'gites';
$user = 'root';
$pass = '';
//Création tables ▼ Gîtes ▼
try{
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE IF NOT EXISTS mes_gites(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nom_gite VARCHAR(50) NOT NULL,
    Descript_gite VARCHAR(255) NOT NULL,
    Nbre_couchage INT,
    Nbre_sdb INT,
    Emplacement_geo VARCHAR(60) NOT NULL,
    Prix INT (5) NOT NULL)";

$dbco->exec($sql);
echo '<div class="echo"> Table "Mes gîtes" bien créée 🏡🏡🏡 </div>'; 
}
catch(PDOException $e){
echo ' Erreur lors de la création de la table "Mes gîtes" ' . $e->getMessage();
}
*/
?>
