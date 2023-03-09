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
	function goResetMessCdrPwd()
    {
        window.location="resetmesscdrpwd.php"
    }
    function goChangePwd()
    {
        window.location="changepwd_admin.php"
    }
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
    	<form action="changepwd_mess_cdr2.php" method="POST">
        <table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge w3-animate-top"><b>CHANGE PASSWORD</b></h1></td>
    		</tr>
            <tr>
                <td>OLD PASSWORD</td>
                <td>
                    <input type="PASSWORD" name="OldPwd" style="width: 100%;">
                </td>
            </tr>
    		<tr>
                <td>NEW PASSWORD</td>
                <td>
                    <input type="PASSWORD" name="NewPwd" style="width: 100%;">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input class="w3-button w3-xlarge w3-text-red" type="submit" name="ChangeMessCdrPwdSubmit" value="CHANGE" style="width: 100%">
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
</div>
</body>
</html>
