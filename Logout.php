<?php 
session_start();
 //   echo "you are logged out";
        session_destroy(); 
            header("Refresh:0; url=index.php");

?>