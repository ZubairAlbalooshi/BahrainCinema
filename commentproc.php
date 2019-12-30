<?php 
require("connection.php");
session_start();
extract($_POST);

if(strlen($comment)<200){
$quary=$db->prepare("INSERT INTO mcomments VALUES (?,?,?,?,?)");
$quary->execute(array("NULL",$mid,$name,$email,$comment));
echo " comment added";

    header("Refresh:2; url=moviedetails.php"."?mid=$mid");
}

else{
     
    echo "you comments is too long";  
    
    }
?>