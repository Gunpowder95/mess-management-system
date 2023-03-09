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
	function goStudent()
	{
		window.location="mess_cdr_student.php"
	}
	function goCourse()
	{
		window.location="mess_cdr_course.php"
	}
	function goMenu()
	{
		window.location="mess_cdr_menu.php"
	}
    function goQuery()
    {
        window.location="mess_cdr_query.php"
    }
    function goSummary()
    {
        window.location="mess_cdr_summary.php"
    }
    function goChangePwd()
    {
        window.location="changepwd_mess_cdr.php"
    }
	function goLogOut()
	{
		window.location="index.php"
	}
</script>

<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-dark-grey">
    <div class="w3-display-custom-topmiddle">
        <table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
    			<td class="w3-center" ><h1 class="w3-xxlarge">MESS CDR HOME</h1></td>
    		</tr>
    		<tr align="center">
    			<td>
    				<input class="w3-button w3-xlarge" onclick=goStudent() type="button" name="StudentButton" value="STUDENT OFFICER" style="opacity: 0.85;width: 100%">
				</td>
    		</tr>
    		<tr align="center">
    			<td>
    				<input class="w3-button w3-xlarge" onclick=goCourse() type="button" name="CourseButton" value="COURSE" style="opacity: 0.85;float: left;width: 100%">
    			</td>
    		</tr>
            <tr align="center">
                <td>
                    <input class="w3-button w3-xlarge" onclick=goSummary() type="button" name="SummaryButton" value="SUMMARY" style="opacity: 0.85;float: left;width: 100%">
                </td>           
            </tr> 
            <tr align="center">
                <td>
                    <input class="w3-button w3-xlarge" onclick=goQuery() type="button" name="QueryButton" value="QUERY" style="opacity: 0.85;float: left;width: 100%">
                </td>           
            </tr> 
            <tr align="center">
                <td>
                    <input class="w3-button w3-xlarge" onclick=goChangePwd() type="button" name="ChangePwdButton" value="CHANGE PASSWORD" style="opacity: 0.85;width: 100%">
                </td>
            </tr>
    		<tr align="center">
    			<td>
    				<input class="w3-button w3-xlarge w3-text-red" onclick=goLogOut() type="button" name="LogOutButton" value="LOG OUT" style="opacity: 0.85;float: left;width: 100%">
    			</td>			
    		</tr> 				
    	</table>
    </div>
</div>
</body>
</html>
