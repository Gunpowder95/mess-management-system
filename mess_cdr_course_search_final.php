<!DOCTYPE html>
<html>
<title>SEARCH COURSE</title>
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
<script>
	function goHome()
	{
		window.location="mess_cdr_home.php"
	}
	function goLogOut()
	{
		window.location="index.php"
	}
</script>
<body>
<?php
	if(isset($_POST['CourseSearchSubmit']))
	{
		$con=mysql_connect("localhost","root","");
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		else
			//echo "Connection Successfull";
		$cn=$_POST['CourseName'];
		$cser=$_POST['CourseSerNo'];
		$dummycn=$cn;
		$dummycser=$cser;
		if((int)$dummycser>9 && (int)$dummycser<100)
           				$dummycser="0".$dummycser;		//Stuffs with 0 to make length uniform
           		else if((int)$dummycser<10)
           				$dummycser="00".$dummycser;	
		$cid=$dummycn.$dummycser;

		$coursedb=$cid;
		mysql_select_db("buddybase",$con);
		$query1 = "select * from course where CourseName='$cn' and CourseSerNo='$cser'";
		//echo $query1;
		$result1=mysql_query($query1);
		$count1=mysql_num_rows($result1);
		if ($count1==1)			//1 Record Found
		{
			$RecordSet1=mysql_fetch_array($result1);
?>
		<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
		    <div class="w3-display-custom-topmiddle">
		        <table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
		    		<tr>
		    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">COURSE SEARCH RESULTS</h1></td>
		    		</tr>
		    		<tr class="w3-large">	
						<td>Course</td>
						<td>
<?php
						echo "<center>".$coursedb."</center>";						
?>
						</td>
				</tr>
				<tr class="w3-large">
					<td>Strength</td>
					<td>
<?php
						$dummyCourseStr=$RecordSet1['CourseStr'];
						echo "<center>".$dummyCourseStr."</center>";						
?>
					</td>
				</tr>
				<tr class="w3-large">
					<td>Arrival Date</td>
					<td>
<?php
						$dummyArrDate=$RecordSet1['ArrDate'];
						echo "<center>".$dummyArrDate."</center>";						
?>
					</td>
				</tr>
				<tr class="w3-large">
					<td>Departure Date</td>
					<td>
<?php
						$dummyDepDate=$RecordSet1['DepDate'];
						echo "<center>".$dummyDepDate."</center>";			
?>
					</td>
				</tr>
	    		<tr class="w3-large">
					<td>Dining Strength</td>
					<td>
<?php
					mysql_select_db($coursedb,$con);
					$query2="select count(*) as DiningInStr from roll where Dining='YES'";
					$result2=mysql_query($query2);
					//echo $query2;
					$RecordSet2=mysql_fetch_array($result2);
					$dummyDiningInStr=$RecordSet2['DiningInStr'];
					$query3="select count(*) as DiningOutStr from roll where Dining='NO'";
					$result3=mysql_query($query3);
					//echo $query3;
					$RecordSet3=mysql_fetch_array($result3);
					$dummyDiningOutStr=$RecordSet3['DiningOutStr'];
					echo "<center>In: ".$dummyDiningInStr." & Out : ".$dummyDiningOutStr."</center>";

?>
					</td>
				</tr>
				<tr class="w3-large">
					<td>Meal Preference</td>
					<td>
<?php
					$query4="select count(*) as TotalVegStr from roll where MealPref='VEG'";
					$result4=mysql_query($query4);
					//echo $query4;
					$RecordSet4=mysql_fetch_array($result4);
					$dummyTotalVegStr=$RecordSet4['TotalVegStr'];
					$query5="select count(*) as TotalNonVegStr from roll where MealPref='NONVEG'";
					$result5=mysql_query($query5);
					//echo $query5;
					$RecordSet5=mysql_fetch_array($result5);
					$dummyTotalNonVegStr=$RecordSet5['TotalNonVegStr'];
					echo "<center>Veg: ".$dummyTotalVegStr." & Non Veg : ".$dummyTotalNonVegStr."</center>";

?>
					</td>
				</tr>
	            <tr align="center">
	                <td colspan="2">
	                    <input class="w3-button w3-xlarge w3-text-red" onclick=goHome() type="button" name="HomeButton" value="MESS CDR HOME" style="opacity: 0.85;width: 100%">
	                </td>
	            </tr>
	    		<tr align="center">
	    			<td colspan="2">
	    				<input class="w3-button w3-xlarge w3-text-red" onclick=goLogOut() type="button" name="LogOutButton" value="LOG OUT" style="opacity: 0.85;float: left;width: 100%">
	    			</td>			
	    		</tr> 				
    	</table>
    
    </div>
<?php
		}			
		else 
		{
			//Redirect to Error Page
		}

		
	}

?>
</body>
</html>
