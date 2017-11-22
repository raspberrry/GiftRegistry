<?php
	session_start();
	extract($_POST);
	$flag=0;
	$conn=mysqli_connect("localhost","root","","wt"); //host,username,password,database
	if(!$conn)
	{
		echo mysqli_connect_error();
		echo "Error";
	}
	else
	{
		$query="Select * from humans where name like '$usrn'";
		$res=mysqli_query($conn,$query); //connection to be used and query it should execute
		//$res is a record set
		$count=mysqli_num_rows($res);
		for($i=0;$i<$count;$i++)
		{
			$row=mysqli_fetch_assoc($res);//converts the first row into an associative array
			if($row['password']==$psw)
			{
				//echo "User found";
				session_start();
				$_SESSION['name']=$usrn;
				header("Location: /../HTML/Project/Pages/Dash.php");
			}
			else 
			{
				header("Location: /../HTML/Project/Pages/Try.php");
				$_SESSION['Log']="Incorrect";
			}
		}	
		if($count==0)
		{
			header("Location: /../HTML/Project/Pages/Try.php");
			$_SESSION['Log']="DNE";
		}
	}
?>
