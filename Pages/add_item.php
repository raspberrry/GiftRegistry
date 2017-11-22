<?php
	extract($_POST);
	$conn=mysqli_connect("localhost","root","","wt"); //host,username,password,database
	if($conn)
	{
		$query="Select * from items where item_src like '$object'";
		$res=mysqli_query($conn,$query); //connection to be used and query it should execute
		$row=mysqli_fetch_assoc($res);//converts the first row into an associative array
		$x=$row['item_name'];
		$query2="Select * from $list where item like '$x'";
		$res2=mysqli_query($conn,$query2); //connection to be used and query it should execute
		$row2=mysqli_fetch_assoc($res2);
		$count=mysqli_num_rows($res);
		if($row2['quantity']!=0)
		{
			$q=$row2['quantity']+1;
			$query1="UPDATE $list SET quantity='$q' WHERE item='$x'";
		}
		else if($row2['quantity']==0)
		{
			$query1="INSERT INTO $list(item, quantity) VALUES ('$x',1)";
		}
		$res1=mysqli_query($conn,$query1);
	}
	//header("Location: /../HTML/Project/Pages/explore.php");
?>
<script>
	alert("Item added successfully");
	window.location.href="/../HTML/Project/Pages/explore.php";
</script>