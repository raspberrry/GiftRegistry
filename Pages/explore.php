<?php
	session_start();
	if(!isset($_SESSION["name"]))
		header("Location: Try.php");
	else
	{			
		$conn=mysqli_connect("localhost", "root","","wt");
		if(!$conn)
		{
			echo mysqli_connect_error();
			echo "error";
		}
		else
		{
			$query="Select * from items";
			$res=mysqli_query($conn,$query);
			$num=mysqli_num_rows($res);
			$table= array();
			echo '<script>';
			echo 'var items= new Array();';
			echo 'var len='. $num.';';
			echo '</script>';
			for($i=0;$i<$num;$i++)
			{
				$row=mysqli_fetch_assoc($res); 
				$table[$i]["item_name"]=$row["item_name"];
				$table[$i]["item_desc"]=$row["item_desc"];			
				$table[$i]["item_href"]=$row["item_href"];
				echo '<script>';
				echo 'items['.$i .'] = ' . json_encode($table[$i]). ';';	
				echo '</script>';				
			}		
		}
		echo '<script>';
		echo 'user= ' . json_encode($_SESSION['user']). ';';	
		echo '</script>';
	}
?>

<html>
<head>
	<style>
		@font-face{
			font-family:bromello;
			src:url(bromello.otf);
			}
		body{
			background-image:url("/../HTML/Project/Images/color.png");
			margin: 0 !important;
		    padding: 0 !important;
			}
		div.body1{
			position:absolute;
			height:275px;
			width:925px;
			top:50px;
			background-color:#e6e6ff;
			border-radius:4%;
			transform: translateX(40%)
			}
		.flip1{
			position:absolute;
			height:250px;
			width:200px;
			background-color:lightblue;	
			top:25px;
			line-height:250px;
			transition: background-image 2s;
			}
		.flip2{
			position:absolute;
			height:250px;
			width:200px;
			background-color:lightblue;	
			top:300px;
			line-height:250px;
			}
		.flip3{
			position:absolute;
			height:250px;
			width:200px;
			background-color:lightblue;	
			top:575px;
			line-height:250px;
			}
		.flip4{
			position:absolute;
			height:250px;
			width:200px;
			background-color:lightblue;	
			top:850px;
			line-height:250px;
			}
		.image{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			}
		.r_1{
			left:25px;
			}
		.r_2{
			left:250px;
			}
		.r_3{
			left:475px;
			}
		.r_4{
			left:700px;
			}
		#menu{
			height:100px;
			width:100px;
			background-color:white;
			position:absolute;
			border:2px dashed black;
		}
		#menu p{
			font-family:"Times New Roman";
			font-size:12px;
			color:black;
			}
		#desc{
			position:absolute;
			bottom:10px;
			font-family:Arial;
			font-size:10px;
			color:black;
		}
		p{
			font-family:bromello;
			font-size:250%;
			vertical-align:middle;
			line-height:normal;
			color:#ffe6ff;
			text-shadow:2px 2px 8px grey;
			text-align:center;
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
		p.a,a{
			text-decoration:none;
			text-align:center;
			display:block;
			color:black;
			text-shadow:0px 0px 0px black;
		}
		p.a:hover
		{
			text-shadow:2px 2px 2px grey;
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
	</style>
</head>
<body>
	<ul>
	<li><a href="/../HTML/Project/Pages/Homepage_n.php">Logout</a></li>
	<li><a href="/../HTML/Project/Pages/Dash.php">Home</a></li>
	</ul>
	<div class="name"><p>Explore</p></div>
	<div class="sidebar"><p>Find new items</p></div>
	<center>
	<div class="body1" id="body1"></div>
	</center>	
</body>
<script>
		var f=document.createElement("form");
		f.style.display="none";
		var o=document.createElement("input");
		o.type="text";
		o.name="object"
		var lm=document.createElement("input");
		lm.type="text";
		lm.name="list";
		f.action="add_item.php";
		f.method="post";
		f.appendChild(lm);
		f.appendChild(o);
		var body1=document.querySelector("#body1");
		var k=1;
		for(var i=0;i<len;i++)
		{
			l=(i)%4;
			if(i!=0 && (i)%4==0){
				k++;
				body1.style.height=body1.offsetHeight+300;
				l=0;
			}
			var div1=document.createElement("div");
			var a=document.createElement("a");
			var divin=document.createElement("div");
			divin.className="plus";
			divin.style.width=18;
			divin.style.height=18;
			var p_des=document.createElement("p");
			p_des.id="desc";
			p_des.textContent=items[i]["item_desc"];
			div1.appendChild(p_des);
			div1.style.backgroundImage="url('/../HTML/Project/Images/plus.png'),url('/../HTML/Project/Images/"+items[i]["item_href"].slice(0,-5)+".png"+"')";
			divin.style.marginLeft=0;
			divin.style.marginTop=1;
			divin.style.marginRight=185;
			div1.style.backgroundRepeat="no-repeat,no-repeat";
			div1.style.backgroundPosition="top left,center";
			div1.style.backgroundSize="20px,150px";
			div1.appendChild(divin);
			div1.className="flip"+parseInt(k)+" r_"+parseInt(l+1);
			a.href="/../HTML/Project/Pages/Items/"+items[i]["item_href"].slice(0,-5)+".html";
			a.appendChild(div1);
			body1.appendChild(a);
		}		
		var m=document.createElement("div");
		m.id="menu";
		
		m.addEventListener("mouseleave",remove,false);
		var p=document.createElement("p");
		p.textContent="Add to";
		p.className="b";
		m.appendChild(p);
		
		var list=new Array(user.list1,user.list2,user.list3);
		var i=0;
		if(list[0]==null)
		{
			var a1 = document.createElement('a');
			var link_a1 = document.createElement("p");
			link_a1.textContent="No lists, create new?";
			a1.appendChild(link_a1);
			link_a1.className="a";
			a1.href = "/../HTML/Project/Pages/listall.php";
			m.appendChild(a1);
		}
		else
		{
			while(list[i]!=null)
			{
				var a1 = document.createElement('a');
				var x=list[i].split("*");
				var link_a1 = document.createElement("p");
				link_a1.textContent=""+x[0];
				link_a1.className="a";
				link_a1.addEventListener("click",add,false);
				m.appendChild(link_a1);
				i++;
			}
		}
		
		m.style.display="none";
		document.body.appendChild(m);
		var divs=document.querySelectorAll(".plus");
		for(var i=0;i<divs.length;i++)
		{
			divs[i].addEventListener("click",menu,false);
			
		}
		function menu(e)
		{
			m.style.display="block";
			e.preventDefault();
			m.style.left=e.pageX;
			m.style.top=e.pageY;
			var abc=e.target.parentNode.style.backgroundImage.split("/");
			var def=abc[10].split("\"");
			o.value=def[0];
		}
		function remove(e)
		{
			m.style.display="none";
		}
		function add(e)
		{
			lm.value=e.target.textContent;
			f.submit();
		}
		document.body.appendChild(f);
		
</script>
</html>
