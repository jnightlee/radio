<meta charset="utf-8">
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$a=file('nossr.txt');
$nossr=$a['0'];
$fm= $nossr+1;
$allowedExts = array("mp3");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
move_uploaded_file($_FILES["file"]["tmp_name"], "music/" . $fm.".mp3");
$stream = fopen("nossr.txt", "w+");
fwrite($stream, "$fm");
echo "文件存储在: " . "music/" . $fm.".mp3";
$name=$_POST["name"];
if (!isset($name)) $name="未知曲目名";
$stream = fopen("music/" . $fm.".txt", "w");
fwrite($stream, "$name");
echo " 3 秒 后 即将转入首页，请稍等···";
header("Refresh:3;url=index.php");
?>