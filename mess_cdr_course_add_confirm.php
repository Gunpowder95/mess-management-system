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
	function goCourseAdd()
	{
		window.location="mess_cdr_course_add.php"
	}
</script>
<body>
<?php
	if (isset($_POST['CourseDetailSubmit']))
		{
			$f=$_POST{'Faculty'};
			$n=$_POST{'CourseName'};
			$ser=$_POST{'CourseSerNo'};
			$str=$_POST{'CourseStr'};
			$ArrDate=$_POST{'ArrDate'};
			$DepDate=$_POST{'DepDate'};
?>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    <div class="w3-display-custom-topmiddle">
        <form action="mess_cdr_course_add2.php" method="POST">
        	<table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">ADD COURSE</h1></td>
    		</tr>
    		<tr class="w3-large">
				<td>Faculty</td>
<?php
				echo "<td><input type='text' name='Faculty' value=".$f.">";
?>	
				</td>
			</tr>
			<tr class="w3-large">	
				<td>Course</td>
<?php
				echo "<td><input type='text' name='CourseName' value=".$n.">";
?>			
				</td>
			</tr>
			<tr class="w3-large">
				<td>Course Ser No</td>
<?php
				echo "<td><input type='text' name='CourseSerNo' value=".$ser.">";
?>	
				</td>
			</tr>
			<tr class="w3-large">
				<td>Course Strength</td>
<?php
				echo "<td><input type='text' name='CourseStr' value=".$str.">";
?>
				</td>
			</tr>
			<tr class="w3-large">
				<td>Arrival Date</td>
<?php
				//$ArrDate = date("d-m-Y", strtotime($ArrDate));
				echo "<td><input type='date' name='ArrDate' value=".$ArrDate.">";
?>	
				</td>
			</tr>	
			<tr class="w3-large">
				<td>Departure Date</td>
<?php
				//$DepDate = date("d-m-Y", strtotime($DepDate));
				echo "<td><input type='date' name='DepDate' value=".$DepDate.">";
?>
				</td>
			</tr>	
			<tr align="center">
				<td>
					<input class="w3-button w3-large w3-text-red" onclick=goCourseAdd() type="button" name="CourseAddButton" value="ERROR ?? ENTER AGAIN" style="opacity: 0.85;width: 100%">
				</td>
				<td>
					<input class="w3-button w3-large w3-text-red" type="submit" name="CourseDetailFinalSubmit" value="CONFIRM" style="width: 100%">
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
    </form>
    </div>
<?php
	}
	else
	{
		(header("location:mess_cdr_course_add_error.php"));
	}

?>
</body>
</html>
