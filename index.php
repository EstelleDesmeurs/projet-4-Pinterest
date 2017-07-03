<?php

require 'src/claviska/SimpleImage.php';

$imageFileType = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    elseif ($_FILES['fileToUpload']['size'] > 0) {
         move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './images/'.$_FILES['fileToUpload']['name']);
                $maxWidth = 320;
                $maxHeight = 200;
                 $image = new \claviska\SimpleImage();
                    $image->fromFile('./images/'.$_FILES['fileToUpload']['name']);
                    $image->bestFit($maxWidth, $maxHeight);
                    $image->toFile('./tailleNormale/'.$_FILES['fileToUpload']['name']); 
     } 

//print_r($_FILES);
$directory = './tailleNormale/';
$lecteur = scandir($directory);
unset($lecteur[0], $lecteur[1]);
//print_r($lecteur);


//MIME = Multi-purpose Internet Mail Extensions. Identifie nature/format d'un fichier.
//A tester comme ça >>> echo mime_content_type('index.php');
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal.css">
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal-default-theme.css">
    <link rel="icon" type="image/png" href="assets/Pinterest_Favicon.png"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <title>Projet 4</title>
</head>
<body>
        <script src="Remodal-1.1.1/dist/remodal.js"></script>
    
    <form method="post" action="" enctype="multipart/form-data">
       <h1>Choisissez votre image</h1>
        <!--<label for="titre">Titre du fichier (max. 50 caractères) :</label><br/>
        <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="500000">-->
        <input type="file" name="fileToUpload" id="fileToUpload"><br/>
        <!--<label for="description">Description de votre fichier (max. 255 caractères) :</label><br/>
        <textarea name="description" id="description"></textarea><br/>-->
        <input type="submit" name="submit">
    </form>
    
    <div class="container">
        <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "masonry": { "columnWidth": 20 } }'></div>
            
            <?php
                foreach ($lecteur as $key => $value) {
                echo '<div class="grid-item"><a href="#'.$value.'"><img src="./tailleNormale/'.$value.'"></div>

                <div class="remodal" data-remodal-id="'.$value.'" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

        <!--Bouton pour fermer la nouvelle image -->

  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
 
   <!-- Affiche la image selectionnée et asombre la page -->

 <img src="./images/'.$value.'" >   


</div>'; 
                }

            ?>

        </div>
    

</body>
</html>

