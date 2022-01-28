<?php
require "init.php";

if(isset($_FILES['file'])){                            // Boucle permettant de reconnaître la valeur $_FILES

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $type = $_FILES['file']['type'];
    
    move_uploaded_file($tmpName, './assets/img/'.$name);
    echo "<pre>",print_r($_FILES['file']),"</pre>";
}

if(isset($_POST['modifdb'])){
    echo "post id fonctionne";
    $sql ="UPDATE mes_gites SET
    Nom_gite=?,
    Descript_gite=?,
    Nbre_couchage=?,
    Nbre_sdb=?,
    Emplacement_geo=?,
    Prix=?
    WHERE id=?";
    $result= $codb->prepare($sql);
    $result->execute([$_POST['Nom_gite'], $_POST['Descript_gite'], $_POST['Nbre_couchage'], $_POST['Nbre_sdb'],$_POST['Emplacement_geo'],$_POST['Prix'],$_POST['modifdb']]);
<<<<<<< HEAD
    
    // $sql = "SELECT photos FROM images_gites WHERE id_gite= :id_gite";
    // $query = $codb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    // $query->execute(array(':id_gite' => $_POST['supprimer']));
    // $image = $query ->fetchall();

    // unlink('assets\img\\'.$image[0]->photos);

    // $result = $codb->prepare("INSERT INTO images_gites(
    //     photos,
    //     id_gite	
    //     )
    //     VALUES (
    //     :photos,
    //     :id_gite	
    //     )"
    //     );
    // $result->bindParam(':photos',$_FILES['file']['name']);
    // $result->bindParam(':id_gite',$lastId[0]->id);
    // $result->execute(); 
=======

>>>>>>> aec26e41d4b2b7751b7402954c4fcc0d1fc8585b
}

