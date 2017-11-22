<?php
	session_start();
	$a=$_SESSION['user'];
	$no=$a['no_columns'];
	$items=Array();
	$descs=Array();
	for($i=0;$i<$no;$i++)
	{
		$listc=explode("*",$a['list'.($i+1)]);
		array_push($items,$listc[2]);
		array_push($descs,$listc[1]);
		echo "<script> var date = ". json_encode($items). "; </script>";
		echo "<script> var desc = ". json_encode($descs). ";</script>";	

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
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif; background-color:rgba(0,250,200,0.2);
margin: 0 !important;
		    padding: 0 !important;
}

.month {
    padding: 70px 25px;
    width: 100%;
    background: #1abc9c;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 13.6%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13.6%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}
.act{
	list-style-type: none;
    display: inline-block;
    width: 13.6%;
    margin-left:4px;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}
.days #active {
    padding: 5px;
    background: #1abc9c;
    color: white !important
}

h1{
	font-size:350%;
	font-family:bromello;
	text-align:center;
}
ul.nav {
				
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color:rgba(0, 255, 205, 0.38) ;
		height:40px;
		}
		ul.nav li {
			float: right;
			margin-right:15px;
		}
		ul.nav li a{
			display: block;
			color: black;
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

		ul.nav li a:hover {
			background-color:rgba(0, 255, 205, 0.4) ;
		}

</style>
</head>
<body>
<ul class="nav">
	<li><a href="Homepage_n.php">Logout</a></li>
	<li><a href="Dash.php">Home</a></li>
</ul>
<h1>Upcoming events</h1>
<br/><br/>
<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li id="month">
      August 2017<br>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Su</li>
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li> 
</ul>

<ul class="days" id="days">  
  <li class="d1">1</li>
  <li class="d2">2</li>
  <li class="d3">3</li>
  <li class="d4">4</li>
  <li class="d5">5</li>
  <li class="d6">6</li>
  <li class="d7">7</li>
  <li class="d8">8</li>
  <li class="d9">9</li>
  <li class="d10">10</li>
  <li class="d11">11</li>
  <li class="d12">12</li>
  <li class="d13">13</li>
  <li class="d14">14</li>
  <li class="d15">15</li>
  <li class="d16">16</li>
  <li class="d17">17</li>
  <li class="d18">18</li>
  <li class="d19">19</li>
  <li class="d20">20</li>
  <li class="d21">21</li>
  <li class="d22">22</li>
  <li class="d23">23</li>
  <li class="d24">24</li>
  <li class="d25">25</li>
  <li class="d26">26</li>
  <li class="d27">27</li>
  <li class="d28">28</li>
  <li class="d29">29</li>
  <li class="d30">30</li>
  <li class="d31">31</li>
</ul>
<p 
</body>
<script>
	var a=date[0].split("-");
	var d=new Date(parseInt(a[0]),a[1]-1,1);
	var diff=d.getDay();
	var ul1=document.getElementById("days");
	for(var j=0;j<diff;j++)
	{
		var cr=document.createElement("li");
		cr.className="act";
		cr.innerHTML="";
		ul1.insertBefore(cr,ul1.firstChild);
	}
	var date_act=a[2];
	var get=document.querySelector("li.d"+parseInt(date_act));
	var mt=document.getElementById("month");
	switch(parseInt(a[1])){
		case 1: mt.textContent="January"; break;
		case 2: mt.textContent="February"; break;
		case 3: mt.textContent="March"; break;
		case 4: mt.textContent="April"; break;
		case 5: mt.textContent="May"; break;
		case 6: mt.textContent="June"; break;
		case 7: mt.textContent="July"; break;
		case 8: mt.textContent="August"; break;
		case 9: mt.textContent="September"; break;
		case 10: mt.textContent="October"; break;
		case 11: mt.textContent="November"; break;
		case 12: mt.textContent="December"; break;
	}
	mt.textContent+=" "+a[0];
	get.id="active";
	var act=document.querySelectorAll("#active");
	for(var i=0;i<act.length;i++)
	{
		act[i].addEventListener("mouseover",tag,false);
		act[i].addEventListener("mouseout",untag,false);
	}
	function tag(e){
		num=e.target.textContent;
		e.target.textContent=desc;
	}
	function untag(e){
		e.target.textContent=num;
	}
</script>

</html>
