<!DOCTYPE html>
<?php 
require("connection.php");
session_start();
extract($_POST);

require("connection.php");

if(!isset($_SESSION["username"])){echo "<h1>you are not authorised to view this page<h1>";                       header("Refresh:2; url=index.php");
                                 } 


else { 
    
    if(isset($amount)&&isset($pm)&&isset($ce)&&isset($cnum)){ echo"here";
     
    $uid=$_SESSION["userid"];
    $q=$db->prepare("INSERT INTO topupreq VALUES (null,?,?,?,?,?)");
    $q->execute(array($uid,$amount,$pm,$ce,$cnum));
    echo "your top up request has been sent to the administration please wait patiently for your  top to request to be full filled";
    header("Refresh:1.5; url=My account.php");
      die();                      
                        }
      
    ?>

<html>
    <head>
        <title>
            </title>    
                <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    </head>
            <body>
                <form action="topupbalence.php" method="post">
                    <table align="center" border="2px">
        <tr>
            <td align="center" colspan="2"><b><?php echo $_SESSION['username'] ?></b></td>
        </tr>
                <tr><td align="center"><input id="radio1" type="radio" name="pm" value="debit card" ><label for="radio1"> <b>Debit Card</b> </label></td>  
        <td align="center">
            <input id="radio2" type="radio" name="pm" value="credit card"><label for="radio2"><b> Credit Card </b> </label></td></tr>
        <tr>
            <td align="center"><font size="4">please enter your card number</font></td>
            <td><input type="text" name="cnum"/> </td>
        </tr>
                <tr><td align="center"><font size="4">Card Expiration Date</font></td>
                    <td align="center"><input name="ce" type="date"></td>
                            </tr>
                            <tr> <td align="center"><font size="4">Enter the balence amount </font></td>
                                    <td align="center"> <input name="amount" type="number"></td>
                                </tr>
                                <tr><td align="center" colspan="2"><button type="submit" class="special">Submit request to top-up</button></td></tr>
                    </table>
     </form>
    
    
        </body>
    </html>


<?php } ?>
    
    
    