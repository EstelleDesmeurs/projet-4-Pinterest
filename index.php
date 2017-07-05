<?php

require 'src/claviska/SimpleImage.php';

$imageFileType = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);


    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "'<p><em>Only JPG, JPEG, PNG & GIF files are allowed.</em></p>";
    }
    elseif ($_FILES['fileToUpload']['size'] > 0) {
         move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './images/'.$_FILES['fileToUpload']['name']);
                $maxWidth = 320;
                $maxHeight = 1000;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Projet 4</title>
</head>
<body>
    <div class="parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="" enctype="multipart/form-data">

                   <h1>Choisissez votre image</h1>
                    <!--<label for="titre">Titre du fichier (max. 50 caractères) :</label><br/>
                    <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
                    <input type="hidden" name="MAX_FILE_SIZE" value="500000">-->
                    <label class="btn btn-primary" for="fileToUpload">Choisir un fichier</label><input type="file" name="fileToUpload" id="fileToUpload">
                    <!--<label for="description">Description de votre fichier (max. 255 caractères) :</label><br/>
                    <textarea name="description" id="description"></textarea><br/>-->
                    <input type="submit" class="btn btn-primary" name="submit">

                </form>
            </div>    
        </div>
        </div>        
    
    <div class="remodal-bg">
        <!--<div class="remodal" data-remodal-id="modal">
          <button data-remodal-action="close" class="remodal-close"></button>
          <h1>Remodal</h1>
          <p>
            Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
          </p>
          <br>
          <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
          <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
        </div>
        <a href="#modal">Call the modal with data-remodal-id="modal"</a>-->

        <div class="grid"> <!--data-isotope='{ "itemSelector": ".grid-item", "masonry": { "columnWidth": 20 } }'><div class="grid" data-isotope= '{
                      "itemSelector": ".grid-item",
                      "layoutMode": "fitRows"
                    }'>-->
            <div class="grid-sizer"></div>
            <?php
                foreach ($lecteur as $key => $value) {
                $rand = rand(0, 1);
                //echo $rand;
                  if ($rand == 0){
                    $width = '';
                  }
                  elseif ($rand == 1){
                    $width = 'grid-item--height2';
                  }
                echo '<div class="grid-item '.$width.'"><a href="#'.$value.'"><img src="./tailleNormale/'.$value.'"></a></div>

                <div class="remodal" data-remodal-id="'.$value.'" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button> 
                <div>
                    <!--<h2 id="modal1Title"></h2>-->
                    <p id="modal1Desc"><img src="./images/'.$value.'" ></p>
                  </div>
                  <br>
                  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
                </div>'; 
                }

            ?>
        </div>
</div>
</div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="Remodal-1.1.1/dist/remodal.js"></script>
    <script src="Remodal-1.1.1/dist/remodal.min.js"></script>
    <script src="node_modules/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script type="text/javascript">
    var $grid = $('.grid').imagesLoaded( function() {
    $grid.isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer',
          "fitWidth": true
            }
          });
    });
    </script>     
</body>
</html>

<?php




?>