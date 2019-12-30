<!DOCTYPE HTML>
<?php
session_start();
require('connection.php');
extract($_POST);
function err($s)
{
    echo'<html>
		<head>
			<title>Bahrain Cinema |Home </title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
			<link rel="stylesheet" href="assets/css/main.css" />
			<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
			<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
			<style>body{background-color:whitesmoke;}</style>
			</head>
            <body>
            <span>'.$s.'</span>
            </body>
            </html?
            ';
}
if(!isset($_SESSION['username']))
{
    err ("Please login before u start Reserving seats");      
    header("Refresh:2; url=Login.php"); 
    exit();
}

else if(!isset($btnCheckout))
    {
        err("please select seats 1 before u proceed");
        header("Refresh:2; url=reservation2.php");
        exit();
    }
else if((!isset($ss))||(!isset($scid))||(!isset($cost)))
    {
        err("please select seats 2 before u proceed");
        header("Refresh:2; url=reservation2.php");
        exit();
        
    }
else
    {
$us=$_SESSION['username'];
$quary=$db->prepare("SELECT * FROM users WHERE username='$us'");
$quary->execute();
$row=$quary->fetch();
                                             

    ?>
	<html>
		<head>
			<title>Bahrain Cinema |Home </title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
			<link rel="stylesheet" href="assets/css/main.css" />
            <link rel="stylesheet" href="assets/css/seat.css" />
			<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
			<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
			<style>body{background-color:whitesmoke;}</style>
             <script language="javascript">
                 
                 function checkbal(){
                     var p=document.getElementById("cost").getAttribute('value');
                     p=parseInt(p);
                     var b=document.getElementById("Balance").getAttribute('value');
                     bal=b.split("_");
                     b=parseInt(bal[1]);
                     if(b>=p)
                         {return true;}
                     else{
                         document.getElementById("msg").innerHTML="Please topup before u can continue";
                         return false;
                     }
                     
                     
                     
                     
                 }
            </script>
            
            
</head>
        <body>
            
            
            <form  method="POST" action="addseats.php" onclick="return checkbal()">
                    <table border="2px" align ="center">
                        <tr>
                        <td align="center" colspan="5"><b>Reservation</b></td>    
                        </tr>
                        <?php
                        $quary=$db->prepare("SELECT * FROM movies,screening WHERE mid=screening.movieID and screening.id=?");
                        $quary->execute(array($scid));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                        ?>
                                    <tr>
                                        <td rowspan="4" style="width:25%"><img src=<?php echo $row["src"]; ?> ></td>
                                        <td>Movie Name</td>
                                        <td><?php echo $row["h2"]; ?></td>
                                        <td><input type="hidden" id="movie" name="movie" value= <?php echo $row["mid"]; ?> ></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php
                            
                        $quary=$db->prepare("SELECT * FROM auditorium,screening WHERE aid=screening.auditoriumID and screening.id=?");
                        $quary->execute(array($scid));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                            ?>
                            <td>Movie venue</td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><input type="hidden" id="auditorium" name="auditorium" value= <?php echo $row["aid"]; ?> ></td>
                        </tr>
                        <?php } ?>
                        <tr>
                         <?php
                            
                        $quary=$db->prepare("SELECT * FROM screening WHERE id=?");
                        $quary->execute(array($scid));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                            ?>
                            <td>Movie venue</td>
                            <td><?php echo $row["start"]; ?></td>
                            <td><input type="hidden" id="screenid" name="screenid" value= <?php echo $row["id"]; ?> ></td>
                        <?php } ?>
                        </tr>
                        <tr>
                         <?php                            
                        $quary=$db->prepare("SELECT * FROM seat,auditorium WHERE auditorium.aid=seat.auditoriumID and seat.row=? and seat.number=?");
                        $seats=explode(':',$ss);
                        echo "<td>Seats</td>";
                        $n=sizeof($seats);
                        $sid=null;
                        echo "<td>";
                        for($i=0;$i<$n;$i++)
                        {
                            
                            $seat=explode('_',$seats[$i]);
                            $quary->execute(array($seat[0],$seat[1]));
                            $row=$quary->fetch();
                            $count= $quary->rowCount();
                            $sid[$i]=$row["sid"];
                            if($count)
                            {
                                echo $row["row"].$row["number"].","; 
                             } 

                            }
                            echo"</td>";
        
                            echo '<td> <input type="hidden" name="seats" id="seats" value="'.$ss.'"></td>';
                        ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total Cost: </td>
                            <td><?php echo "BHD: ".$cost; ?></td>
                            <td></td><input type="hidden" id ="cost" name="cost" value="<?php echo $cost ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Available Credit</td>
                            <?php
                        $quary=$db->prepare("SELECT * FROM users,balance WHERE balance.userid=users.uid and users.username=?");
                        $quary->execute(array($_SESSION["username"]));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count){
                            echo"<td>".$row["Credit"]."</td>";
                            echo '<td> <input type ="hidden" id="Balance" name="Balance" value='.$row["BID"]."_".$row["Credit"].'></td>';
                        }
        
                            ?>
                            
                        </tr>
                        <tr>
                            <td colspan=6 align="center" style="color:red" id="msg"></td>
                        </tr>
                        <tr>
                        <td colspan="6" align="center"><input type="submit" value="Purchase" name="sb2"></td>
                        </tr>
                </table>   
            </form>
        </body>
</html>
<?php 
}
?>