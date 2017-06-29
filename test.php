<?php
/*
//header ("Content-type: image/jpg"); // L'image que l'on va créer est un jpeg

// On charge d'abord les images
$source = imagecreatefrompng("home.jpg"); // Le logo est la source
$destination = imagecreatefromjpeg("miniHome.jpg"); // La photo est la destination


// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
$destination_x = $destinationWidth - $sourceWidth;
$destination_y =  $destinationHeigth - $sourceHeight;

// On met le logo (source) dans l'image de destination (la photo)
imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $sourceWidth, $destinationHeigth, 60);

// On affiche l'image de destination qui a été fusionnée avec le logo
imagejpeg($destination);

$source = imagecreate("home.jpg");
$destination = imagecreatetruecolor(200, 150);

$sourceWidth = imagex($source);
$sourceHeight = imagey($source);
$destinationWidth = imagex($destination);
$destinationHeigth = imagey($destination);
    
imagecopyresampled($destination, $source, 0, 0, 0, 0, $destinationWidth, $destinationHeight, $sourceWidth, $sourceHeight);
    
image($destination, "miniHome.jpg"); 
*/
phpinfo();


?>
