<?php
require './autoload.php';
use Qiniu\Auth;

// 用于签名的公钥和私钥
$accessKey = 'fetcgIVWyl2kaMP2aLD0pmJWT1UwOAOqgtlcjoLK';
$secretKey = 'SMTur5fMmmbqQMYlZxjlJDYL9xQVt9wb2I202Hu';

// 初始化签权对象
$auth = new Auth($accessKey, $secretKey);

