<?php
/**
 * Created by PhpStorm.
 * User: ucai
 * Date: 2016/8/4 0004
 * Time: 20:08
 */

require_once("../common.php");
require_once("../lib/QiniuUploader.class.php");
$destfile = upload();

$uploader = new QiniuUploader();
$logo = $uploader->upload($destfile);
echo '<hr />';
echo "<a target='_blank' href='".$logo."'>Qiniu Uploaded File</a>";

