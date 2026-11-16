<?php
$cn=@mysqli_connect('localhost','root','','room');
$sel="select * from room ";
$eq=mysqli_query($cn,$sel);
$rc=mysqli_num_rows($eq);
if($rc!=0)
{
	echo"<table border='2' cellspacing='5' cellpadding='10' align='center'>";
	echo"<caption><center><h2>Room details</h2></center></caption>";
	echo"<tr><th>Room number</th>";
	echo"<th>Room type</th>";
	echo"<th>capacity</th>";
	echo"<th>status</th></tr>";
	while($r=mysqli_fetch_array($eq))
	{
		echo"<tr>";
		echo"<td>".$r[0]."</td>";
		echo"<td>".$r[1]."</td>";
		echo"<td>".$r[2]."</td>";
		echo"<td>".$r[3]."</td>";
		echo"</tr>";
	}
	echo"</table>";
}
else
{
	echo"<script>alert('Room details are not avilable');</script>";
	echo"<script>window.location.href='roomadd1.php';</script>";
}
?>
		
	
		