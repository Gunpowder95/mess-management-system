<?php
	if(isset($_POST['StudentOffrDeleteSubmit']))
		{
			$con=mysql_connect("localhost","root","");
			if (!$con) 
			{
				die("Could not connect".mysql_error());
			}
			else
				//echo "Connection Successfull";
			$MessID=$_POST['MessID'];
			$length=strlen($MessID);
			$cid=substr($MessID,0,$length-2);
			//echo $cid;
			mysql_select_db($cid,$con);
			$query1 = "select * from roll where MessID='$MessID'";
			//echo $query1;
			$result1=mysql_query($query1);
			$count1=mysql_num_rows($result1);
			if ($count1==1)			//1 Record Found
			{
				$query2 = "delete from roll where MessID='$MessID'";
				//echo $query2;
				$result2=mysql_query($query2);

				$query3 = "drop table $MessID";
				//echo $query3;
				$result3=mysql_query($query3);
				header("location:mess_cdr_student_del_final.php");
			}			
			else 
			{
				header("location:mess_cdr_student_del_error.php");
			}
			mysql_close($con);
			
		}

?>
