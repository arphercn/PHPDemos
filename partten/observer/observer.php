<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<div id="dom" style="margin:20px auto 2px;
	width:500px;height:100px;padding:10px;
	border:1px solid #ccc;line-height: 100px;">
		111111111111
	</div>

	<div id="dom2" style="margin:20px auto 2px;
	width:500px;height:100px;padding:10px;
	border:1px solid #ccc;line-height: 100px;">
		2222222222222222222
	</div>
	<div id="dom3" style="margin:20px auto 2px;
	width:500px;height:100px;padding:10px;
	border:1px solid #ccc;line-height: 100px;">
		3333333333333333333333333333
	</div>

	<div style="margin:0 auto;width:500px;">
		<select name="" id="selector">
			<option value="heavy">重风格</option>
			<option value="light">轻风格</option>
		</select>
		<input type="button" value="观察老3" onclick="see()">
		<input type="button" value="不观察老3" onclick="doNotSee()">
	</div>
</body>
</html>
<script>
	var selector = document.getElementById('selector');
	selector.observers = {};
	selector.attach = function(key,obj){
		this.observers[key] = obj;
	}
	selector.detach = function(key){
		delete this.observers[key];
	}
	selector.onchange = selector.notify = function(){
		for(var key in this.observers){
			this.observers[key].update(this);
		}
	}

	var dom = document.getElementById('dom');
	var dom2 = document.getElementById('dom2');
	dom.update = function(observee){
		if(observee.value=='heavy'){
			this.innerHTML = '已选择重风格';
		}else if(observee.value=='light'){
			this.innerHTML = '轻风格';
		}
	}
	dom2.update = function(observee){
		if(observee.value=='heavy'){
			this.style.backgroundColor = '#999';
		}else if(observee.value=='light'){
			this.style.backgroundColor = '#ccc';
		}
	}

	//让dom观察seletor的变化
	selector.attach('dom',dom);
	selector.attach('dom2',dom2);

	/*
		增加边框风格	
	*/
	dom3.update = function(observee){
		if(observee.value=='heavy'){
			this.style.border = '5px solid #333';
		}else if(observee.value=='light'){
			this.style.border = '3px solid #aaa';
		}
	}

	function see(){
		selector.attach('dom3',dom3);
	}
	function doNotSee(){
		selector.detach('dom3');
	}
	
</script>