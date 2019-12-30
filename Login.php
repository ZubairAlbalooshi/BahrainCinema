<!doctype html>
<?php
 require("connection.php");
?>

<html>
    <?php 
    extract($_POST);
      if(!isset($sn) && !isset($ps))
      { //echo "this got excuted";
      // session_start();
       
    ?>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    
    
    <title>
    Log in</title></head>
<body>
<div id="login";>
    
    <!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Bahrain C</span>
								</a>

						</div>
					</header>

					<div id="main">
						<div class="inner">
							<h1 align="center">Login</h1>
							<span class="image main">
						
                                
    
    
    <form method="post" action="Login.php">
    
    <table>
        <tr>
            <td align="center" colspan="2">
            <b></b> 
            </td>          
                </tr>
            <tr>
                <td>Username</td>
                    <td>
                        <input type="text" name="sn">    
                            </td>
                                </tr>
        
                                <tr>
                                    <td>Password</td>
                                <td><input type="password" name="ps"></td>    
                            </tr>
                    <td  align="center"> <button class="special" type="submit" name="sb">log in</button></td> 
            <td align="center"> <a href="Register.php"
             ><b>Create Account</b></a></td>  
                </tr>
            </table>
    </form>
    </div>
               <footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									
										<input type="text" name="name" id="name" placeholder="Name" />
									
									
										<input type="email" name="email" id="email" placeholder="Email" />
									
									
										<textarea name="message" id="message" placeholder="Message"></textarea>
									
									<ul class="actions">
										<li><input type="submit" value="Send" class="special" /></li>
									</ul>
								</form>
							</section>
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
    </div>
	</body>
</html>         
    
    <?php
      }
    else {//echo "else got excuted "."<br/>";
        session_start();
                   $ps=md5($ps);
                $quary=$db->prepare("select * from users where username=? and password=?");
                        $quary->execute(array($sn,$ps));
                            $row=$quary->fetch();
                                $count= $quary->rowCount();

          if($count==1){
                   // echo "user logged in"."<br/>";
                        header("Refresh:0.5; url=index.php");
                      //     die();
                            }
         else { //echo $count;
                    echo "wrong username or password";
                        unset($_POST);
                            unset($_SESSION);
                                    header("Refresh:2; url=Login.php");
              }
          
 $_SESSION["username"] =$sn;
      $db=null;
     //   echo "username is ". $_SESSION["username"] ."\n";    
       // echo "username is ". $_SESSION["password"] ."\n";
         }
          ?>
    
                        
                        
                        
