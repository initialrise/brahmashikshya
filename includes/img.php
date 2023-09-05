<?php
header ('Content-Type: image/png');
$text = $_GET["text"];
$im = @imagecreatetruecolor(120, 20)
      or die('Cannot Initialize new GD image stream');
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, $text,  $text_color);
imagepng($im);
imagedestroy($im);
?>