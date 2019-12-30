<!DOCTYPE html>
<?php 
require("connection.php");
session_start();
            require('connection.php');
if(!isset($_SESSION["username"])){echo "<h1>you are not authorised to view this page<h1>";                       header("Refresh:2; url=index.php");
                                 } 


elseif($_SESSION['type']=="ADMIN"){
?>
<html>
    <script language="javascript">
    
    
    </script>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
    <title>
    users top up request
    </title>
    </head>
    
    <body>
<?php 
    $q=$db->prepare("SELECT * FROM topupreq"); 
    $q->execute();
    $result=$q->fetchAll(PDO::FETCH_ASSOC);
         $quary3=$db->prepare("SELECT COUNT(*) FROM topupreq");
         $quary3->execute();
         $row3=$quary3->fetch();
                                   
    ?>
    <table><form method="post" action="requestproc.php">
        <th>request ID</th><th>user ID</th><th>amount</th><th>payment method</th><th>Card expiration date</th><th>card number</th> <th colspan="2">status</th>
        
        <?php 
     foreach($result as $row){
        ?> 
         <tr>
            <td> <input type="hidden" name="rid" value="<?php echo $row['rid']; ?>"><?php echo $row['rid']; ?></td>
             
             <td><input type="hidden" name="uid" value="<?php echo $row['uid']; ?>"><?php echo $row['uid']; ?></td>
             
             <td><input type="hidden" name="amount" value="<?php echo $row['amount']; ?>"><?php echo $row['amount']; ?></td>
             
             <td><input type="hidden" name="pmethod" value="<?php echo $row['pmethod']; ?>"><?php echo $row['pmethod']; ?></td>
             
             <td><input type="hidden" name="exp" value="<?php echo $row['exp']; ?>"><?php echo $row['exp']; ?></td>
             
             <td><input type="hidden" name="cnum" value="<?php echo $row['cnum']; ?>"><?php echo $row['cnum']; ?></td>

             <td><button name="sub" value="true" type="submit" class='special'>accept</buttun></td>
             
            <td><button name="sub" value="false" type="submit">decline</buttun></td>
             </tr>
         
         
          <?php                    }    
    
        ?>
              
    </table> </form>
        
    </body>
</html>
<?php } ?>