<html>
<head>
<title>Hotel</title>
</head>
<body>
<center><h2>Hotel mangamemt</h2></center>
<form action="" method="POST">
<table border='2' cellpadding='5' width='25%' align="center">
<caption><h3>Add new room  details</h3></center>
<tr><td><label>Room number</label></td>
<td><input type="text" name="rid" ></td></tr>

<tr><td><label>Room type</label></td>
<td><select name="rtype">
<option value="Single semi">Single semi</option>
<option value="double">Double</option></td></tr>

<tr><td><label>capacity</label></td>
<td><input type="text" name="capacity" ></td></tr>

<tr><td colspan=2><center><input type="submit" name="btn" value="submit"></center></td></tr>
</table>
</form>
<center><a href='checkin1.php'>Click here to checkin and checkout</a></center>
</body>
</html>
<?php
if(isset($_POST['btn']))
{
	$rid=trim($_POST['rid']);
	$rtype=trim($_POST['rtype']);
	$capacity=trim($_POST['capacity']);
	$errors=array();
	if(empty($rid))
	{
		$errors[]="Room id required";
	}
	if(empty($rtype))
	{
		$errors[]="Room id required";
	}
	if(empty($capacity))
	{
		$errors[]="Room id required";
	}
	if(empty($errors))
	{
		$cn=@mysqli_connect('localhost','root','','room');
		$sel="select * from room where rno=".$rid."";
		$eq=mysqli_query($cn,$sel);
		$rc=mysqli_num_rows($eq);
		if($rc==0)
		{
			$in="insert into room(rno,rtype,capacity)values(".$rid.",'".$rtype."','".$capacity."')";
			$eq=mysqli_query($cn,$in);
			if($eq)
			{
				echo"<script>alert('Room detils added succsfully');</script>";
				echo"<script>window.location.href='roomadd1.php';</script>";
			}
		}
		else
		{
			echo"<script>alert('Room detils alraedy exit');</script>";
			echo"<script>window.location.href='roomadd1.php';</script>";
		}
	}
	else
	{
		$msg="";
		foreach($errors as $er)
		{
			$msg=$msg."\\n".$er;
		}
		echo"<script>alert('$msg');</script>";
		echo"<script>window.location.href='roomadd1.php';</script>";
	}
}
?>
		
		
		
		