<?php
include_once('ThinkImage.class.php');
ini_set("display_errors","On");
   error_reporting(E_ALL);
    if(!$_FILES['testfile']['name']){
        echo '请正确传输数据';
        die;
    }

    $imgname = explode('.',$_FILES['testfile']['name']);
    $firstname = $imgname[0];
    $second = $imgname[1];

    $tmp = $_FILES['testfile']['tmp_name'];

    $filepath = $_POST['token'];
    $lastname = 'img'.time().'_'.$firstname.'.'.$second;
    if(move_uploaded_file($tmp,$lastname)){

        $img = new ThinkImage(2);


//        $img->thumb(20, 20,THINKIMAGE_THUMB_SCALE)->save('s'.$lastname);
        $img->setimageformat( 'jpg');

        $img->newImage( 200,200, 'white' );
        $img->writeImage( 'n'.$lastname);
        echo 'shengcheng';
////将图片裁剪为440x440并保存为corp.gif
//$img->crop(440, 440)->save('./crop.gif');
////给裁剪后的图片添加图片水印，位置为右下角，保存为water.gif
//$img->water('./11.png', THINKIMAGE_WATER_SOUTHEAST)->save("water.gif");
////给原图添加水印并保存为water_o.gif（需要重新打开原图）
//$img->open('./1.jpg')->water('./11.png', THINKIMAGE_WATER_SOUTHEAST)->save("water_o.gif");
    }else{
        echo "系统繁忙，请稍候再试";
    }




?>