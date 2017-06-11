<?php
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

        $img = new Imagick($lastname);

        $text = date('Y-m-d H:i:s',time());
//        $img->thumb(20, 20,THINKIMAGE_THUMB_SCALE)->save('s'.$lastname);
        $img->setimageformat( 'jpg');

        $img->newImage( 905,1280, 'white' );
        $style['font_size'] = 10;
        $style['fill_color'] = '#FF0000';
        add_text($img,$text, 2, 20, 0,$style);

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

function add_text(& $imagick, $text, $x = 0, $y = 0, $angle = 0, $style = array()) {
    $draw = new ImagickDraw ();
    if (isset ( $style ['font'] ))
        $draw->setFont ( $style ['font'] );
    if (isset ( $style ['font_size'] ))
        $draw->setFontSize ( $style ['font_size'] );
    if (isset ( $style ['fill_color'] ))
        $draw->setFillColor ( $style ['fill_color'] );
    if (isset ( $style ['under_color'] ))
        $draw->setTextUnderColor ( $style ['under_color'] );
    if (isset ( $style ['font_family'] ))
        $draw->setfontfamily( $style ['font_family'] );
    if (isset ( $style ['font'] ))
        $draw->setfont($style ['font'] );
    $draw->settextencoding('UTF-8');
//        $imagicktext =autoWrap($style ['font_size'],'5.ttf',$text,50);
        $imagick->annotateImage ( $draw, $x, $y, $angle, $text );

}
/**
 * 根据预设宽度让文字自动换行
 * @param int $fontsize 字体大小
 * @param string $ttfpath 字体名称
 * @param string $str 字符串
 * @param int $width 预设宽度
 * @param int $fontangle 角度
 * @param string $charset 编码
 * @return string $_string  字符串
 */
//function autoWrap($fontsize, $ttfpath, $str, $width, $fontangle =0, $charset ='utf-8')
//{
//$_string = "";
//$_width = 0;
//$temp = chararray($str, $charset);
//foreach ($temp[0] as $v) {
//    $w = charWidth($fontsize, $fontangle, $v, $ttfpath);
//    $_width += intval($w);
//    if (($_width > $width) && ($v !== "")) {
//        $_string .= PHP_EOL;
//        $_width = 0;
//    }
//    $_string .= $v;
//}
//
//return $_string;
//}



/**
 * 返回一个字符的数组
 *
 * @param string $str 文字
 * @param string $charset 字符编码
 * @return array $match   返回一个字符的数组
 */
//function charArray($str, $charset ="utf-8")
//{
//$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
//    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
//    $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
//    $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
//    preg_match_all($re[$charset], $str, $match);
//
//    return $match;
//}
//function charWidth($fontsize, $fontangle, $char, $ttfpath)
//{
//    $box = imagettfbbox($fontsize, $fontangle, $ttfpath, $char);
//    $width = max($box[2], $box[4]) - min($box[0], $box[6]);
//
//    return $width;
//}
?>
