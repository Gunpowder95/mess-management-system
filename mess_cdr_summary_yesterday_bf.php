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
	function goYesterdaySummary()
    {
        window.location="mess_cdr_summary_yesterday.php"
    }
    function goSummaryHome()
    {
        window.location="mess_cdr_summary.php"
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
        <table border=10 class="w3-animate-bottom" border=0 align="center" style="max-width: 100%;">
    		<tr>
    			<td class="w3-center" colspan="2"><h1 class="w3-xxlarge">SUMMARY</h1></td>
    		</tr>
            <tr>
                <td class="w3-large w3-center" colspan="2">YESTERDAY BREAKFAST</td>
            </tr>
           <tr>
               <td class="w3-large w3-center">VEG</td>
               <td>
<?php
    $servername = "localhost"; // your DB server is localhost
    $username = "root";
    $password = "";
    $db_name = "buddybase";

    // Create connection
    $con = mysql_connect($servername, $username, $password);
    // Check connection
    if (!$con) 
            {
                die("Could not connect".mysql_error());
            }
    else
        //echo "Connection Successfull";
    $todaydate=date("Y-m-d");
    $yesterdaydate=--$todaydate;
    $totalbf=0;
    $query1="select * from buddybase.course where '$yesterdaydate' between arrdate and depdate";
    $RecordSet1=mysql_query($query1);
    //echo $query1;
    $count1=mysql_num_rows($RecordSet1);
    //echo $count1;
    if ($count1>0)
    {

        $sno1=1;
        while($row1 = mysql_fetch_assoc($RecordSet1))
        {
            //echo "<tr><td>".$sno."</td><td>".$row["name"]."</td><td>".$row["date"]."</td></tr>";
            $cn=$row1["CourseName"];
            $cser=$row1["CourseSerNo"];
            $dummycn=$cn;
            $dummycser=$cser;
            if((int)$dummycser>9 && (int)$dummycser<100)
                            $dummycser="0".$dummycser;      //Stuffs with 0 to make length uniform
                    else if((int)$dummycser<10)
                            $dummycser="00".$dummycser; 
            $cid=$dummycn.$dummycser;
            $db=$cid;
            $query2="use $db";
            $RecordSet2=mysql_query($query2);
            //echo $query2;

            $query3="select * from roll where MealPref='VEG'";
            $RecordSet3=mysql_query($query3);
            //echo $query3;
            $count3=mysql_num_rows($RecordSet3);
            //echo $count3;
            if ($count3>0)
            {

                $sno3=1;
                while($row2 = mysql_fetch_assoc($RecordSet3))
                {
                    $MessID=$row2["MessID"];
                    $query4="select sum(breakfast) as bfsum from $MessID where Date='$yesterdaydate'";
                    $RecordSet4=mysql_query($query4);
                    //echo $query4;
                    $ArrayRecordSet4=mysql_fetch_array($RecordSet4);
                    $bf=$ArrayRecordSet4['bfsum'];
                    $totalbf+=$bf;
                    $sno3++;
                }

            }
            




            $sno1++;
        }
    }
    else
    {
        echo "<br>Empty Database";
    }
   
    

    echo "<center>".$totalbf."</center>";

?> 
               </td>
           </tr>
           <tr>
               <td class="w3-large w3-center">NON VEG</td>
               <td>
<?php
    $servername = "localhost"; // your DB server is localhost
    $username = "root";
    $password = "";
    $db_name = "buddybase";

    // Create connection
    $con = mysql_connect($servername, $username, $password);
    // Check connection
    if (!$con) 
            {
                die("Could not connect".mysql_error());
            }
    else
        //echo "Connection Successfull";
    $todaydate=date("Y-m-d");
    $yesterdaydate=--$todaydate;
    //echo $tomorrowdate;
    $totalbf=0;
    $query1="select * from buddybase.course where '$yesterdaydate' between arrdate and depdate";
    $RecordSet1=mysql_query($query1);
    //echo $query1;
    $count1=mysql_num_rows($RecordSet1);
    //echo $count1;
    if ($count1>0)
    {

        $sno1=1;
        while($row1 = mysql_fetch_assoc($RecordSet1))
        {
            //echo "<tr><td>".$sno."</td><td>".$row["name"]."</td><td>".$row["date"]."</td></tr>";
            $cn=$row1["CourseName"];
            $cser=$row1["CourseSerNo"];
            $dummycn=$cn;
            $dummycser=$cser;
            if((int)$dummycser>9 && (int)$dummycser<100)
                            $dummycser="0".$dummycser;      //Stuffs with 0 to make length uniform
                    else if((int)$dummycser<10)
                            $dummycser="00".$dummycser; 
            $cid=$dummycn.$dummycser;
            $db=$cid;
            $query2="use $db";
            $RecordSet2=mysql_query($query2);
            //echo $query2;

            $query3="select * from roll where MealPref='NONVEG'";
            $RecordSet3=mysql_query($query3);
            //echo $query3;
            $count3=mysql_num_rows($RecordSet3);
            //echo $count3;
            if ($count3>0)
            {

                $sno3=1;
                while($row2 = mysql_fetch_assoc($RecordSet3))
                {
                    $MessID=$row2["MessID"];
                    $query4="select sum(breakfast) as bfsum from $MessID where Date='$yesterdaydate'";
                    $RecordSet4=mysql_query($query4);
                    //echo $query4;
                    $ArrayRecordSet4=mysql_fetch_array($RecordSet4);
                    $bf=$ArrayRecordSet4['bfsum'];
                    $totalbf+=$bf;
                    $sno3++;
                }

            }
            




            $sno1++;
        }
    }
    else
    {
        echo "<br>Empty Database";
    }
   
    

    echo "<center>".$totalbf."</center>";

?> 

               </td>
           </tr>
            <tr align="center">
                <td colspan="2">
                    <input class="w3-button w3-large w3-text-red" onclick=goYesterdaySummary() type="button" name="SummaryYesterdayButton" value="NOT BREAKFAST ?" style="opacity: 0.85;width: 100%;">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input class="w3-button w3-large w3-text-red" onclick=goSummaryHome() type="button" name="SummaryHomeButton" value="NOT YESTERDAY ?" style="opacity: 0.85;width: 100%">
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
</div>
</body>
</html>
