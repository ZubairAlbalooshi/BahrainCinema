<?php 
$dbh=mysql_connect("localhost", "root", "root") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("bahrainc");
$sql="SELECT * FROM auditorium,screening WHERE auditorium.aid=screening.auditoriumID and screening.movieID ='".$_GET["m"]."' and auditorium.aid='".$_GET["a"]."'";
$result = mysql_query($sql);
echo '<option value=0>please select a timing</option>';
    while ($row = mysql_fetch_array($result))
        
{
     echo '<option value="'.$row['id'],'">'.$row['start'].'</option>';

} 


?>