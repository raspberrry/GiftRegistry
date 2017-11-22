<?php
	session_start();
	$list=$_SESSION['list'];
	$a=$_SESSION['user'];
	$items=Array();
	$quan=Array();
	$listc=explode("*",$a['list'.$list]);
	$conn=mysqli_connect("localhost","root","","wt");
	if($conn)
	{
		$a=$listc[0];
		$query1="Select * from $a";
		$res=mysqli_query($conn,$query1);
		if($res!=false)
			$count=mysqli_num_rows($res);
		else 
			$count=0;
		for($i=0;$i<$count;$i++)
		{
			$row=mysqli_fetch_assoc($res);
			$a=$row['item'];
			$query2="Select * from items where item_name like '$a'";
			$res1=mysqli_query($conn,$query2);
			$row1=mysqli_fetch_assoc($res1);
			array_push($items,implode("_",$row1));
			array_push($quan,$row['quantity']);
		}
		echo '<script>';
		echo 'var items = ' . json_encode($items) . ';';
		echo 'var quan1 = ' . json_encode($quan) . ';';
		echo '</script>';
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
			div.name{
			height:200px;
			width:200px;
			position:fixed;
			top:50px;
			left:75px;
			background-color:salmon;
			border-top-right-radius:50%;
			border-bottom-left-radius:50%;
			line-height:250px;
			box-shadow:4px 4px 5px lightgrey;
			
			}
			p{
			font-family:bromello;
			font-size:250%;
			vertical-align:middle;
			line-height:normal;
			color:#ffe6ff;
			text-shadow:2px 2px 8px grey;
			}
			body{
			background-image:url("/../HTML/Project/Images/color.png");
			margin: 0 !important;
		    padding: 0 !important;
			}
			div.body{
			position:absolute;
			left:350px;
			top:50px;
			height:575px;
			width:925px;
			background-color:#e6e6ff;
			border-radius:4%;
			}
			div.sidebar{
			position:fixed;
			left:75px;
			top:275px;
			background-color:lightpink;
			border-top-left-radius:50%;
			border-bottom-right-radius:50%;
			height:325px;
			width:200px;
			box-shadow:4px 4px 5px lightgrey;
			}
			div[class^=flip]{
			position:absolute;
			height:250px;
			width:200px;
			top:25px;
			//line-height:250px;
			}
			.image{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			width:180px;
			height:180px;
			margin:auto;
			}
			.flip_1_1
			{
				background-color:rgba(153,204,255,0.6);	
			}
			.flip_1_1:hover{
			opacity:0.8;
			background-image:none;
			}
			ul {
				
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color:rgba(0, 0, 255, 0.08) ;
		height:40px;
		}
		li {
			float: right;
			margin-right:15px;
		}
		li a{
			display: block;
			color: white;
			text-align: center;
			text-decoration: none;
			font-family:"Times new roman"
			text-decoration:none;
			font-family:bromello;
			vertical-align:middle;
			line-height:40px;
			font-size:120%;
			font-family:"calibri";
		}

		li a:hover {
			background-color:rgba(0, 0, 255, 0.4) ;
		}
		div.front, div.back{
			width:100%;
			height:100%;	
			backface-visibility: hidden;
			transform-style:preserve-3d;
			position:absolute;
			transition:transform 1s;
			background-repeat:no-repeat;
			background-size:200px 250px;
			background-color:rgba(153,204,255,0.6);
		}
		div.back{
			transform: rotateY(-180deg);
			font-family:Calibri;
			font-size:17px;
		}
		#inc,#dec{
			
			background-color:green;
			width:30px;
			height:30px;
			border:none;
			margin:7px;
			font-weight:bold;
			display:inline;
			font-size:18px;
			margin-top:15px;
		}
		#dec{
			background-color:red;
		}
			
		#quan{
			color:darkblue;
			display:inline;
			padding:2px;
			vertical-align:middle;
			line-height:35px;
		}
		#sub{
			color:white;
			background-color:rgba(0,0,0,0.2);
			border:none;
			height:30px;
			width:150px;
		}
		#sub:hover{
			box-shadow:1px 1px 1px white;
		}
		.front:hover
		{
			opacity:0.9;
		}
		.details{
			height:180px;
		}
		</style>
	</head>
	<body>
	<ul>
	<li><a href="Homepage_n.php">Logout</a></li>
	<li><a href="dash.php">Home</a></li>
	<li><a href="listall.php">My lists</a></li>
	</ul>
	<center>
		
		<div class="body" id="body1">
			<div class="flip_1_1" style="left:25px;"> <img class="image" src="/../HTML/Project/Images/plus.png" style="width:120px;height:120px;margin:auto;"/> </div>
		</div>
		<div class="name"><p><?php echo $listc[0]?></p></div>
		<div class="sidebar"><p><?php echo $listc[1]; echo "<br/>$listc[2]";?></p></div>
		<form id="hmm" action="change_quan.php" method="post">
			<input type="text" name="change" style="display:none;" id="change">
			<input type="text" name="list" style="display:none;" id="list" value="<?php echo $listc[0]?>">
			<input type="submit" value="Submit changes" style="display:none;" id="sub">
		</form>
	</center>
	</body>
	<script>
		var plus=document.querySelector("div.flip_1_1");
		plus.addEventListener("click",explore,false);
		var form=document.createElement("f");
		form.method="post";
		form.action="edit_quan.php";
		function add(item,i)
		{
			var body1=document.querySelector("#body1");
			var len=body1.children.length-1;
			var last=body1.children[len].className.split("_");
			var row=last[1];
			
			var item_no=last[2];
			var addn=document.createElement("div");
			var front=document.createElement("div");
			front.className="front";
			var back=document.createElement("div");
			back.className="back";
			var properties=item.split("_");
			front.addEventListener("click",flip,false);
			back.addEventListener("mouseleave",flipback,false);
			front.style.backgroundImage="url('/../HTML/Project/Images/"+properties[3]+"')";
			var det=document.createElement("div");
			det.className="details";
			det.innerHTML="</br><h2>"+properties[0]+"</h2>"+properties[1]+"</br>";
			quan=document.createElement("div");
			quan.id="quan";
			inc=document.createElement("input");
			inc.id="inc";
			inc.type="button"
			inc.value="+";
			inc.addEventListener("click",increment,false);
			dec=document.createElement("input");
			dec.id="dec";
			dec.type="button"
			dec.value="-";
			dec.addEventListener("click",decrement,false);
			
			quan.textContent=parseInt(quan1[i]);
			
			
			back.appendChild(det);
			back.appendChild(dec);
			back.appendChild(quan);
			back.appendChild(inc);
			addn.appendChild(front);
			addn.appendChild(back);
			if(item_no=="4"){
			body1.style.height=body1.offsetHeight+275+"px";
			
			addn.className="flip_"+(parseInt(row)+1)+"_"+"1";
			addn.style.top=25+(parseInt(row))*275+"px";
			addn.style.left=25+"px";
			}
			else{
			addn.className="flip_"+row+"_"+(parseInt(item_no)+1);
			addn.style.top=25+(parseInt(row)-1)*275+"px";
			addn.style.left=25+(parseInt(item_no))*225+"px";
			}
			body1.appendChild(addn);
		}
		function explore()
		{
			window.location.href="explore.php";
		}
		var i=0;
		function flip(e)
		{
			var k=e.target.parentNode.children[0];
			var l=e.target.parentNode.children[1];
			k.style.transform="rotateY(180deg)";
			l.style.transform="rotateY(0deg)";
		
		}
		function flipback(e)
		{
			var k=e.target.parentNode.children[0];
			var l=e.target.parentNode.children[1];
			k.style.transform="rotateY(0deg)";
			l.style.transform="rotateY(-180deg)";
		}
		for(i=0;i<items.length;i++)
		{
			add(items[i],i);
		}
		function increment(e)
		{
			var a=e.target.parentNode.children;
			a[2].innerHTML=parseInt(a[2].innerHTML)+1;
			var m=document.getElementById("sub");
			m.style.position="absolute";
			m.style.top=640;
			m.style.left=1100;
			m.style.display="block";
		}
		function decrement(e)
		{
			var a=e.target.parentNode.children;
			if(a[2].innerHTML>0)
			{
				a[2].innerHTML=parseInt(a[2].innerHTML)-1;
				var m=document.getElementById("sub");
				m.style.position="absolute";
				m.style.top=640;
				m.style.left=1100;
				m.style.display="block";
			}
		}
		function update(e)
		{
			e.preventDefault();
			var f=document.getElementById("hmm");
			var d=f.children[0];
			var q=document.querySelectorAll("#quan");
			var bar=[];
			for(i=0;i<q.length;i++)
			{
				bar[i]=q[i].textContent;
			}
			d.value=bar.join("*");
			f.submit();
		}
		var f=document.getElementById("hmm");
		f.addEventListener("submit",update,false);
		
	</script>
</html>