if(isset($_POST['ajouter'])){
        $result = $codb->prepare("INSERT INTO mes_gites(
        Nom_gite,
        Descript_gite,
        Nbre_couchage,
        Nbre_sdb,
        Emplacement_geo,
        Prix
        )
        VALUES (
        :Nom_gite,
        :Descript_gite,
        :Nbre_couchage,
        :Nbre_sdb,
        :Emplacement_geo,
        :Prix
        )"
        );
        $result->bindParam(':Nom_gite',$_POST['ajNom_gite']);
        $result->bindParam(':Descript_gite',$_POST['ajDescript_gite']);
        $result->bindParam(':Nbre_couchage',$_POST['ajNbre_couchage']);
        $result->bindParam(':Nbre_sdb',$_POST['ajNbre_sdb']);
        $result->bindParam(':Emplacement_geo',$_POST['ajEmplacement_geo']);
        $result->bindParam(':Prix',$_POST['ajPrix']);
        $result->execute();  
        
        $sql = "SELECT id FROM mes_gites ORDER BY id DESC LIMIT 1";
        $query= $codb->query($sql);
        $lastId = $query ->fetchall();
        // echo "<pre>",print_r($_SESSION['lastId'][0]->id),"</pre>";

        $result = $codb->prepare("INSERT INTO images_gites(
            photos,
            id_gite	
            )
            VALUES (
            :photos,
            :id_gite	
            )"
            );
        $result->bindParam(':photos',$_FILES['file']['name']);
        $result->bindParam(':id_gite',$lastId[0]->id);
        $result->execute(); 
}
if(isset($_POST['supprimer'])){
    $sql = "SELECT photos FROM images_gites WHERE id_gite= :id_gite";
    $query = $codb->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $query->execute(array(':id_gite' => $_POST['supprimer']));
    $image = $query ->fetchall();
    echo "<pre>",print_r($image[0]->photos),"</pre>";

    unlink('assets\img\\'.$image[0]->photos);
    
    $sql1 = 'DELETE FROM mes_gites WHERE id= :id';
    $result1 = $codb->prepare($sql1);
    $result1->bindParam(':id', $_POST['supprimer'], PDO::PARAM_INT);
    $result1->execute();

    $sql2 = 'DELETE FROM images_gites WHERE id_gite= :id_gite';
    $result2 = $codb->prepare($sql2);
    $result2->bindParam(':id_gite', $_POST['supprimer'], PDO::PARAM_INT);
    $result2->execute();

<<<<<<< HEAD
    
    
=======
if(isset($_FILES['file'])){                            // Boucle permettant de reconnaître la valeur $_FILES

    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $type = $_FILES['file']['type'];

    move_uploaded_file($tmpName, './assets/'.$name);
>>>>>>> aec26e41d4b2b7751b7402954c4fcc0d1fc8585b
}



unset($_POST['supprimer']);
unset($_POST['modifdb']);
unset($_POST['ajouter']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/main.css" rel="stylesheet">
</head>

<body>
    <!-- <form action="" method="post">
        <input type="date" name="dateDebut" id="dateDebut">
        <input type="date" name="dateFin" id="dateFin">
        <button>validé</button> -->

    <?php
    $sql = "SELECT * FROM `mes_gites` ";
    $query= $codb->query($sql);
    $mes_gites = $query ->fetchall();
    
    $sql = "SELECT * FROM `images_gites` ";
    $query= $codb->query($sql);
    $images_gites = $query ->fetchall();
    
        echo "<pre>",print_r($images_gites),"</pre>";
        $modifier="";

        if(isset($_POST['modifier'])){
            $modifier=$_POST['modifier'];
        }
        echo  "<form action='' method='post' class='tableau' enctype='multipart/form-data'>";
        echo "<table>";
        echo "<tr>";
        echo "<td>id</td>";
        echo "<td>Nom</td>";
        echo "<td>Description</td>";
        echo "<td>Couchages</td>";
        echo "<td>SallesDeBain</td>";
        echo "<td>Emplacement</td>";
        echo "<td>Prix</td>";
        echo "<td>Type</td>";
        echo "</tr>";
        for ($i = 0; $i < count($mes_gites); $i++) {
            if($mes_gites[$i]->id!=$modifier){
            echo "<tr>";
            echo "<td>",$mes_gites[$i]->id,"</td>";
            echo "<td>",$mes_gites[$i]->Nom_gite,"</td>";
            echo "<td>",$mes_gites[$i]->Descript_gite,"</td>";
            echo "<td>",$mes_gites[$i]->Nbre_couchage,"</td>";
            echo "<td>",$mes_gites[$i]->Nbre_sdb,"</td>";
            echo "<td>",$mes_gites[$i]->Emplacement_geo,"</td>";
            echo "<td>",$mes_gites[$i]->Prix,"</td>";
            // echo "<td>",$images_gites[$mes_gites[$i]->id]->photos,"</td>";
            echo "<td><button name='modifier' value=",$mes_gites[$i]->id,">modifier</button></td>";
            echo "<td><button name='supprimer' value=",$mes_gites[$i]->id,">supprimer</button></td>";
            echo "</tr>";
            }elseif($mes_gites[$i]->id==$modifier){
                echo "<tr>";
                echo "<td>",$mes_gites[$i]->id,"</td>";
                echo "<td><input type='text' name='Nom_gite'  value=",$mes_gites[$i]->Nom_gite," /></td>";
                echo "<td><input type='text' name='Descript_gite'  value=",$mes_gites[$i]->Descript_gite,"' /></td>";
                echo "<td><input type='text' name='Nbre_couchage'  value=",$mes_gites[$i]->Nbre_couchage," /></td>";
                echo "<td><input type='text' name='Nbre_sdb'  value=",$mes_gites[$i]->Nbre_sdb," /></td>";
                echo "<td><input type='text' name='Emplacement_geo'  value=",$mes_gites[$i]->Emplacement_geo," /></td>";
                echo "<td><input type='text' name='Prix'  value=",$mes_gites[$i]->Prix," /></td>";
                // echo "<td><input type='file' name='file'  value=",$images_gites[$mes_gites[$i]->id]->photos," /></td>";
                echo "<td><button name='modifdb' value=",$mes_gites[$i]->id,">valider</button></td>";
                echo "</tr>";
                // unset($_POST['modifier']);
                // $modifier="";
            }
        }
        echo "<tr>";
        echo "<td>+</td>";
        echo "<td><input type='text' name='ajNom_gite'/></td>";
        echo "<td><input type='text' name='ajDescript_gite'/></td>";
        echo "<td><input type='text' name='ajNbre_couchage'/></td>";
        echo "<td><input type='text' name='ajNbre_sdb'/></td>";
        echo "<td><input type='text' name='ajEmplacement_geo'/></td>";
        echo "<td><input type='text' name='ajPrix'/></td>";
        echo "<td><input type='file' name='file'></td>";
        echo "<td><button name='ajouter' value='ajouter'>ajouter</button></td>";
        echo "</tr>";
        echo "</table>";
        echo  "</form>";



        ?>
    <!-- </form> -->
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>