<?php
	session_start();
	extract($_POST);
	$a=$_SESSION["name"];
	$conn=mysqli_connect("localhost","root","","wt");
	if($conn)
	{
		$query1="Select * from humans where name like '$a'";
		$res=mysqli_query($conn,$query1);
		$row=mysqli_fetch_assoc($res);
		$list=array($inp1,$inp2,$inp3);
		$str=implode("*",$list);
		if($row['no_columns']!=3)
		{
			if($row['list1']=="")
			{
				$query="Update humans set list1='$str' where name like '$a'";
				$query2="Update humans set no_columns='1' where name like '$a'";
			}
			else if($row['list2']=="")
			{
				$query="Update humans set list2='$str' where name like '$a'";
				$query2="Update humans set no_columns='2' where name like '$a'";
			}
			else if($row['list3']=="")
			{
				$query="Update humans set list3='$str' where name like '$a'";
				$query2="Update humans set no_columns='3' where name like '$a'";
			}
			$res=mysqli_query($conn,$query);
			$res1=mysqli_query($conn,$query2);
			$query3="CREATE TABLE $inp1 (item varchar(30) NOT NULL, quantity int(10) NOT NULL) ;";
			$res=mysqli_query($conn,$query3);
		}
		header("Location: listall.php"); 
	}
?>