<?php
/**
 * Created by PhpStorm.
 * User: ucai
 * Date: 2016/8/4 0004
 * Time: 20:08
 */

$ret = $_REQUEST['upload_ret'];
$ret = base64_decode($ret);

$cbody = json_decode($ret, true);
$domain = "oa8gs13bo.bkt.clouddn.com";
$filename = $cbody['key'];

$photo = "http://".$domain."/".$filename;

echo "<a target='_blank' href='".$photo."'>Frontend  Qiniu Uploaded File</a>
";
//print_r($ret);

?>

<script type="text/javascript">
parent.document.getElementById("logo").src="<?php echo $photo;?>";
parent.document.getElementById("logourl").value = "<?php echo $photo;?>";
</script>
