<?php

$username  = isset($_REQUEST['username']) ? $_REQUEST['username'] :'';

if(!$username)
{
    echo json_encode(array(
        'status'=>'403',
        'msg' => 'username is needed'

    ));
}

$files_name = listDir('./images/'.$username.'/');
if($files_name){
    foreach($files_name as $key =>$value){
        $files_name[$key] = 'http://www.yuzhaoxi.com/imagedo/images/'.$username.'/'.$value;
    }
    $result['status'] = '200';
    $result['data'] = $files_name;
    $result['msg'] = 'OK';
}
else
{
    $result['status'] = '406';
    $result['msg'] = 'the dir is null';
}

echo json_encode($result);

function listDir($dir)
{
    if(is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            $result = array();
            while (($file = readdir($dh)) !== false)
            {
                if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
                {
                    listDir($dir."/".$file."/");
                }
                else
                {
                    if($file!="." && $file!="..")
                    {
                        $result[]  = $file;

                    }
                }
            }
            closedir($dh);
            return $result;
        }
    }
    else{
        return false;
    }
}
