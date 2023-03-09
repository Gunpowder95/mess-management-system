<!DOCTYPE html>
<html>
<head>
	<title>MESS MEAL MGT SYS</title>
</head>
<body>
<?php
	if(isset($_POST['StudentOffrUpdateSubmit']))
		{
			$con=mysql_connect("localhost","root","");
			if (!$con) 
			{
				die("Could not connect".mysql_error());
			}
			else
				//echo "Connection Successfull";
			$MessID=$_POST['MessID'];
			$UpdateDate=$_POST['UpdateDate'];
			$length=strlen($MessID);
			$cid=substr($MessID,0,$length-2);
			//echo $cid;
			
			$r=$_POST['Rank'];
			$n=$_POST['Name'];
			$d=$_POST['Dining'];
			$mf=$_POST['Meal_Pref'];

			if ($d=='YES')
				$s=1;
			else
				$s=0;
			mysql_select_db($cid,$con);
			$query1="delete from roll where MessID='$MessID'";
			$exec=mysql_query($query1);
			echo $query1;
			$query2="insert into roll(MessID,Rank,Name,Faculty,Dining,Meal_Pref,Status) values('$MessID','$r','$n','$d','$mf','$s')";
			$exec=mysql_query($query2);
			echo $query2;

			$query3="update $MessID set Breakfast='$s',Lunch='$s',Dinner='$s'where Date>='$UpdateDate'";
			$exec=mysql_query($query3);
			echo $query3;
			(header("location:mess_cdr_student_update_final.php"));
			mysql_close($con);
	}
?>

</body>
</html>