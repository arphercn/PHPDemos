<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<div id="content" style="margin:100px auto 2px;
	width:500px;height:300px;padding:10px;
	border:1px solid #ccc;line-height: 300px;">
		222222222222222
	</div>
	<div style="margin:0 auto;width:500px;">
		<select name="" id="" onchange="styleChange(this)">
			<option value="heavy">重风格</option>
			<option value="light">轻风格</option>
		</select>
	</div>
</body>
</html>
<script>
var content = document.getElementById('content');
function styleChange(dom){
	if(dom.value=='heavy'){
		content.innerHTML='<h3>重风格</h3><p>重风格的颜色深</p>';
		content.style.backgroundColor = '#333';
	}else if(dom.value=='light'){
		content.innerHTML='我是轻风格';
		content.style.backgroundColor = '#ccc';
	}
}
</script>