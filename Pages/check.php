<script>
	window.location.href="Try.php";
</script>
<?php
	extract($_POST);
	$conn=mysqli_connect("localhost","root","","wt");
	if($conn)
	{
		$query="INSERT INTO humans(name, email, password, DOB, city) VALUES('$usrn','$eml','$psw',NULL,NULL)";
		mysqli_query($conn,$query);
	}
?>