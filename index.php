<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/Pinterest_Favicon.png"> 
    <title>Projet 4</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
       <h1>Choisissez votre image</h1>
        <label for="titre">Titre du fichier (max. 50 caractères) :</label><br/>
        <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
        <!--<input type="hidden" name="MAX_FILE_SIZE" value="500000">-->
        <input type="file" name="fileToUpload" id="fileToUpload"><br/>
        <label for="description">Description de votre fichier (max. 255 caractères) :</label><br/>
        <textarea name="description" id="description"></textarea><br/>
        <input type="submit" name="submit">
    </form>
<?php
$target_dir = "storage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check file size
if (isset($_POST['submit']) ) {     
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
    <section>
        <?php     
        $scan = scandir('storage/');
        $description = $_POST['description'];
        //print_r($description);
        foreach($scan as $file) {
            if (!is_dir($file)) {
                echo  
            "<figure>    
                <img src='storage/".$file."'>
                    <figcaption>".$description."</figcaption>
            </figure>";    
            }
        }
        ?>
    </section>
    <!--<div class="grid"
  data-isotope='{ "itemSelector": ".grid-item", "masonry": { "columnWidth": 200 } }'>
  <div class="grid-item"></div>
  <div class="grid-item"></div>
  ...
</div>-->
</body>
</html>