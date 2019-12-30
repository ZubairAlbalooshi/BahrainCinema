<?php 

require("connection.php");
extract($_POST);
session_start();

if($_SESSION['type']!="ADMIN"){
    
        echo "ur are not athorized to veiw this page";
}

else {$quary=$db->prepare("SELECT * FROM movies ORDER BY num DESC LIMIT 1");
      $quary->execute();
      $row=$quary->fetch();
      $nnum=$row['num']+1;
      if(isset($h2)&&isset($h2)&&isset($trailer)&&isset($p2)){ 
          $q=$db->prepare("INSERT INTO movies values (null,?,?,?,?,?,?,?,?,?,?)");
                       $src=" ";
                       $banner=" ";
          $q->execute(array($nnum,$h2,$src,$cat,$releasedate,$agerestriction,$runtime,$trailer,$p2,$banner));
          echo " movie details added to the database";
           $_SESSION['num']=$nnum;
           header("Refresh:2; url=addtileimg.php");
    } 
else{      
?>

<html>
<head><title>Generic - Phantom by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <title>Movie ADDER</title>
</head>
    
    
    <body>
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
							<h1 align="center">movie adder</h1>
							<span class="image main">
						
        <form action="addmovie.php" method="post" enctype="multipart/form-data">
        
        <table>
            <tr>
            <td>please enter the moive name</td><td><input type="text" name="h2"></td>
            </tr>
            
             <tr><td>please enter the movie catogories each genre followed by a comma </td><td><input type="text" name="cat"</td></tr>
            
             <tr><td>please enter the movie release date </td><td><input type="date" name="releasedate"</td></tr>
            
            
             <tr><td>please enter the movie runtime </td><td><input type="text" name="runtime"</td></tr>
            
            
             <tr><td>please enter the movie age restriction</td><td><input type="text" name="agerestriction"</td></tr>
            
            
            <tr><td>please enter the an embeded youtube link for the trailer</td><td><input type="text" name="trailer"</td></tr>
            
            <tr><td>please enter a small summery for the movie   </td><td><input type="text" name="p2"</td></tr>
            
           <tr> <td><a href="My%20account.php"><font size="4" color="maroon"><b>cancel instead</b></font></a></td>
               <td><button class="special" type="submit">NEXT</button></td>
            </tr>
        </table>
        
        </form>
    
    
    
             
                                
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
								<form method="post" action="#">
									<div class="field half first">
										<input type="text" name="name" id="name" placeholder="Name" />
									</div>
									<div class="field half">
										<input type="email" name="email" id="email" placeholder="Email" />
									</div>
									<div class="field">
										<textarea name="message" id="message" placeholder="Message"></textarea>
									</div>
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





<?php 
}}
?>