<!doctype html>

<?php 

session_start();
            require('connection.php');
        $user=$_SESSION['username'];     
$quary=$db->prepare("SELECT * FROM users WHERE username='$user'");
$quary->execute();   
$row=$quary->fetch();
$userid=$row['uid'];

$quary2=$db->prepare("SELECT * FROM balance WHERE UserID='$userid'");
$quary2->execute();
$row2=$quary2->fetch();
    $_SESSION["userid"]=$userid;




        if(!isset($_SESSION["username"])){echo "<h1>you are not authorised to view this page<h1>";                      header("Refresh:2; url=index.php");
                                         }

elseif($row['type']=='user'){ $_SESSION["userid"]=$row['uid'];
?>
<html>
   
    <head>
<title>
    Bahrain c| My account
    </title>
     <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
        
</head>
    
    <body>
      <h1 align="center" style="background-color:#c9c9c9;"><a href="index.php">home</a>|<?php
            echo $_SESSION["username"]; ?>
        | Balance : <?php echo $row2['Credit']." BD" ?> | <a href="Logout.php" >Logout</a>
        </h1> 
            
                <table border="2px" height="300" width="500">
                    <tr>
                            <?php if($row['profilepic']=="")
            {
                        
                        ?> 
            <td align="center"><img src="empty-profile-600x590.jpg"><a href="changeprofilepic.php?userid=<?php echo $userid; ?>" ><b>add profile Picture</b></a>
                        <?php $_SESSION["pic"]="empty-profile-600x590.jpg";?>
                        </td>
                        
                <?php } 
                        
                        else {
                        
                        ?>        
                        
                        <td align="center"><img width="340" height="340" src="<?php echo $row['profilepic']; ?>"><a href="changeprofilepic.php?userid=<?php echo $userid; ?>" ><b>change profile Picture</b></a></td>
                       
                        
                        <?php 
                        $_SESSION["pic"]=$row['profilepic'];
                        }?>
                        
                                <td width="80%" style="padding:0px" align="center"><font size="4"><b>My movie tickets</b></font><table border ="1px">
                              
                    <tr><td colspan="2"><iframe height="300px" width="100%" src="watchhistory.php" name="iframe_a"></iframe></td></tr>
                        
                    
                    </table>
    
                </td>
            
            </tr>
            
        <tr>
                <td colspan="2" align="center"><a href="#" ><b>watch history</b></a></td>
                
            </tr>
                     <tr>
                <td colspan="2" align="center"><a href="changepassword.php" ><b>change password</b></a></td>
                
            </tr>
                       <tr>
                <td colspan="2" align="center"><a href="topupbalence.php" ><b>top-up account balance</b></a></td>
                
                           
            </tr>
                   
                    <tr>
                        <td colspan="2" align="center"><a href="changeprofiledetails.php"><b>Change Profile Details</b></a> </td></tr>
        </table>
    
    </body>
</html>
<?php } 



// THE ADMIN PAGE:

 else { $_SESSION["type"]="ADMIN";   ?>
   

<html>
    
    <head>
<title>
    Bahrain c| My account
    </title>
     <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
        
</head>
    
    <body>
      <h1 align="center" style="background-color:#c9c9c9;">
          
          <a href="index.php">HOME</a>|<?php
           echo "<font color='red'>Admin: ".$_SESSION["username"]."</font>";
          ?> | 
          
          <a href="Logout.php">Logout</a> 
        
        </h1> 
            
                <table border="2px" height="300" width="500">
                    <tr>
                            <td align="center"><img src="empty-profile-600x590.jpg"><b><font color="red"> **ADMIN**</b></font></a></td>
            
                                <td width="80%" style="padding:0px" align="center">Users pennding for top up approval<table border ="1px">
                              
                    <tr><td colspan="2"><iframe height="300px" width="100%" src="userstopup.php" name="iframe_a"></iframe></td></tr>
                        
                    
                    </table>
    
                </td>
            
            </tr>
            
        <tr>
                <td colspan="2" align="center"><a href="addmovie.php" ><b>ADD MOVIE</b></a></td>
                
            </tr>
                     <tr>
                <td colspan="2" align="center"><a href="changepassword.php" ><b>change password</b></a></td>
                
            
                
            </tr>
                   
        </table>
    
    </body>
</html>



<?php }

?>