<?php 
extract($_POST);
session_start();
require("connection.php");
if(!isset($_SESSION["type"]) && !isset($sub)){
    die("your not suppose to be here");
}



if($sub=="true"){
    $q=$db->prepare("SELECT * FROM balance where UserID=?");
    $q->execute(array($uid));
    $row1=$q->fetch();
    
    if($row1['Credit']==0){
        echo "accepted"; 
        $q1=$db->prepare("update balance set Credit=? where UserID=?");
        $q1->execute(array($amount,$uid));
        
        $q2=$db->prepare("DELETE FROM topupreq WHERE rid=?");
        $q2->execute(array($rid));
        $db=null;
        header("Refresh:0.5; url=userstopup.php");
                
                }
    else{echo "accepted"; $am=$row1['Credit']+$amount;
        $q1=$db->prepare("update balance set Credit=? where UserID=?");
        $q1->execute(array($am,$uid));
        
        $q2=$db->prepare("DELETE FROM topupreq WHERE rid=?");
        $q2->execute(array($rid));
        $db=null;
        header("Refresh:0.5; url=userstopup.php");
     }}

else {
    
    echo"declined";
    $q2=$db->prepare("DELETE FROM topupreq WHERE rid=?");
    $q2->execute(array($rid));
    $db=null;
    header("Refresh:0.5; url=userstopup.php");
    
}

?>