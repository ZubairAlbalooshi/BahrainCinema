<!DOCTYPE html> 
<?php 
session_start();


    extract($_POST);
        require("connection.php");
            if(!isset($_SESSION["username"])){echo "<h1>you are not authorised to view this page<h1>";                       header("Refresh:2; url=index.php");
                                 } 


elseif(!isset($cp) || !isset($ncp)){
?>
<html>
<head>
    <link rel="stylesheet" type="text/css"                  href="assets/css/main.css">  
        </head>
    
            <body>
    
                <table align="center">
                    <tr>
                <?php if(isset($_SESSION["pic"])){?>
                    <td colspan="2" align="center"><img     src="<?php echo $_SESSION["pic"]; ?>"></td><?php }?>
                        
                <?php if(!isset($_SESSION["pic"])){ ?>     
                        
                <td colspan="2" align="center"><img     src="empty-profile-600x590.jpg"></td>
                        
                        <?php } ?>
                    </tr>
                    <tr><td colspan="2" align="center"><h1><?php echo  $_SESSION["username"]?></h1></td></tr>
                    <form action="changepassword.php" method="post">
                    <tr><td><b>please enter your current password </b></td>
                <td><input type="password" name="cp"></td>
            <tr><td><b>Enter your new password</b></td>
        <td><input type="password" name="ncp"></td>
    </tr> 
</tr>
        <tr>
            <td align="center"><a href="My%20account.php"><font size="4" color="maroon"><b>Cancel instead</b></font></a></td>
            
                <td aligh="center"><button class="special" type="submit">Change password</button></td>
                        </tr>
        
        
                            </form>
                                    </table>
    
    
                                        </body>
                                </html>
                        <?php }
                        else {
                    $us=$_SESSION['username'];
                $quary=$db->prepare("SELECT * FROM users WHERE username='$us'");
                            
                            
$quary->execute();  
$row=$quary->fetch();
$Uid=$row['uid'];    $cp=md5($cp);
                if($cp!=$row['password']){echo "Entered current  password is worng";
                header("Refresh:2; url=changepassword.php");}
    
                else{$ncp=md5($ncp);
                    $quary2=$db->prepare("UPDATE users set password='$ncp' WHERE uid='$Uid'");
                    $quary2->execute();
                    echo "your new password has been set";
                    header("Refresh:2; url=My account.php");
                    }
                            }

?>