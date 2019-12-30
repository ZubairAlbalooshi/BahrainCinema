<?php 
$dbh=mysql_connect("localhost", "root", "root") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bahrainc");
$sql="SELECT * FROM reservation,screening,seat WHERE reservation.screenid=screening.id and reservation.seatid=seat.sid and seat.auditoriumID=screening.auditoriumID and seat.row='".$_GET["seatr"]."'and seat.number='".$_GET["seatc"]."' and  screening.id='".$_GET["screenid"]."'";
$result = mysql_query($sql);
if (mysql_num_rows($result)>0)
        
{
    
     echo "seatUnavailable";

} 

else 
    echo "";


?>