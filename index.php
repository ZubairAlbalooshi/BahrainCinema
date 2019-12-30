<!DOCTYPE HTML>

<?php session_start();
require('connection.php');
if(isset($_SESSION["add"]))
{        unset($_SESSION["add"]);}
?>
<html>
	<head>
        <title>Bahrain Cinema |Home </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <style>body{background-color:whitesmoke;}</style>
        
        <script language="javascript"> 
        function clicked(){
            
          window.location.assign("browse.php");
                        }
        </script>
        
	</head>
    
   
    
	<body>
         
	<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">BAHRAIN C</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul><?php if(!isset($_SESSION["username"])){ ?>
							<li><a href="index.php">Home</a></li>
                                <li><a href="Login.php">Log in</a> </li>
                                    <li><a href="Register.php">Register</a></li>
							     <li><a href="generic.html">About Bahrain Cenima</a></li>
								 <li><a href="reservation.php">Reservation</a></li>
							 <li><a href="elements.html">Elements</a></li>
                            
                            <?php } 
                            
                            else{ ?>
                                <li><a href="index.php">Home</a></li>
                                    <li><a href="My account.php">My account</a> </li>
                             <!--<li><a href="Register.php">Register</a></li>-->
							     <li><a href="generic.html">About Bahrain Cenima</a></li>
							     <li><a href="elements.html">Elements</a></li>
								 <li><a href="reservation.php">Reservation</a></li>
                                <li><a href="Logout.php"    >Logout</a></li>
                               <?php  } ?>
                            
                        
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							  <div id="container">
    <div class="photobanner">
        <img class="first" src="images/pic01.jpg">
            <img  src="images/pic02.jpg">
                <img  src="images/pic03.jpg">
                    <img  src="images/pic04.jpg">
                        <img  src="images/pic05.jpg">
                            <img  src="images/pic06.jpg">
                        <img  src="images/pic07.jpg">
                    <img  src="images/pic08.jpg">
                <img  src="images/pic09.jpg">
            <img  src="images/pic10.jpg">
    </div>
     </div>
                            <header>
								<h1>Current playing moveis<br />
								</header>    
        <?php
         $quary3=$db->prepare("SELECT COUNT(*) FROM movies");
         $quary3->execute();
         $row3=$quary3->fetch();
                               
                                ?>
                                  <section class="tiles">
        <?php for($i=0;$i<$row3['0'];$i++){ 
        $quary=$db->prepare("SELECT * FROM movies WHERE num='$i'");
        $quary->execute();
        $row=$quary->fetch();?>
        <article class="style<?php echo $i;?>">
            <span class="image">
            <img src="<?php echo $row['src']; ?>">
            </span>
                <a href="moviedetails.php?mid=<?php echo $row['mid'];?>">
                <h3><?php echo $row['h2']; ?></h3>
                    <div class="content">
                    <p><?php echo $row['cat']."<br/>".$row['releasedate']."<br/>".$row['agerestriction']."<br/>".$row['runtime']."<br/>"; ?></p>
                    </div>
                      </a>
                </article>
        <?php }?>
        </section>                                
                              
              
						</div>
					</div>
                            <div align="center">  <button class="special" onclick="clicked()" >browse movies by genre</button> </div>
				<!-- Footer -->
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

	</body>
</html>