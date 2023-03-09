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
	if(isset($_POST['StudentOffrSearchSubmit']))
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
				$RecordSet1=mysql_fetch_array($result1);
?>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    <div class="w3-display-custom-topmiddle">
        <table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
	    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">STUDENT OFFR SEARCH RESULT</h1></td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>MessID</center></td>
	    			<td>
<?php
						echo "<center>".$MessID."</center>";	
?>
	    			</td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>Rank</center></td>
	    			<td>
<?php
						$dummyRank=$RecordSet1['Rank'];
						echo "<center>".$dummyRank."</center>";	
?>
	    			</td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>Name</center></td>
	    			<td>
<?php
						$dummyName=$RecordSet1['Name'];
						echo "<center>".$dummyName."</center>";	
?>
	    			</td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>Course</center></td>
	    			<td>
<?php
						echo "<center>".$cid."</center>";	
?>
	    			</td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>Dining</center></td>
	    			<td>
<?php
						$dummyDining=$RecordSet1['Dining'];
						echo "<center>".$dummyDining."</center>";	
?>
	    			</td>
	    		</tr>
	    		<tr class="w3-large">
	    			<td><center>Meal Preference</center></td>
	    			<td>
<?php
						$dummyMealPref=$RecordSet1['MealPref'];
						echo "<center>".$dummyMealPref."</center>";	
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
