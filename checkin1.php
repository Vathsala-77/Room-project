<?php
require "display1.php";
?>
<html>
<head>
<title>Hotel</title>
</head>
<body>
<center><h2>Checkin and checkout</h2></center>
<form action="" method="POST" align="center">
<label>Room number:</label>
&nbsp<input type="text" name="rid" required><br><br>
<input type="submit" name="cibtn" value="checkin">
&nbsp<input type="submit" name="cobtn" value="checkout">
</form>
<center><a href='roomadd1.php'>Home page</a></center>
</body>
</html>

<?php
function exist($rid)
{
	$cn=@mysqli_connect('localhost','root','','room');
	$sel="select * from room where rno=".$rid."";
	$eq=mysqli_query($cn,$sel);
	$rc=mysqli_num_rows($eq);
	if($rc!=0)
	{
			return 1;
	}
	else
	{
			return 0;
	}
}
if(isset($_POST['cibtn']))
{
	$rid=trim($_POST['rid']);
	if(empty($rid))
	{
		echo"<script>alert('Enter room number to checkin');</script>";
		echo"<script>window.location.href='checkin1.php';</script>";
	}
	else
	{
		if(exist($rid))
		{
			$cn=@mysqli_connect('localhost','root','','room');
			$sel="select * from room where rno=".$rid." and status='avilable'";
			$eq=mysqli_query($cn,$sel);
			$rc=mysqli_num_rows($eq);
			if($rc!=0)
			{
				$up="update room set status='booked' where rno=".$rid."";
				$eq=mysqli_query($cn,$up);
				if($eq)
				{
					echo"<script>alert('Thanks for booking');</script>";
					echo"<script>window.location.href='checkin1.php';</script>";
				}
			}
			else
			{
				echo"<script>alert('sorry room alraedy booked');</script>";
				echo"<script>window.location.href='checkin1.php';</script>";
			}
		}
		else
		{
			echo"<script>alert('Room number does not exist');</script>";
			echo"<script>window.location.href='checkin1.php';</script>";
		}
	}
}
elseif(isset($_POST['cobtn']))
{
	$rid=trim($_POST['rid']);
	if(empty($rid))
	{
		echo"<script>alert('Enter room number to checkout');</script>";
		echo"<script>window.location.href='checkin1.php';</script>";
	}
	else
	{
		if(exist($rid))
		{
			$cn=@mysqli_connect('localhost','root','','room');
			$sel="select * from room where rno=".$rid." and status='booked'";
			$eq=mysqli_query($cn,$sel);
			$rc=mysqli_num_rows($eq);
			if($rc!=0)
			{
				$up="update room set status='avilable' where rno=".$rid."";
				$eq=mysqli_query($cn,$up);
				if($eq)
				{
					echo"<script>alert('Room now avilable');</script>";
					echo"<script>window.location.href='checkin1.php';</script>";
				}
			}
			else
			{
				echo"<script>alert('sorry room alraedy booked');</script>";
				echo"<script>window.location.href='checkin1.php';</script>";
			}
		}
		else
		{
			echo"<script>alert('Room number does not exist');</script>";
			echo"<script>window.location.href='checkin1.php';</script>";
		}
	}
}
?>
	
		