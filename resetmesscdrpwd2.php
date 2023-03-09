<?php
	if (isset($_POST['ResetMessCdrPwdSubmit']))
	{
		$con=mysql_connect("localhost","root","");
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		mysql_select_db("buddybase",$con);
		$ap=$_POST{'AdminPwd'};
		$np=$_POST{'NewMessCdrPwd'};
		
		$query1="select * from dummy_user where user_name='admin' and user_h_pwd='$ap'";
		echo $query1;
		$result1=mysql_query($query1);
		$count1=mysql_num_rows($result1);
		if ($count1==1)			
		{
			$query2="delete from dummy_user where user_name='mess_cdr'";
			//echo $query2;
			$result2=mysql_query($query2);

			$query3="insert into dummy_user(user_name,user_h_pwd) values('mess_cdr','$np')";
			//echo $query3;
			$result3=mysql_query($query3);
			(header("location:resetmesscdrpwd_final.php"));

		}
		else
		{	
			(header("location:resetmesscdrpwd_error.php"));	
		}
		//close connection
		
	}
?>