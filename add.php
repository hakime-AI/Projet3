<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet">
    <title>Ajouter un hébergement</title>
</head>

<body>
    <?php
    ?>
    <section id="formulaire">
        <h1>Ajouter un hébergement :</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">

            <legend>Décrivez votre gîte</legend><br>
            <div class="c100">
                <label for="title"> Titre de l'annonce : </label>
                <input type="text" id="title" name="title" placeholder='"Magnifique gite..."'>
            </div>
            <div class="c100">
                <label for="desc">Déscription : </label>
                <input type="text" id="desc" name="desc" placeholder="Décrivez votre bien">
            </div>
            <br>
            <div class="c100">
                <label for="beds">Nombre de couchage : </label>
                <input type="number" id="beds" name="beds" placeholder="">
            </div>
            <br>
            <div class="c100">
                <label for="brooms">Nombre de salle de bain : </label>
                <input type="number" id="brooms" name="brooms" placeholder="">
            </div>
            <div>
                Photo du bien
                <label for="file">Fichier</label>
                <input type="file" name="file">
                <button type="submit">Enregistrer</button>
            </div>
            <br>
            <div class="c100">
                <label for="place">Emplacement : </label>
                <input type="text" id="place" name="place" placeholder="Où se trouve votre bien">

                <div class="c100">
                    <label for="price">Prix : </label>
                    <input type="number" id="price" name="price" placeholder="€€€"><br>
                    Valider
                    <div class="c100" id="submit">
                        <input type="submit" value="✅">
                    </div>
                    <br>



    </section>
    </form>

    <a href="index.php"> <button type="button" class="btn">Retour Tableau de Bord</button></a><br>


</body>

</html>
<?php

//=======================================================================  //
//      ▼        AJOUTER DES IMAGES DANS LA BASE DE DONNÉE  !! ▼           //
//=======================================================================  //
if(isset($_FILES['file'])){                            // Boucle permettant de reconnaître la valeur $_FILES

$tmpName = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$error = $_FILES['file']['error'];
$type = $_FILES['file']['type'];

move_uploaded_file($tmpName, './assets/'.$name);
}
// echo "<pre>",print_r($_FILES['file']),"</pre>";
var_dump($_FILES);
//=======================================================================  //


//======================//
// Connection à la bdd ▼//
//======================//

$servname = 'localhost';
$dbname = 'gites';
$user = 'root';
$pass = '';

//=======================================================================//
// Bouclette pour remplir les lignes de la bdd selon les inputs du form ▼//
//=======================================================================//

if (
    isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['desc'])  && !empty($_POST['desc']) &&
    isset($_POST['beds'])  && !empty($_POST['beds']) &&
    isset($_POST['brooms'])  && !empty($_POST['brooms']) &&
    isset($_POST['place'])  && !empty($_POST['place']) &&
    isset($_POST['price'])  && !empty($_POST['price']) 
) 
try {
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $dbco->prepare(
    "INSERT INTO mes_gites (Nom_gite, Descript_gite, Nbre_couchage, Nbre_sdb, 
    Emplacement_geo, Prix)
    VALUES  (:Nom_gite, :Descript_gite, :Nbre_couchage, :Nbre_sdb, 
    :Emplacement_geo, :Prix)
    ");
    
$sth->bindParam(':Nom_gite', $title);
$title = $_POST['title'];


$sth->bindParam(':Descript_gite', $desc);
$desc = $_POST['desc'];


$sth->bindParam(':Nbre_couchage', $beds);
$beds = $_POST['beds'];


$sth->bindParam(':Nbre_sdb', $brooms);
$brooms = $_POST['brooms'];

//Photo du bien
$sth->bindParam(':Emplacement_geo', $place);
$place = $_POST['place'];


$sth->bindParam(':Prix', $price);
$price = $_POST['price'];
$sth->execute();

        echo 'Hébergement ajoutée !';

}    catch (PDOException $e) {
        echo "Erreur lors de l'envois des données du gîte : " . $e->getMessage();
    }
?>