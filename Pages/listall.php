<?php 
	session_start();
	if(!isset($_SESSION["name"]))
		header("Location: Homepage_n.php");
	else
	$conn=mysqli_connect("localhost","root","","wt"); //host,username,password,database
	if($conn)
	{
		$a=$_SESSION["name"];
		$query="Select * from humans where name like '$a'";
		$res=mysqli_query($conn,$query); //connection to be used and query it should execute
		$row=mysqli_fetch_assoc($res);//converts the first row into an associative array
		$_SESSION["user"]=$row;
		echo '<script>';
		echo 'var u = ' . json_encode($_SESSION['user']) . ';';
		echo '</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		input{
		heigth:200px;
		width:300px;
		display:block;
		position:relative;
		left:150px;
		}
		input[type=text],input[type=date],input[type=submit]{
		width: 60%;
		padding: 12px 20px;
		margin: 8px 0;
		box-sizing: border-box;
		}
		input[type=button],input[type=submit]
		{
			margin:10px;
			font-size:15px;
			color:white;
		}
		input[type=button]:hover,input[type=submit]:hover
		{
			box-shadow:2px 2px 2px salmon;
		}
		#btn1{
		position:absolute;
		left:35%;
		width:200px;
		height:40px;
		background-color:rgba(255,0,0,0.4);
		border:none;
		border-radius:5%;
		}
		#btn2{
		position:absolute;
		left:51%;
		width:200px;
		height:40px;
		background-color:rgba(255,0,0,0.4);
		border:none;
		border-radius:5%;
		}
		#inp1{
		top:50px;
		}
		#inp2{
		top:75px;
		}
		#label1{
		position:relative;
		left:150px;
		top:90px;
		}
		#inp3{
		top:95px;
		}
		#inp4{
		top:115px;
		background-color:rgba(255,0,0,0.4);
		border-radius:5%;
		border:none;
		}
		body{
		background-image:url("/../HTML/Project/Images/flower.png");
		margin: 0 !important;
		padding: 0 !important;
		}
		
		#frame{
		margin-left:auto;
		margin-right:auto;
		margin-top:120px;
		width:800px;
		height:400px;
		background-color:rgba(250,0,0,0.2);
		border-radius:5%;
		box-shadow:2px 2px 5px grey;
		color:white;
		font-size:20px;
		}
		#bar {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color:rgba(250, 0, 0, 0.06) ;
		height:40px;
		}
		li,#l {
			float: right;
			margin-right:15px;
			margin-left:15px;
		}
		li a,#l{
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
		#title{
		font-size:150%;
		font-color:white;
		}
		
		#ul{
		position:absolute;
		display:block;
		height:400px;
		left:36%; 
		padding:20px;
		top:150px;
		width:400px;
		background-color:rgba(250, 0, 0, 0.2) ;
		border-radius:5%;
		box-shadow:2px 2px 5px grey;
		padding:auto;
		list-style-type:none;
		}
		li[id$="li"]{
			text-align:center;
			color:white;
			float:none;
			padding-top:20px;
			padding-bottom:20px;
			font-size:300%;
		}
		li[id$="li"]:hover{
			background-color:rgba(250, 0, 0, 0.2)
		}
		p{
			margin-bottom:0px;
		}
	</style>
</head>
<body>
<ul id="bar">
	<li><a href="Homepage_n.php">Logout</a></li>
	<li><a href="Dash.php">Home</a></li>
	<li id="l" style="float:left;">Your lists</li>
</ul>
<input type="button" value="New list + " id="btn1">
<input type="button" value="All lists " id="btn2">
	
</body>
<script>
	var btn1=document.getElementById("btn1");
	btn1.addEventListener("click",list_det,false);
	var frame=document.createElement("div");
	frame.id="frame";
	
	var form1=document.createElement("form");
	form1.action="listadd.php";
	form1.method="POST";
	
	var inp1=document.createElement("input");
	inp1.type="text";
	inp1.placeholder="Enter a name for this list";
	inp1.id="inp1";
	inp1.name="inp1";
	inp1.required=true;
	
	var inp2=document.createElement("input");
	inp2.type="text";
	inp2.placeholder="What's this list for?";
	inp2.id="inp2";
	inp2.name="inp2";
	inp2.required=true;
	
	var label1=document.createElement("p");
	label1.textContent="When is the event?";
	label1.id="label1";
	
	var inp3=document.createElement("input");
	inp3.type="date";
	inp3.id="inp3";
	inp3.name="inp3";
	inp3.required=true;
	
	var inp4=document.createElement("input");
	inp4.type="submit";
	inp4.id="inp4";
	inp4.value="Proceed";
	
	
	form1.appendChild(inp1);
	form1.appendChild(inp2);
	form1.appendChild(label1);
	form1.appendChild(inp3);
	form1.appendChild(inp4);
	
	frame.appendChild(form1);
	frame.style.display="none";
	document.body.appendChild(frame);
	function list_det(e)
	{
		//console.log("hello");
		if(u.no_columns!=3)
		{
			//console.log(u);
		var caller=e.target;
		
		var title=document.createElement("title");
		title.textContent="New List!";
		title.id="title";
		
		//console.log("here");
		//e.target.removeEventListener("click",list_det,false);
		//e.target.style.display="none";
		
		document.body.appendChild(title);
		caller.disabled=true;
		btn2.disabled=false;
		btn2.style.opacity=1;
		caller.style.opacity=0.5;
		ul.style.display="none";
		frame.style.display="block";
		}
		else
			alert("Maximum number of lists reached");
	}	
	var ul=document.createElement("ul");
	ul.id="ul";
	var j=new Array(0,u.list1,u.list2,u.list3);
	for(var i=1;i<=u.no_columns;i++)
	{
		var a=j[i].split("*");
		var li1=document.createElement("li");
		li1.id=i+"li";
		li1.textContent=a[0];
		li1.addEventListener("click",redirect,false);
		ul.appendChild(li1);
	}

	ul.style.display="none"
	document.body.appendChild(ul);
	var btn2=document.getElementById("btn2");
	btn2.addEventListener("click",disp_list,false);
	function disp_list(e)
	{
		btn1.disabled=false;
		btn2.style.opacity=0.5;
		btn1.style.opacity=1;
		btn2.disabled=true;
		var caller=e.target;
		//console.log("sec");
		ul.style.display="block";
		frame.style.display="none";
	}
	form1.addEventListener("submit",hello,false);
	function hello(e)
	{
		e.preventDefault();
		if(u.no_columns!=3)
			form1.submit();
		else
			alert("Maximum number of lists reached");
	}
	function redirect(e)
	{
		var f=document.createElement("form");
		var t=document.createElement("input");
		t.type="text";
		t.name="list";
		t.style.display="none";
		t.value=parseInt(e.target.id);
		f.action="assign.php";
		f.method="post";
		f.appendChild(t);
		document.body.appendChild(f);
		f.submit();
	}
</script>
</html>