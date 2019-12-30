<!doctype html>
<?php require("connection.php"); ?>
<html>
    <head><title>Bahrain c| Register</title>
    
        <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 
    
    </head> 
<body>
        
        <?php 
extract($_POST);
    if(empty($un) || empty(trim($fn)) || empty(trim($ln)) || empty($mail) || empty($ps) || empty($cps))
        {
        ?>
        
        
      <form method="post" action="Register.php">
            <table border="2px" align ="center">
                    <tr>
        <td align="center" colspan="2"><b>Register</b></td>    
                        </tr>
            <tr><td>Username</td>
                <td><input type="text" name="un"></td>
                    </tr>
            
                        <tr><td>First name</td>
                            <td><input type="text" name="fn"></td>
                                </tr>
        
                                    <tr><td>last name</td>
                                        <td><input type="text" name="ln"></td>
                                            </tr>
            
                                        <tr><td>Email</td>
                                    <td><input type="email" name="mail"></td>
                                </tr>
            
                            <tr><td>password</td>
                        <td><input type="password" name="ps"></td>
                    </tr>
    
            <tr><td>confirm password</td>
        <td><input type="password" name="cps"></td>
    </tr>
            
        <tr><td>Date of birth</td>
            <td><input type="date" name="bd"></td>
                </tr>
    
                    <tr><td align="center"><button type="submit"                name="sb">Submit</button></td>
                        <td align="center" colspan="2"><button type="reset"     name="sb">Clear</button></td>
                    </tr>
            </table>
        </form>
        
        
        <?php }
        
else if($ps!=$cps) { extract($_POST);
                    echo "password and confirm password don't match";
                        unset($_POST);
                            header("Refresh:2; url=Register.php");
                                die();
                    }
else {
        extract($_POST);
    
            $quaryB=$db->prepare('SELECT * FROM users Where email=:mail');
                $quaryB->bindParam(':mail',$mail);
                    $quaryB->execute();
                        $row=$quaryB->fetch();
                            $count= $quaryB->rowCount();
                                if($count>=1){echo "you already have an account please log in in instead";
                            header("Refresh:2; url=Login.php");
                  die();
                 }
    
   else{ $ps=md5($ps);
    $type="user";
    $ppic="";    
    $quary=$db->prepare('INSERT INTO users VALUES(null,:username,:profilepic,:fname,:lastname,:email,:password,:birthday,:type)');
        
    $quary->bindParam(':username',$un);
     $quary->bindParam(':profilepic',$ppic);    
        $quary->bindParam(':fname',$fn);
            $quary->bindParam(':lastname',$ln);
                $quary->bindParam(':email',$mail);
                    $quary->bindParam(':password',$ps);
                            $quary->bindParam(':birthday',$bd);
                                    $quary->bindParam(':type',$type);
                                         $quary->execute();
       
$quary2=$db->prepare("SELECT * FROM users WHERE username='$un'");
       $quary2->execute();   
            $row=$quary2->fetch();
                $userid=$row['uid'];
       
$quary3=$db->prepare("INSERT INTO balance VALUES(null,0,'$userid')");
    $quary3->execute();
       
echo "you have successfully  registered now "."<br/>";
       echo "login using your username and password";
            $db=null; 
                header("Refresh:2; url=Login.php");
            
        
}

}
        
        ?>
        
        
    </body>
    
</html>