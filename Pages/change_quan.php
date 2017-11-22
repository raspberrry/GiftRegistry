<?php
	extract($_POST);
	$conn=mysqli_connect("localhost","root","","wt");
	if($conn)
	{
		$a=explode("*",$change);
		$query="Select * from $list";
		$res=mysqli_query($conn,$query);
		$count=sizeof($a);
		for($i=0;$i<$count;$i++)
		{
			$row=mysqli_fetch_assoc($res);
			$item=$row['item'];
			$quan=$a[$i];
			$query1="Update $list set quantity='$quan' where item like '$item'";
			$res1=mysqli_query($conn,$query1);
			echo $res1;
			echo $query1;
		}
	}
	header("Location: createlist.php");
?>