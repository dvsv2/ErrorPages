<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>正在连接服务器...</title>
<style type="text/css">
::-moz-selection { background: #fff; text-shadow: none; }
::selection { background: #fff; text-shadow: none; }
body { font-family: cursive, NSimSun; background: #000; color: #C0C0C0; font-size: 12pt; }
#errormsg { display: none }
#blink { display: inline; color: #0F0; }
</style>

</head>
<body>
<div id="echoerror"></div>
<div id="errormsg"> 正在连接到 <?php echo $_SERVER['HTTP_HOST'];?> ....<br>
	连接失败 (服务器无响应)<br>
	正在重试.... (第#1次重试)<br>
	连接失败 (服务器无响应)<br>
	正在重试.... (第#2次重试)<br>
	连接失败 (服务器无响应)<br>
	正在重试.... (第#3次重试)<br>
	连接失败 (服务器无响应）<br>
	服务器无法连接
</div>
<script type="text/javascript">
    var charIndex = -1;
    var stringLength = 0;
    var inputText;
    function writeContent(){
    	inputText = document.getElementById('errormsg').innerHTML;
        if(charIndex==-1){
            charIndex = 0;
            stringLength = inputText.length;
        }
        var initString = document.getElementById('echoerror').innerHTML;
		initString = initString.replace(/<span.*$/gi,"");
        
        var theChar = inputText.charAt(charIndex);
       	var nextFourChars = inputText.substr(charIndex,4);
		if(nextFourChars=="...."){
			time = 3000;
		}else{
			time = 50;
		}
       	if(nextFourChars=='<br>'){
       		theChar = '<br>';
       		charIndex+=3;
       	}
        initString = initString + theChar + "<span id='blink'>▌</span>";
        document.getElementById('echoerror').innerHTML = initString;
        charIndex = charIndex/1 +1;
        if(charIndex<=stringLength){
            setTimeout('writeContent(false)',time);
        }else{
			document.title = "服务器无法连接";
		}
    }
	writeContent();
</script>
</body>
</html>