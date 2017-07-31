<?php
/**
 * Created by PhpStorm.
 * User: sks
 * Date: 2016/7/13
 * Time: 11:19
 */
require_once("../common.php");
require_once ROOT_PATH . "/qiniu/autoload.php";

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
//定义宏，宏由平台所提供
define("QINIU_ACCESS_KEY","fetcgIVWyl2kaMP2aLD0pmJWT1UwOAOqgtlcjoLK");
define("QINIU_SECRET_KEY","-SMTur5fMmmbqQMYlZxjlJDYL9xQVt9wb2I202Hu");
define("QINIU_BUCKET","quanzhanphp");

class QiniuUploader
{
    private $token;
    private $uploadMgr;

    function __construct()
    {
        //生成验证对象， Authorize
        $auth = new Auth(QINIU_ACCESS_KEY, QINIU_SECRET_KEY);

        // 空间名  http://developer.qiniu.com/docs/v6/api/overview/concepts.html#bucket
        $bucket = QINIU_BUCKET;

        // 生成上传Token
        $this->token = $auth->uploadToken($bucket);

    }

    public function getUploadToken()
    {
        //生成验证对象， Authorize
        $auth = new Auth(QINIU_ACCESS_KEY, QINIU_SECRET_KEY);

        // 空间名  http://developer.qiniu.com/docs/v6/api/overview/concepts.html#bucket
        $bucket = QINIU_BUCKET;

        $policy = array(
            //上传完成之后，把信息告诉你
            'returnUrl' => 'http://localhost/uploaddemo/iframeupload/uploadok.php',
            'returnBody' => '{"fname": $(fname),  "size": $(fsize),  "key": $(key)}',

        );
        $upToken = $auth->uploadToken($bucket, null, 3600, $policy);
        echo  $upToken;
        exit;
    }

    public function upload($filename)
    {
        // 构建 UploadManager 对象
        $this->uploadMgr = new UploadManager();
        $key=basename($filename);
        //执行上传操作，第一个返回是如果成功有值，第二个返回值是错误消息
        list($ret, $err) = $this->uploadMgr->putFile($this->token,$key,$filename);
        $url = "http://oa8gs13bo.bkt.clouddn.com";
        if($err)
        {
            var_dump($err);
        }
        else{
           // var_dump($ret);
            return $url."/".$ret['key'];
        }
    }
}
