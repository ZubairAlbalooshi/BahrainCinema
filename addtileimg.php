<?php 
session_start();

require("connection.php");

extract($_POST);

if($_SESSION['type']=="ADMIN" && isset($_SESSION['num']) ){
    $num=$_SESSION['num'];
    
$q=$db->prepare("SELECT * FROM movies where num=?");
    $q->execute(array($num));
    $row=$q->fetch();
    $mid=$row['mid'];
    
        if(isset($submit)){
                 if ($_FILES["file"]["size"] < 200000) { 
                 if ($_FILES["file"]["error"] > 0) { 
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; } 
                else { 
                echo "Upload: " . $_FILES["file"]["name"] . "<br />"; 
                echo "Type: " . $_FILES["file"]["type"] . "<br />"; 
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />"; 
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"; 
                if (file_exists("images/" . $_FILES["file"]["name"])) { 
                
                echo " moved to temp loc ****";
                   move_uploaded_file($_FILES["file"]["tmp_name"], "temp/" . $_FILES["file"]["name"]);  

                echo "renamed ****" ;   
                    rename("temp/" . $_FILES["file"]["name"],"temp/".$mid.".jpg");
                    
                echo "moved to a perminant loc *****";    
                    rename("temp/".$mid.".jpg","images/".$mid.".jpg");
                
                    $quary2=$db->prepare("UPDATE movies SET src=? WHERE num='$num'");
                 $pic="images/".$mid.".jpg";   
                $quary2->execute(array($pic));
                    
                    echo"done tile img is set and loading.....";
                    unset($_POST);
                  header("Refresh:2.8; url=addbannerimg.php");
                } 
                else { 
                move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]); 
                echo "Stored in: " . "images/" . $_FILES["file"]["name"];
                rename("images/" . $_FILES["file"]["name"],"images/".$mid.".jpg");
     $quary2=$db->prepare("UPDATE movies SET src=? WHERE num='$num'");
                 $pic="images/".$mid.".jpg";   
                $quary2->execute(array($pic));
                    
                    echo"done tile img is set and loading...";
                    unset($_POST);
                  header("Refresh:2.8; url=addbannerimg.php");
                
                
                
                    } 
                    } 
                                                        } 
    else { echo "Invalid file"; }
    

                          
                          }

?>

    
    
<html>
<head><title>movie tile pic uploader</title></head>
    <body>
        <h1>please upload the poster image for the movie</h1>
    <form action="addtileimg.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="submit">    
    </form>
    </body>
</html>

    
    
    
<?php }

else{
    echo "you are not suppose to be here";
}


?>