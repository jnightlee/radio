<!DOCTYPE html>
<head>
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="css/favicon.ico" />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<title>JMW.电台 | JMW.Radio</title>
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/jquery.equalizer.css" />
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/buttons.css">
<style type="text/css">
	#but1 {
  border: 0;
  width: 32px;
  height: 32px;
  background: url(css/subbg.png);
  background-size: 100%;
  border: 2px solid #4abe43;
  border-radius: 50%;
}
</style>
</head>
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$a=file('nossr.txt');
$max=$a['0']; 
$numbers = range (1,$max);
shuffle ($numbers);
$result = array_slice($numbers,0,$max);
for ($i=1; $i<$max; $i++)
{
    $audios[] ="music/".$result[$i].".mp3";
    $an[] =$result[$i];
}
$music="music/0.mp3";
?>
<body>
<div style="position: absolute;left:48%;top:70%;">
	<button type="button" id="but1" onclick="display()"></button>
</div>
<section id="main_section">
	<div class="relative_left" style="width: 600px;margin: 30px 0px;height: 300px;left : 50%;margin-left: -300px;">
		<h2 id="title">JMW.电台 | JMW.Radio</h2>
		<div><span>当前播放曲目：</span><span  id="resText">周杰伦-青花瓷</span></div>
		<div id="equalizer">
			<div id="audioBox"> </div>
				<audio controls="controls" controls autoplay id="myaudio" src="<?php echo $music ;?>"></audio>
		</div>
	</div>
	<div style="position:absolute;left:70%;">
	<p class="animated rubberBand" align="center">JMW·Radio-曲库已收录 <?php echo $max+1; ?> 首音乐</p>
	</div>
</section>
	<div style="position:absolute;left:38%;top:95%;">
	<p class="animated rubberBand" align="center">本电台曲目均由网友自行上传，如果侵犯了您的权益，请联系我们进行删除</p>
	</div>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.reverseorder.js"></script>
<script type="text/javascript" src="js/jquery.equalizer.js"></script>
<div style="position:absolute;left;0;bottom:0;">
<div align="left"></br></br>
<a href="mailto:***********@Google.com?subject=申请删除曲目" style="font-size:10px">联系站长</a></br>
<a style="font-size:16px;color:#000000;" href="updata.html">歌曲上传</a></br>
</div>
</div>
<script type="text/javascript">
var i = 0;
var audios=<?php echo json_encode($audios);?>;
document.getElementById("myaudio").onended = function(){
    if(audios[i]){
        this.setAttribute('src',audios[i]); m=i; i++;
        onclick=ajax(); 
    }else{
        alert('曲库音乐已播放完毕，没有音乐了');
    }
};
</script>
<script>
function display(){
	mymp3=document.getElementById("myaudio");
	mymp3.currentTime = mymp3.duration-0.2;
}
</script>
<script type="text/javascript">
/*	window.onload = function(){	
	alert("页面加载完成"); 
　　} 
</script> 
    <script type="text/javascript" >
    	var an=<?php echo json_encode($an);?>;
        function ajax() {
            var xmlHttp = null;
            if (window.ActiveXObject) {
                // IE6, IE5 浏览器执行代码
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            } else if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                xmlHttp = new XMLHttpRequest();
            }

            if (xmlHttp != null) {
                xmlHttp.open("get", "music/"+an[m]+".txt", true);
                xmlHttp.send();
                xmlHttp.onreadystatechange = doResult; //设置回调函数                 
            }
            function doResult() {
                if (xmlHttp.readyState == 4) { //4表示执行完成
                    if (xmlHttp.status == 200) { //200表示执行成功
                        document.getElementById("resText").innerHTML = xmlHttp.responseText;
                    }
                }
            }
        }
    </script>
</body>
</html>

