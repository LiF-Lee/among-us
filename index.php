<?php

header('Content-type: image/jpeg');

#Setting
$fontRGB = array(255, 255, 255);
$fontPath = './assets/font/KoPubDotumMedium.ttf';
$backgroundPath = './assets/img';

#User Input
$text = $_GET['text'] ?? '';
$color = strtolower($_GET['color'] ?? '');
$isImposter = $_GET['impo'] ?? 'false';

$colorList = array(
    'lightgreen',
    'mint',
    'yellow',
    'brown',
    'purple',
    'pink',
    'darkgreen',
    'white',
    'orange',
    'red',
    'blue',
    'black'
);

if ($isImposter === 'true')
{
    $text = "{$text} 는 임포스터였습니다.";
} else $text = "{$text} 는 임포스터가 아니었습니다.";

$background = "{$backgroundPath}/background_default.jpg";
if (in_array($color, $colorList))
{
    $background = "{$backgroundPath}/background_{$color}.jpg";
}

$image = imagecreatefromJPEG($background);
$font_color = imagecolorallocate($image, $fontRGB[0], $fontRGB[1], $fontRGB[2]);
$box = imagettfbbox(16, 0, $fontPath, $text);
$text_width = abs($box[2]) - abs($box[0]);
$x = (imagesx($image) - $text_width) / 2;   
imagettftext($image, 16, 0, $x, 258, $font_color, $fontPath, $text);
imageJPEG($image);
imagedestroy($image);

?>
