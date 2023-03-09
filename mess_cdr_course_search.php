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
<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    <div class="w3-display-custom-topmiddle">
        <form action="mess_cdr_course_search_final.php" method="POST">
        	<table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">SEARCH COURSE</h1></td>
    		</tr>
    		<tr class="w3-large">	
				<td>Course</td>
				<td>
					<select name="CourseName" style="width: 100%;">
						<option value=null>--SELECT--</option>
						<option value="ADVCG">ADV COMPUTING</option>
						<option value="ADVCS">ADV CYBER SECURITY</option>
						<option value="CC">CC</option>
						<option value="EW">EW</option>
						<option value="GEEO">GEEO</option>
						<option value="MLIT">MLIT</option>
						<option value="ITPM">ITPM</option>
						<option value="RSO">RSO</option>
						<option value="RC">RC</option>
						<option value="SODE">SODE</option>
						<option value="TES">TES</option>
						<option value="YO">YO</option>
					</select>
				</td>
			</tr>
			<tr class="w3-large">
				<td>Course Ser No</td>
				<td><input type="text" name="CourseSerNo" style="width: 100%;"></td>
			</tr>
			<tr align="center">
				<td colspan="2">
					<input class="w3-button w3-xlarge w3-text-red" type="submit" name="CourseSearchSubmit" value="SEARCH" style="width: 100%">
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
</body>
</html>
