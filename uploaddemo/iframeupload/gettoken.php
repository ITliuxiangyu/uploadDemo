<?php
/**
 * Created by PhpStorm.
 * User: ucai
 * Date: 2016/8/4 0004
 * Time: 20:55
 */
require_once("../lib/QiniuUploader.class.php");

$uploader = new QiniuUploader();
echo $uploader->getUploadToken();
exit;
