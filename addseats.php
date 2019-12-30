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
    err("Please login before u Continue");      
    header("Refresh:2; url=Login.php"); 
}

else
{
    if(!isset($sb2))
    {
        err("Please select a movie before u Continue");
        header("Refresh:2; url=reservation.php");
    }
    else if((!isset($movie))||(!isset($auditorium))||(!isset($screenid))||(!isset($seats))||(!isset($Balance))||(!isset($cost)))
    {
        err("Please login before u Continue");
        header("Refresh:2; url=reservation.php");
        
    }
    else if(isset($_SESSION["add"]))
    {
        err("already done");
        header('Refresh:2; url=index.php');
    }
    else //if(!isset($sb3))
    {
$us=$_SESSION['username'];
$quary=$db->prepare("SELECT * FROM users WHERE username='$us'");
$quary->execute();
$row=$quary->fetch();
$uid=$row["uid"];
        echo"working";
        $query1=$db->prepare("INSERT INTO reservation (id, screenid, userid, seatid, active) VALUES (NULL, ?, ?, ?, true)");
        $query2=$db->prepare("UPDATE balance SET Credit=? WHERE BID=?");
        $quary=$db->prepare("SELECT * FROM seat,auditorium WHERE auditorium.aid=seat.auditoriumID  and seat.row=? and seat.number=? and auditoriumID = ?");
        $ss=explode(':',$seats);
        $v=explode('_',$Balance);
        $credit=$v[1]-$cost;
        $n=sizeof($ss);
        for($i=0;$i<$n;$i++)
                        {
                            $seat=explode('_',$ss[$i]);
                            $quary->execute(array($seat[0],$seat[1],$auditorium));
                            $row=$quary->fetch();
                            $count= $quary->rowCount();
                            $sid[$i]=$row["sid"];
                            $query1->bindParam(1,$screenid);
                            $query1->bindParam(2,$uid);
                            $query1->bindParam(3,$sid[$i]);
                            $query1->execute();
                        }
        $query2->bindParam(1,$credit);
        $query2->bindParam(2,$v[0]);
        $query2->execute();
        unset($screenid);
        $finished=true;
        $_SESSION["add"]=1;
        header('Refresh:2; url=index.php');
        
        
        
    }
 

}
        
                                             

    ?>