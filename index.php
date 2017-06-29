<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/Pinterest_Favicon.png"> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <title>Projet 4</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
       <h1>Choisissez votre image</h1>
        <!--<label for="titre">Titre du fichier (max. 50 caractères) :</label><br/>
        <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
        <input type="hidden" name="MAX_FILE_SIZE" value="500000">-->
        <input type="file" name="fileToUpload" id="fileToUpload"><br/>
        <!--<label for="description">Description de votre fichier (max. 255 caractères) :</label><br/>
        <textarea name="description" id="description"></textarea><br/>-->
        <input type="submit" name="submit">
    </form>
<?php

?>    
</body>
</html>