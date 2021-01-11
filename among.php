<?php

header("Content-type: image/jpeg");

$text = $_GET["text"];

$color = strtolower($_GET["color"]);

if($_GET["impo"] === "true") {
    $text .= " 는 임포스터였습니다."; 
} else {
    $text .= " 는 임포스터가 아니었습니다."; 
}

if(in_array($color, array(
    "lightgreen",
    "mint",
    "yellow",
    "brown",
    "purple",
    "pink",
    "darkgreen",
    "white",
    "orange",
    "red",
    "blue",
    "black"
))) {
    $background = "img/background_".$color.".jpg";
} else {
    $background = "img/background.jpg";
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
