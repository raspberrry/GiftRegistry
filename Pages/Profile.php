<?php
	session_start();
	if(isset($_SESSION['user']))
	{
		echo '<script>';
		echo 'var u = ' . json_encode($_SESSION['user']) . ';';
		echo '</script>';
	}
	else
		header("Location: Try.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			body
			{
				background-image:url("/../HTML/Project/Images/flower.png");
				
				font-size: 16px;
				font-family: Verdana;
				margin: 0 !important;
				padding: 0 !important;
			}
			table 
			{
				margin-left:30px;
				border-collapse: collapse;
				width: 96%;
				background-color:rgba(250,250,250,0.7);
				float:center;
			}
			td
			{
				padding: 16px;
				width:48%;
				text-align: center;
				border-bottom: 1px solid #ddd;
				float:center;
			}
			span
			{
				text-align: center;
				width: 98%;
			}
			input[type=text],input[type=date],input[type=email]
			{
				width:100%;
				float:center;
				text-align:center;
			}
			input[placeholder]
			{
				text-align:center;
				font-size:14px;
			}
			.box{display:none;}
			button,#sub
			{
				width:100%;
				background-color: lightpink; 
				border: none;
				color: white;
				padding: 8px 8px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				margin: 4px 2px;
				cursor: pointer;
			}
			.img-circle 
			{
				border-radius: 100%;
				background-image:url("/../HTML/Project/Images/contacts-257.png");
				background-size: 280px 280px;
				width:280px;
				height:280px;
				color:white;
				font-size:30px;
				
			}
			div.return
			{ 	
				/*height:30px;
				width:30px;
				position:absolute;
				left:20px;
				top:20px;*/
			}
			.img-circle:hover{
				opacity:0.8;
			}
			ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color:rgba(250, 0, 0, 0.06) ;
			height:40px;
			}
			li {
				float: right;
				margin-right:15px;
				margin-left:15px;
			}
			li a,li{
				display: block;
				color: #efe;
				text-align: center;
				text-decoration: none;
				font-family:"Times new roman"
				text-decoration:none;
				font-family:bromello;
				vertical-align:middle;
				line-height:40px;
				font-size:120%;
				font-family:"calibri";
				text-shadow:1px 1px 1px black;
			}

			li a:hover {
				background-color:rgba(250, 0, 0, 0.2) ;
			}
		</style>
	</head>
	<body>
		<ul>
			<li><a href="Homepage_n.php">Logout</a></li>
			<li><a href="Dash.php">Home</a></li>
			<li style="float:left;">Profile</li>
		</ul>
		
		<center>
			<div class="img-circle"></div>
		</center>
		<form id="f" action="Mod.php" method=post>
		<table style="position:absolute;top:330px;">
		<tr>
			<td><span id="l1" class="lab">Name</span></td>
			<td><span id="v1" class="val">User</span></td>
			<td><button id="myBtn1" type="button" onclick="halp.changeDiv(1)"  >&#9998;</button></td>
		</tr>
		<tr>
			<td><span id="l2" class="lab">Email</span></td>
			<td><span id="v2" class="val">User</span></td>
			<td><button id="myBtn2" type="button" onclick="halp.changeDiv(2)"  >&#9998;</button></td>
		</tr>
		<tr>
			<td><span id="l3" class="lab">Date of Birth</span></td>
			<td><span id="v3" class="val">Jan 1 2000</span></td>
			<td><button id="myBtn3" type="button" onclick="halp.changeDiv(3)"  >&#9998;</button></td>
		</tr>
		<tr>
			<td><span id="l4" class="lab">City</span></td>
			<td><span id="v4" class="val">Bangalore</span></td>
			<td><button id="myBtn4" type="button" onclick="halp.changeDiv(4)"  >&#9998;</button></td>
		</tr>
		<tr>
			<td colspan=3><input style="width:30%;opacity:0;" id="sub" type="submit" value="Submit changes"/></td>
		</tr>
		</table>
			<input type="text" id="img_src" name="Img" style="display:none;"/>
		</form>
		<div id="b1" class="box">
			<input id="tb1" type="text" name="Name"  />
		</div>
		<div id="b2" class="box">
			<input id="tb2" type="email" name="Email"  />
		</div>
		<div id="b3" class="box">
			<input id="tb3" type="date" name="DOB"  />
		</div>
		<div id="b4" class="box">
			<input id="tb4" type="text" name="City" / >
		</div>
		<script>
		var halp=
		{
		changeDiv:
			function(a)
			{
				if(a!=3)
					document.getElementById('tb'+a).placeholder=document.getElementById('v'+a).innerHTML;
				document.getElementById('v'+a).innerHTML = document.getElementById('b'+a).innerHTML;
				if(a!=3)
					document.getElementById('tb'+a).focus();
				document.getElementById('sub').style.opacity=100;
			},
		getParameterByName:
			function(para)
			{
				return (u[para]);
			}
		}
		var exec=
		{
		change:
			function()
			{
				var a =halp.getParameterByName('name');
				if(a!=null&&a!='') 
				{
					document.getElementById('v1').innerHTML = a;
				}
				var b =halp.getParameterByName('DOB');
				if(b!=null&&b!='') 
				{
					
					var g= new Date(b.slice(0,4),b.slice(5,7)-1,b.slice(8,10));
					var n=g.toDateString();
					var m= n.slice(4,15);
					document.getElementById('v3').innerHTML = m;
				}
				var c =halp.getParameterByName('city');
				if(c!=null&&c!='') 
				{
					document.getElementById('v4').innerHTML = c;
				}
				var d =halp.getParameterByName('email');
				if(d!=null&&d!='') 
				{
					document.getElementById('v2').innerHTML = d;
				}
				var e =halp.getParameterByName('prof');
				if(e!=null&&e!='') 
				{
					document.querySelector('.img-circle').style.backgroundImage ="url('/../HTML/Project/Images/"+e+"')";

				}
			}
		}
		exec.change();
		document.querySelector(".img-circle").addEventListener("mouseenter",function(e){e.target.innerHTML="<br/><br/><br/><br/><br/>&#9998;";},false);
		document.querySelector(".img-circle").addEventListener("mouseleave",function(e){e.target.innerHTML="";},false);
		document.querySelector(".img-circle").addEventListener("click",function(e){var a =prompt("Enter the name of the file");
																						var b =document.getElementById('img_src');
																						b.value=a;
																						document.getElementById("f").submit();
																						},false);
		</script>
	</body>
</html>