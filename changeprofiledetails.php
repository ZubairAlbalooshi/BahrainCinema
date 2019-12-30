<?php 
require('connection.php');
session_start();
$us=$_SESSION['username'];

$quary=$db->prepare("SELECT * FROM users WHERE username='$us'");
$quary->execute();
$row=$quary->fetch();
extract($_POST);
if(!isset($_SESSION["username"])){echo "<h1>you are not authorised to view this page<h1>";      header("Refresh:2; url=index.php"); }

elseif (!isset($newfirstname)||!isset($newlastname)||!isset($newemail)||!isset($newbirthday)){?> 
 
<html>
<head>
    <title>profile editor</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"
</head>
    
    
    <body>
    <h1 align="center" style="background-color:#c9c9c9;">Change Profile Details
        </h1> 
        <form method="post" action="changeprofiledetails.php">
         
        <table> 
            
            <tr> <td colspan="3" align="center">enter your new details</td>
            </tr>
             
             
             
            <tr>
                <td>First Name</td>
                <td colspan="3"><input placeholder="<?php echo $row['firstname']; ?>" type="text" name="newfirstname"</td></tr>
            
            <tr>
                <td>Last name</td>
                <td colspan="3"><input placeholder="<?php echo $row['lastname']; ?>" type="text" name="newlastname"</td></tr>
            
            <tr>
                <td>email </td>
                <td colspan="3" ><input placeholder="<?php echo $row['email']; ?>" type="email" name="newemail"</td></tr>
            
            <tr>
                <td>birth Date </td>
                <td colspan="3" ><input placeholder="<?php echo $row['birthdate']; ?>" type="date" name="newbirthday"</td></tr>
        
            <tr align="center">  <td align="center"><a href="My%20account.php"><font size="4" color="maroon"><b>Cancel instead</b></font></a></td>
            <td align="center"><button type="reset">Clear Enteries</button></td>
                <td align="center"><button class="special" type="submit">Change details</button></td>
            </tr>
            
            
        </table>
        
        </form>
        
    
    
    </body>
</html>


<?php }
    else { 
        
            if(empty(trim($newfirstname))==True){$newfirstname=$row['firstname'];}
        
                if(empty(trim($newlastname))==True){$newlastname=$row['lastname'];}
        
                    if(empty(trim($newemail))==True){$newemail=$row['email'];}
         
                        if(empty(trim($newbirthday))==True){$newbirthdate=$row['birthdate'];}
        
 
                                              
                           
                              $quaryC=$db->prepare("UPDATE users SET     firstname=:fname,lastname=:lastname,email=:email,birthdate=:birthday WHERE username='$us'");
        
    
        $quaryC->bindParam(':fname',$newfirstname);
            $quaryC->bindParam(':lastname',$newlastname);
                $quaryC->bindParam(':email',$newemail);
                            $quaryC->bindParam(':birthday',$newbirthday);
                                         $quaryC->execute();             
                               
                               echo"your details beens Sucessfully updated";
                                   
                                     header("Refresh:2; url=My account.php");
                                                                

                               
        
    
    } ?>