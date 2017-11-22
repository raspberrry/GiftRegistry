<?php
	session_start();
	extract($_POST);
	$conn=mysqli_connect("localhost","root","","wt"); //host,username,password,database
	if($conn)
	{
		$a=$_SESSION["name"];
		if(array_key_exists("DOB",$_POST))
		{
			$query="Update humans set DOB='$DOB' where name like '$a'";
			$res=mysqli_query($conn,$query); 
		}
		if(array_key_exists("City",$_POST))
		{
			$query="Update humans set city='$City' where name like '$a'";
			$res=mysqli_query($conn,$query); //connection to be used and query it should execute	
		}
		if(array_key_exists("Name",$_POST))
		{
			$query="Update humans set name='$Name' where name like '$a'";
			$res=mysqli_query($conn,$query);
			$_SESSION["name"]=$Name;
			$a=$Name;
		}
		if(array_key_exists("Email",$_POST))
		{
			$query="Update humans set email='$Email' where name like '$a'";
			$res=mysqli_query($conn,$query); //connection to be used and query it should execute	
		}
		if(array_key_exists("Img",$_POST)&&$Img!="")
		{
			$query="Update humans set prof='$Img' where name like '$a'";
			$res=mysqli_query($conn,$query); //connection to be used and query it should execute	
		}
	}
	header("Location: /../HTML/Project/Pages/Dash.php");
?>