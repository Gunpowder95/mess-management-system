<!DOCTYPE html>
<html>
<title>DELETE FINISHED</title>
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
	function goDelHome()
	{
		window.location="mess_cdr_course_del.php"
	}
	function goLogOut()
	{
		window.location="index.php"
	}
</script>
<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    <div class="w3-display-custom-topmiddle">
<?php
	if (isset($_POST['CourseDeleteSubmit']))
	{
		$n=$_POST{'CourseName'};
		$s=$_POST{'CourseSerNo'};
		$con=mysql_connect("localhost","root","");
		$dummycn=$n;
		$dummycser=$s;
		if((int)$dummycser>9 && (int)$dummycser<100)
           				$dummycser="0".$dummycser;		//Stuffs with 0 to make length uniform
           		else if((int)$dummycser<10)
           				$dummycser="00".$dummycser;	
		$cid=$dummycn.$dummycser;
		if (!$con) 
		{
			die("Could not connect".mysql_error());
		}
		mysql_select_db("buddybase",$con);
		$searchquery="select * from course where CourseName='$n' and CourseSerNo='$s'";
		$result=mysql_query($searchquery);
		if($result>0)
		{
			$query="delete from course where CourseName='$n' and CourseSerNo='$s'";
			$result=mysql_query($query);
?>
			<form action="mess_cdr_course_search_final.php" method="POST">
        		<table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    				<tr>
    					<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">DELETE COURSE</h1></td>
    				</tr>
<?php
							$db=$cid;
        					mysql_select_db($db,$con);
        					//echo $db;
        					$deldbquery="drop database $db";
        					//echo $deldbquery;
        					$result1=mysql_query("$deldbquery");
?>
						</td>
					</tr>
					<tr align="center">
                		<td colspan="2">
                    	<input class="w3-button w3-xlarge w3-text-red" onclick=goDelHome() type="button" name="DelHomeButton" value="DELETE HOME" style="opacity: 0.85;width: 100%">
               			 </td>
            		</tr>
            		<tr align="center">
               			<td colspan="2">
                    	<input class="w3-button w3-xlarge w3-text-red" onclick=goHome() type="button" name="HomeButton" value="MESS CDR HOME" style="opacity: 0.85;width: 100%">
                		</td>
            		</tr>
            		<tr>
                		<td colspan=2 align="center" style="color: red;">Course Deleted Successfully</td>
            		</tr>
    				<tr align="center">
    					<td colspan="2">
    					<input class="w3-button w3-xlarge w3-text-red" onclick=goLogOut() type="button" name="LogOutButton" value="LOG OUT" style="opacity: 0.85;float: left;width: 100%">
    					</td>			
    				</tr> 				
    			</table>
    		</form>		

 <?php
		}
		else
		{
			(header("location:mess_cdr_course_del_error.php"));
		}
		mysql_close($con);
	}
?>

    </div>
</body>
</html>
