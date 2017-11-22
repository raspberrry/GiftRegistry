<?php
	session_start();
	if(!isset($_SESSION["name"]))
		header("Location: Try.php");
	else
	$conn=mysqli_connect("localhost","root","","wt"); //host,username,password,database
	if($conn)
	{
		$a=$_SESSION["name"];
		$query="Select * from humans where name like '$a'";
		$res=mysqli_query($conn,$query); //connection to be used and query it should execute
		$row=mysqli_fetch_assoc($res);//converts the first row into an associative array
		$_SESSION["user"]=$row;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		@font-face{
			font-family:bromello;
			src:url(bromello.otf);
		}
		#container{
		width:475px;
		height:475px;
		background-color:rgba(250, 0, 0, 0.2);
		border-radius:0;
		position:absolute;
		left:33%;
		top:15%;
		opacity:1;
		}
		div{
		width:200px;
		height:200px;
		background-color:lightpink;
		border-radius:5%;
		position:absolute;
		}
		#one{
		left:25px;
		top:25px;
		}
		#two{
		left:250px;
		top:25px;
		}
		#three{
		left:25px;
		top:250px;
		}
		#four{
		left:250px;
		top:250px;
		}
		
		body{
		background-image:url("/../HTML/Project/Images/flower.png");
		margin: 0 !important;
		padding: 0 !important;
		}
		#container div:hover{
		box-shadow:2px 2px 5px black;
		background-color:pink;

		}
		#dash{
		text-decoration:none;
		font-family:bromello;
		color:#eee;
		font-size:150%;
		text-align:center;
		text-shadow:2px 2px 2px black;
		vertical-align:middle;
		line-height:200px;
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
	<li style="float:left;" id="wel">Welcome Guest!</li>
</ul>
<div id="container">
	<div id="one"> <a id="dash" href="listall.php"> <h1> Lists </h1> </a> </div>
	<div id="two"> <a id="dash" href="profile.php"> <h1> Profile </h1> </a> </div>
	<div id="three"> <a id="dash" href="explore.php"> <h1> Explore </h1> </a> </div>
	<div id="four"> <a id="dash" href="calendar.php"> <h1> Calendar </h1> </a> </div>
</div>
</body>
<script>
	document.getElementById("wel").textContent= "Welcome <?php echo $_SESSION['name']; ?>!";
</script>