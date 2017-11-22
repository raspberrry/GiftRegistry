<?php
	session_start();
	if(isset($_SESSION['Log']))
	{
		if($_SESSION['Log']=='Incorrect')
		{
			echo '<script>alert("Incorrect Password");</script>';
		}
		else if($_SESSION['Log']=='DNE')
		{
			echo '<script>alert("Username does not exit");</script>';
		}
		unset($_SESSION['Log']);
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
		body{
		text-shadow:1px 1px 1px black;
		background-image:url("/../HTML/Project/Images/flower.png");
		margin: 0 !important;
		padding: 0 !important;
		}
		div.front, div.back{
			width:50%;
			height:80%;	
			backface-visibility: hidden;
			transform-style:preserve-3d;
			position:absolute;
			transition:transform 1s;
			top:10%;
			left:25%;
		}
		div.back{
			background-color:rgba(250,0,0,0.2);
			transform: rotateY(-180deg);
			font-family:verdana;
			font-size:20px;
			text-align:center;
		}
		div.front{
			background-color:rgba(250,0,0,0.2);
		}
		input.box{
			position:relative;
			margin-top:5%;
			margin-left:2%;
			margin-right:2%;
			width:85%;
			padding:2%;
		}
		button.box{
			position:relative;
			margin-top:5%;
			margin-left:2%;
			margin-right:2%;
			width:60%;
			padding:2%;
			background-color:lightpink;
			font-size:30px;
			color:white;
			border:none;
		}
		button.box:hover{
			background-color:pink;
			box-shadow:2px 2px 2px black;
		}
		#Login,#Sign
		{
			top:33%;
			left:35%;
			position:absolute;
			border:none;
			background-color:lightpink;
			width:30%;
			height:13%;
			font-size:20px;
			color:white;
			text-shadow:1px 1px 1px black;
			border-radius:5%;
		}
		#Login:hover,#Sign:hover,#go:hover,#go1:hover{
			box-shadow:2px 2px 2px black;
			background-color:pink;
		}
		#Sign
		{
			top:48%;
		}
		#go,#go1{
			border:none;
			color:white;
			background-color:lightpink;
		}
	</style>
</head>
<body>
	<div id="back1" class="back">
		<br/><br/>
		<form  action="store.php" method="post">
			<div><input  class="box" type="text" placeholder="Username" name="usrn" required></div>
			<div><input  class="box" type="password" placeholder="Password" name="psw" required></div>
			<div><button class="box" type="submit">Login</button></div>
			<input type="button" value="Back" id="go">
		</form> 
	</div>
	<div class="back" id="back2">
		<br/>
        <form id="f" action="check.php" method="post">
			<div><input class="box" type="text" placeholder="Enter Username" name="usrn" required></div>
			<div><input class="box" type="email" placeholder="Enter a valid Email-id" name="eml" required></div>
			<div>
				<input id="pasw" class="box" type="password" placeholder="Enter Password" name="psw" required>
				<h6 style="margin:0;color:white;">Min password length is 8</h6>
			</div>
			<div>
				<input id="pasw_c" class="box" type="password" placeholder="Confirm Password" name="psw_c" required>
			</div>
			<div><button id="sub" class="box" type="submit" value="submit">Submit</button></div>
			<input type="button" value="Back" id="go1">			
		</form>
	</div>
	<div id="front" class="front">
		<form>
			<input id="Login" type="button" value="Login"/>
			<input id="Sign" type="button" value="Sign-up"/>
		</form>
	</div>
</body>
<script>
	var obj={
		flip:function()
		{
			var k=document.getElementById('front');
			var l=document.getElementById('back1');
			k.style.transform="rotateY(180deg)";
			l.style.transform="rotateY(0deg)";
		},
		flip1:function()
		{
			var k=document.getElementById('front');
			var l=document.getElementById('back2');
			k.style.transform="rotateY(180deg)";
			l.style.transform="rotateY(0deg)";
		
		},
		flipback:function()
		{
			var k=document.getElementById('front');
			var l=document.querySelector('#back1');
			k.style.transform="rotateY(0deg)";
			l.style.transform="rotateY(-180deg)";
		},
		flipback1:function()
		{
			var k=document.getElementById('front');
			var l=document.querySelector('#back2');
			k.style.transform="rotateY(0deg)";
			l.style.transform="rotateY(-180deg)";
		}
	}
	var m=document.querySelector("#Login");
	var n=document.querySelector("#Sign");
	var o=document.querySelector("#go");
	var p=document.querySelector("#go1");
	var s=document.querySelector("#sub");
	m.addEventListener("click",obj.flip,false);
	n.addEventListener("click",obj.flip1,false);
	o.addEventListener("click",obj.flipback,false);
	p.addEventListener("click",obj.flipback1,false);
	var pswd=
	{
		chk:function()
		{
			var a=document.getElementById("pasw");
			var b=document.getElementById("pasw_c");
			var c=document.getElementById("f");
			if((a.value==b.value)&&(a.value.length>=8))
			{
				console.log("match");
				c.submit();				
			}
			else 
			{
				console.log("Nope");
				c.reset();
				
			}
		}
	}
	s.addEventListener("click",pswd.chk,false);
</script>
</html>
