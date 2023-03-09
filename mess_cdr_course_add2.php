<!DOCTYPE html>
<html>
<title>MESS MEAL MGT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
    background-image: url('grey.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    
    <div class="w3-display-custom-topmiddle">
    <?php
    	
	session_start();
	if (isset($_POST['CourseDetailFinalSubmit']))
	{
		$f=$_POST{'Faculty'};
		//$cn=$_POST{'CourseName'};
		//$cser=$_POST{'CourseSerNo'};
		//$cstr=$_POST{'CourseStr'};
		
		
		$con=mysql_connect("localhost","root","");
		$_SESSION['cstr']=$_POST{'CourseStr'};
		$_SESSION['cser']=$_POST{'CourseSerNo'};
		$_SESSION['cn']=$_POST{'CourseName'};
		$_SESSION['d1']=$_POST{'ArrDate'};
		$_SESSION['d2']=$_POST{'DepDate'};
		$dummycn=$_SESSION['cn'];
		$dummycser=$_SESSION['cser'];
		$dummycstr=$_SESSION['cstr'];
		$dummyd1=$_SESSION['d1'];
		$dummyd2=$_SESSION['d2'];

		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		mysql_select_db("buddybase",$con);
		
		$query1="select * from course where CourseName='$dummycn' and CourseSerNo='$dummycser'";
		$result1=mysql_query($query1);
		$count1=mysql_num_rows($result1);
		if ($count1>0)			//Already Existing.
		{
			(header("location:mess_cdr_course_add_error.php"));
				
		}
		else
		{		
			$query2="insert into course(CourseName,CourseSerNo,CourseStr,ArrDate,DepDate) values('$dummycn','$dummycser','$dummycstr','$dummyd1','$dummyd2')";
			$write=mysql_query($query2);
	?>

			<form action="mess_cdr_course_add2.php" method="POST">
        	<table border=10 class="w3-animate-bottom" border=0 align="center">
        		<tr>
    				<td class="w3-center" colspan="6"><h1 class="w3-large">NOMINAL ROLL</h1></td>
    			</tr>

	<?php

			$query3 = "select * from course where CourseName='$dummycn' and CourseSerNo='$dummycser'";
			$RecordSet = mysql_query($query3);
			$count2=mysql_num_rows($RecordSet);
			if ($count2>0) 			// output data of each row
			{		
    ?>
    				<tr>
    					<td class="w3-medium">S NO</td>
    					<td class="w3-medium">MESS ID</td>
    					<td class="w3-medium">RANK</td>
    					<td class="w3-medium">NAME</td>
    					<td class="w3-medium">DINING MEMBER</td>
    					<td class="w3-medium">MEAL PREFERENCE</td>
    				</tr>



    <?php

    			$sno=1;
    			if((int)$dummycser>9 && (int)$dummycser<100)
           				$dummycser="0".$dummycser;		//Stuffs with 0 to make length uniform
           		else if((int)$dummycser<10)
           				$dummycser="00".$dummycser;		//Stuffs with 0 to make length uniform	
           				
    				
    			while($sno<=$dummycstr) 
    			{
        			
           			echo "<tr><td>".$sno."</td>";
           			if($sno<10)					
           				$csno="0".$sno;			//Stuffs with 0 to make length uniform
           			else
           				$csno=$sno;
           			$MessID[$csno]=$dummycn.$dummycser.$csno;	//Calculates MESS ID
           			$tbname="MessID".(int)$csno;
           			echo "<td><input type=text name='$tbname' value='$MessID[$csno]'>";
           			echo "</td>";	//Prints MESS ID
           			$csno=(int)$csno;
    ?>
    

           			<td class="w3-medium">
    <?php
           				$tbname="Rank".$csno;
           				echo "<select name='$tbname' style='width: 100%;'>";
    ?>
							<option value="LT">LT</option>
							<option value="CAPT">CAPT</option>
							<option value="MAJ">MAJ</option>
							<option value="LT COL">LT COL</option>
							<option value="COL">COL</option>
							<option value="BRIG">BRIG</option>
						</select>
					</td>
					<td class="w3-medium">
	<?php
						$tbname="Name".$csno;
						echo "<input type='text' name='$tbname' required='required'>";
	?>
					</td>
					<td class="w3-medium">
	<?php
						$tbname="Dining".$csno;
						echo "<select name='$tbname' style='width: 100%;'>";
	?>
						
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
					</td>
					<td class="w3-medium">
	<?php
						$tbname="MealPref".$csno;
						echo "<select name='$tbname' style='width: 100%;'>";
	?>
							<option value="VEG">VEG</option>
							<option value="NONVEG">NONVEG</option>
						</select>
					</td>
				</tr>


	<?php

	

					$sno++;
    			}
    		}
    	}
    	mysql_close($con);
    	
	}
    	
    ?>
				<tr align="center">
					<td colspan="6">
						<input class="w3-button w3-large w3-text-red" type="submit" name="FinishSubmit" value="FINISH" style="width: 100%;">
					</td>
				</tr>
    	</table>
    </form>
    </div>
</div>


<?php
	if (isset($_POST['FinishSubmit']))
	{
		$con=mysql_connect("localhost","root","");
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		$dummycn=$_SESSION['cn'];
		$dummycser=$_SESSION['cser'];
		if((int)$dummycser>9 && (int)$dummycser<100)
           				$dummycser="0".$dummycser;		//Stuffs with 0 to make length uniform
           		else if((int)$dummycser<10)
           				$dummycser="00".$dummycser;	
		$cid=$dummycn.$dummycser;
		//$cid=$_SESSION['cn'].$_SESSION['cser'];
		//$length=strlen($MessID);
		//$cid=substr($MessID,0,$length-2);
		$datediff = (strtotime($_SESSION['d2']))-(strtotime($_SESSION['d1']));
		$duration=(round($datediff / (60 * 60 * 24)))+1;
		//echo $duration;
		//$dayone=$_SESSION['d1'];
		
		$_SESSION['cstr']=(int)$_SESSION['cstr'];
		$querydb="create database $cid";
		$write=mysql_query($querydb);
		//echo $querydb; 
		$querynominalroll="create table $cid.roll(MessID varchar(15) primary key,Rank varchar(10) not null,Name varchar(20) not null,Dining varchar(3) default 'YES',MealPref varchar(6) default 'VEG',Password varchar(32) default 'abc@123')";
		//echo $querynominalroll;
		$write=mysql_query($querynominalroll);
		for ($i=1; $i <=$_SESSION['cstr']; $i++) 
		{ 
			$MessID[$i]=strtoupper($_POST{'MessID'.$i});
			$Rank[$i]=strtoupper($_POST{'Rank'.$i});
			$Name[$i]=strtoupper($_POST{'Name'.$i});
			$Dining[$i]=strtoupper($_POST{'Dining'.$i});
			$MealPref[$i]=strtoupper($_POST{'MealPref'.$i});
			$queryrollvalues="insert into $cid.roll(MessID,Rank,Name,Dining,MealPref) values('$MessID[$i]','$Rank[$i]','$Name[$i]','$Dining[$i]','$MealPref[$i]')";
			$write=mysql_query($queryrollvalues);
			if ($Dining[$i]=="YES")
				$queryindlmealtables="create table $cid.$MessID[$i](Date date primary key,Breakfast int(1) default '1',Lunch int(1) default '1',Dinner int(1) default '1')";
			else
				$queryindlmealtables="create table $cid.$MessID[$i](Date date primary key,Breakfast int(1) default '0',Lunch int(1) default '0',Dinner int(1) default '0')";
			$write=mysql_query($queryindlmealtables);
			$firstday = new DateTime($_SESSION['d1']);
			$lastday   = new DateTime($_SESSION['d2']);

			for($j = $firstday; $j <= $lastday; $j->modify('+1 day'))
			{
    				
					$k=($j->format("Y-m-d"));
					$queryinsertmealrecords="insert into $cid.$MessID[$i](Date) values('$k')";
					$write=mysql_query($queryinsertmealrecords);
			}		
		}
		(header("location:mess_cdr_course_add_final.php"));
		mysql_close($con);
	}	
?>
</body>
</html>
