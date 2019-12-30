<!DOCTYPE html>
<?php
session_start();
require("connection.php");
extract($_POST);



$quary=$db->prepare("SELECT * FROM users WHERE username=?");
$quary->execute(array($_SESSION['username']));
$row=$quary->fetch();
$userid=$row['uid'];
if(isset($_SESSION['username'])){
                                if(isset($submit)){
                                                    if ($_FILES["file"]["size"] < 200000) { 
                                                    if ($_FILES["file"]["error"] > 0) { 
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; } 
                else { 
                echo "Upload: " . $_FILES["file"]["name"] . "<br />"; 
                echo "Type: " . $_FILES["file"]["type"] . "<br />"; 
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />"; 
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"; 
                if (file_exists("upload/" . $_FILES["file"]["name"])) {
                    
                    echo " moved to temp loc ****";
                   move_uploaded_file($_FILES["file"]["tmp_name"], "temp/" . $_FILES["file"]["name"]);  

                echo "renamed ****" ;   
                    rename("temp/" . $_FILES["file"]["name"],"temp/".$userid.".jpg");
                    
                echo "moved to a perminant loc *****";    
                rename("temp/".$userid.".jpg","upload/".$userid.".jpg");
                
        $quary2=$db->prepare("UPDATE users SET profilepic=? WHERE uid='$userid'");
        $pic="upload/".$userid."jpg";   
        $quary2->execute(array($pic));
                    
                
                } 
                else { 
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]); 
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                rename("upload/" . $_FILES["file"]["name"],"upload/".$userid.".jpg");
     $quary2=$db->prepare("UPDATE users SET profilepic=? WHERE uid='$userid'");
                 $pic="upload/".$userid.".jpg";   
                $quary2->execute(array($pic));
                    
                  header("Refresh:0; url=My account.php");
                
                
                } 
} 
} 
    else { echo "Invalid file"; }
    
}    
?>
<html>
<head><title>profile pic uploader</title></head>
    <body>
    <form action="changeprofilepic.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="submit">    
    </form>
    </body>
</html>





<?php 
                                }

else{ echo "<h1> YOU are not atthrized to view this file<h2>";}
    
?>