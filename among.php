<?php

header("Content-type: image/jpeg");

$text = $_GET["text"];

$background = "img/background.jpg";

if($_GET["impo"] === "true") {
    $text .= " 는 임포스터였습니다."; 
} else {
    $text .= " 는 임포스터가 아니었습니다."; 
}

$image = imagecreatefromJPEG($background);

$font_color = imagecolorallocate($image, 255, 255, 255);

$box = imagettfbbox(16, 0, "font/KoPubDotumMedium.ttf", $text);

$text_width = abs($box[2]) - abs($box[0]);

$x = (imagesx($image) - $text_width) / 2;   

imagettftext($image, 16, 0, $x, 258, $font_color, "font/KoPubDotumMedium.ttf", $text);

imageJPEG($image);

imagedestroy($image);

?>
