<?php
	if (isset($_POST['StudentOffrDetailSubmit']))
	{
		$con=mysql_connect("localhost","root","");
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		mysql_select_db("buddybase",$con);
		$f=$_POST{'Faculty'};
		$cn=$_POST{'CourseName'};
		$cser=$_POST{'CourseSerNo'};
		$r=strtoupper($_POST['Rank']);
		$n=strtoupper($_POST['Name']);
		$d=strtoupper($_POST['Dining']);
		$mf=strtoupper($_POST['Meal_Pref']);
		$d1=$_POST{'ArrDate'};
		$query1="select * from course where CourseName='$cn' and CourseSerNo='$cser'";
		//echo $query1;
		$result1=mysql_query($query1);
		$count1=mysql_num_rows($result1);
		if ($count1==1)			
		{
			$RecordSet1=mysql_fetch_array($result1);
			//echo "Retrieve Successfull";

			$dummycstr=$RecordSet1['CourseStr'];
			$dummycstr++;
			$d2=$RecordSet1['DepDate'];
			
			$query2="update course set CourseStr='$dummycstr' where CourseName='$cn' and CourseSerNo='$cser';";
			$result2=mysql_query($query2);

			$cid=$cn.$cser;
			mysql_select_db($cid,$con);
			if ($d=='YES')
				$s=1;
			else
				$s=0;
			$dummycser=$cser;
			$dummycn=$cn;
			if((int)$dummycser>9 && (int)$dummycser<100)
           				$dummycser="0".$dummycser;		//Stuffs with 0 to make length uniform
           		else if((int)$dummycser<10)
           				$dummycser="00".$dummycser;		//Stuffs with 0 to make length uniform	
			if($dummycstr<10)					
           			$dummycstr="0".$dummycstr;			//Stuffs with 0 to make length uniform
			$MessID=$dummycn.$dummycser.$dummycstr;
			$MessID=strtoupper($MessID);
			$query3="insert into roll(MessID,Rank,Name,Dining,MealPref) values('$MessID','$r','$n','$d','$mf')";
			$exec=mysql_query($query3);
			//echo $query3;
			$query4="create table $MessID(Date date primary key,Breakfast int(1) default '$s',Lunch int(1) default '$s',Dinner int(1) default '$s')";
			$write=mysql_query($query4);
			//echo $query4;
			$firstday = new DateTime($d1);
			$lastday   = new DateTime($d2);

			for($j = $firstday; $j <= $lastday; $j->modify('+1 day'))
			{
    				
					$k=($j->format("Y-m-d"));
					$query5="insert into $MessID(Date) values('$k')";
					$write=mysql_query($query5);
					//echo $query5;
			}	

			(header("location:mess_cdr_student_add_final.php"));

			
		}
		else
		{	
			(header("location:mess_cdr_student_add_error.php"));	
		}
		//close connection
		
	}
?>