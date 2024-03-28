<?php
session_start();
 
$_SESSION['captcha'] = mt_rand(1000,9999);
$img = imagecreate(130,60);
$font = 'fonts/destroyfont.ttf';
 
$bg = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
$textcolor = imagecolorallocate($img, rand(0, 100), rand(0, 100), rand(0, 100));

imagettftext($img, 22, rand(-13, 4), rand(15, 15), rand(25, 40), $textcolor, $font, $_SESSION['captcha']);
 
imagefilter($img, IMG_FILTER_SMOOTH, 5);

// Ajout de bruit
for ($i = 0; $i < 2000; $i++) {
    imagesetpixel($img, rand(0, 150), rand(0, 60), $textcolor);
}

// Ajout de lignes
$lineColor = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
for ($i = 0; $i < 15; $i++) {
    imageline($img, rand(0, 120), rand(0, 40), rand(0, 120), rand(0, 40), $lineColor);
}

header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
 
?>
