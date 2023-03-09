<?php
	if (isset($_POST['ChangeMessCdrPwdSubmit']))
	{
		$con=mysql_connect("localhost","root","");
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		mysql_select_db("buddybase",$con);
		$op=$_POST{'OldPwd'};
		$np=$_POST{'NewPwd'};
		
		$query1="select * from dummy_user where user_name='mess_cdr' and user_h_pwd='$op'";
		echo $query1;
		$result1=mysql_query($query1);
		$count1=mysql_num_rows($result1);
		if ($count1==1)			
		{
			$query2="delete from dummy_user where user_name='mess_cdr' and user_h_pwd='$op'";
			//echo $query2;
			$result2=mysql_query($query2);

			$query3="insert into dummy_user(user_name,user_h_pwd) values('mess_cdr','$np')";
			//echo $query3;
			$result3=mysql_query($query3);
			(header("location:changepwd_mess_cdr_final.php"));

		}
		else
		{	
			(header("location:changepwd_mess_cdr_error.php"));	
		}
		//close connection
		
	}
?>