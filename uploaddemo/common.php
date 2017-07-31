<?php
/**
 * Created by PhpStorm.
 * User: ucai
 * Date: 2016/8/4 0004
 * Time: 20:28
 */

define("ROOT_PATH",dirname(__FILE__));
define("DS", DIRECTORY_SEPARATOR);

function upload()
{
    if(!empty($_FILES['file']['name']))
    {
        //image/jpeg => jpeg
        $ext = explode("/",$_FILES['file']['type'])[1];

        $base = ROOT_PATH.DS."uploads";
        $date = date("Ymd");
        $datedir = $base.DS.$date;
        if(!is_dir($datedir))
        {
            mkdir($datedir);
        }
        $seed = rand(10000000,99999999);
        $filename = $date.DS.$seed.".".$ext;
        $urlfilename =  $date."/".$seed.".".$ext;

        $destfile = $base.DS.$filename;

        move_uploaded_file($_FILES['file']['tmp_name'],$destfile);

        $url = "../uploads/".$urlfilename;

        echo "<a target='_blank' href='".$url."'>Uploaded File</a>";

        return $destfile;
       // exit;
    }
}