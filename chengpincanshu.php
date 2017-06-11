<?php
ini_set("display_errors","On");
   error_reporting(E_ALL);


$img = new Imagick('chengpin.jpg');

    $result['width'] = $img->getImageWidth();
    $result['height'] = $img->getImageHeight();


var_dump($result);
?>
