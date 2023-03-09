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
    <h1 class="w3-jumbo w3-animate-top"><b>MESS MEAL MGT</b></h1>
    <form action="" method="POST">
        <table class="w3-animate-bottom" border=10 align="center">
            <tr>
                <td colspan=2 class="w3-large w3-center"><b>LOGIN</b></td>
            </tr>
            <tr>
                <td>USER</td>
                <td style="opacity: 0.8">
                    <select name="UserId" style="width: 100%;">
                        <option value=null><--SELECT--></option>
                        <option value="mess_cdr">MESS CDR</option>
                        <option value="admin">ADMIN</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td style="opacity: 0.4"><input type="Password" name="UserPwd"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" name="PwdSubmit" value="SUBMIT AGAIN" style="opacity: 0.85;"></td>
            </tr>
            <tr>
                <td colspan=2 align="center" style="color: red;">Incorrect User or Password</td>
            </tr>
        </table>
    </form>
  </div>
</div>



<?php
    if (isset($_POST['PwdSubmit']))
    {
        $u=$_POST{'UserId'};
        $p=$_POST{'UserPwd'};
        $con=mysql_connect("localhost","root","");
        if (!$con) 
        {
            die("Could not connect".mysql_error());
        }
        mysql_select_db("buddybase",$con);
        $query="select * from dummy_user where user_name='$u' and user_h_pwd='$p'";
        $result=mysql_query($query);
        $count=mysql_num_rows($result);
        if ($count==1)
        {
            if ($u=="admin") {
                (header("location:admin_home.php"));
            }
            else{
                (header("location:mess_cdr_home.php"));
            }
        }
        else
            {
                (header("location:index_error.php"));
            }
        mysql_close($con);
    }
?>

</body>
</html>
