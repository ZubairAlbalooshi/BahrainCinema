<!DOCTYPE HTML>
<?php require('connection.php');
extract($_GET);
$quary=$db->prepare("SELECT * FROM movies WHERE mid=?");
    $quary->execute(array($mid));
   $row=$quary->fetch();
     session_start();
  

 if(isset($_SESSION["username"])){
?>
<html>
	<head>    
   
        <script language="javascript">
        function myFunction(){

            
        }
        </script>
        
		<title>Bahrain c| movie details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <style>
          .wrapper {
                padding: 20px;
                margin: 100px auto;
                width: 200px;
                height: 200ps
                min-height: 200px;
                border-radius: 5px;
                background-color: #c9c9c9;
            }
            .rating{
                overflow: hidden;
                vertical-align: bottom;
                display: inline-block;
                width: auto;
                height: 30px;
            }
            .rating > input{
                opacity: 0;
                margin-right: -100%;
            }
            .rating > label{
                position: relative;
                display: block;
                float: right;
                background: url('star-off-big.png');
                background-size: 30px 30px;
            }
            .rating > label:before{
                display: block;
                opacity: 0;
                content: '';
                width: 30px;
                height: 30px;
                background: url('star-on-big.png');
                background-size: 30px 30px;
                transition: opacity 0.2s linear;
            }
            .rating > label:hover:before,
            .rating > label:hover ~ label:before,
            .rating:not(:hover) > :checked ~ label:before{
                opacity: 1;
            }
.rating > label:hover:before,  .rating > label:hover ~ label:before,  .rating:not(:hover) > :checked ~ label:before { opacity: 1; }
    </style>
        
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Bahrain c</span>
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
						<ul>
							
                            
                             <li><a href="index.php">Home</a></li>
                                    <li><a href="My account.php">My account</a> </li>
                             <!--<li><a href="Register.php">Register</a></li>-->
							     <li><a href="generic.html">About Bahrain Cenima</a></li>
							     <li><a href="elements.html">Elements</a></li>
                                <li><a href="Logout.php"    >Logout</a></li>
                            
                            
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1><?php echo $row['h2']; ?></h1>
							<span class="image main"><img width="1152" height="326" src="<?php echo $row['banner'];?>" alt="" /></span>
                            
                            
                            
                            
                            <table border="1" align="center">
                            
                            <tr>
                                <td width="300"><?php echo "catogory : ".$row['cat']."<br/>Release Date: ".$row['releasedate']."<br/> Age Restriction: ".$row['agerestriction']."<br/>Run Time: ".$row['runtime']."<br/>"; ?> </td>
                                
                                <td> 
                             <form method="post" onsubmit="myFunction()">
                           <div class="wrapper">
                                 Rate: <?php echo $row['h2']; ?>
            <span class="rating">
                <input id="rating5" type="radio" name="rating" value="5">
                <label for="rating5">5</label>
                <input id="rating4" type="radio" name="rating" value="4">
                <label for="rating4">4</label>
                <input id="rating3" type="radio" name="rating" value="3">
                <label for="rating3">3</label>
                <input id="rating2" type="radio" name="rating" value="2" checked>
                <label for="rating2">2</label>
                <input id="rating1" type="radio" name="rating" value="1">
                <label for="rating1">1</label>
                </span>
        </div>                     
                                
                                    </form>     

                                
                                </td>
                                
                            </tr>
                                <tr>
                                <td>
                                    
                                   <object  data="<?php echo $row['trailer']; ?>"
   width="560" height="315"></object>


                                    </td>
                                    
                                    <td><?php echo $row['p2'];?></td>
                                </tr>
                            </table>
                            
							
						</div>
					</div>
        
                
        <div id="main">
						<div class="inner">
                
<?php                            
 $quary2=$db->prepare("SELECT * FROM mcomments WHERE mid=?");             $quary2->execute(array($mid));


if(count($row2=$quary2->fetch())==1){
   echo" <table align='center'>";
     echo   "<tr>";
        echo "<td align='center'>Be the first to leave a comment</td>";
        echo"</tr>";
        echo"</table>";
    
}                                  
else {
   
do
{echo"<table class='alt'>";
echo"<tr>";
    echo"<td> Name : ";echo $row2['username'];echo"</td>"; 
     echo"<td> Email: ";echo $row2['email'];echo"</td>";
echo"</tr>" ;  
    
    echo"<tr>";
        echo"<td colspan='2' align='center'>";echo $row2['comment'];echo"</td>";
    echo"</tr>";echo"</table>";
}while ($row2 = $quary2->fetch(PDO::FETCH_ASSOC));
 
}
?>                
            </div>
                
                </div>    
                

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Leave a Comment about the Movie</h2>
                                
				<form method="post" action="commentproc.php">

                <input type="hidden" value="<?php echo $mid; ?>" name="mid" />
				
                <input type="text" name="name" id="name" placeholder="Enter your Name" />
 
               
				<input type="email" name="email" id="email" placeholder="Email" />
				 
                <div class="field">
				<textarea name="comment" id="message" placeholder="Comment"></textarea>
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
<?php }



else {?>
    
    <html>
	<head>    
   
        <script language="javascript">
        function myFunction(){

            
        }
        </script>
        
		<title>Bahrain c| movie details</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
      <!--  <style>
          .wrapper {
                padding: 20px;
                margin: 100px auto;
                width: 200px;
                height: 200ps
                min-height: 200px;
                border-radius: 5px;
                background-color: #c9c9c9;
            }
            .rating{
                overflow: hidden;
                vertical-align: bottom;
                display: inline-block;
                width: auto;
                height: 30px;
            }
            .rating > input{
                opacity: 0;
                margin-right: -100%;
            }
            .rating > label{
                position: relative;
                display: block;
                float: right;
                background: url('star-off-big.png');
                background-size: 30px 30px;
            }
            .rating > label:before{
                display: block;
                opacity: 0;
                content: '';
                width: 30px;
                height: 30px;
                background: url('star-on-big.png');
                background-size: 30px 30px;
                transition: opacity 0.2s linear;
            }
            .rating > label:hover:before,
            .rating > label:hover ~ label:before,
            .rating:not(:hover) > :checked ~ label:before{
                opacity: 1;
            }
.rating > label:hover:before,  .rating > label:hover ~ label:before,  .rating:not(:hover) > :checked ~ label:before { opacity: 1; }
    </style>
        
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="index.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">Bahrain c</span>
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
						<ul>
							
                            <li><a href="index.php">Home</a></li>
                                <li><a href="Login.php">Log in</a> </li>
                                    <li><a href="Register.php">Register</a></li>
							     <li><a href="generic.html">About Bahrain Cenima</a></li>
							 <li><a href="elements.html">Elements</a></li>
                            
                            
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1><?php echo $row['h2']; ?></h1>
							<span class="image main"><img width="1152" height="326" src="<?php echo $row['banner'];?>" alt="" /></span>
                            
                            
                            
                            
                            <table border="1" align="center">
                            
                            <tr>
                                <td colspan="2" width="300"><?php echo "catogory :".$row['cat']."<br/>Release Date: ".$row['releasedate']."<br/> Age Restriction: ".$row['agerestriction']."<br/>Run Time: ".$row['runtime']."<br/>"; ?> </td>
                                
                      <!--          <td> 
                             <form method="post" onsubmit="myFunction()">
                           <div class="wrapper">
                                 Rate: <? //php echo $row['h2']; ?>
            <span class="rating">
                <input id="rating5" type="radio" name="rating" value="5">
                <label for="rating5">5</label>
                <input id="rating4" type="radio" name="rating" value="4">
                <label for="rating4">4</label>
                <input id="rating3" type="radio" name="rating" value="3">
                <label for="rating3">3</label>
                <input id="rating2" type="radio" name="rating" value="2" checked>
                <label for="rating2">2</label>
                <input id="rating1" type="radio" name="rating" value="1">
                <label for="rating1">1</label>
                </span>
        </div>                     
                                
                                    </form>     

                                
                                </td> -->
                                
                            </tr>
                                <tr>
                                <td>
                                    
                                   <object  data="<?php echo $row['trailer'];?>"
   width="560" height="315"></object>


                                    </td>
                                    
                                    <td><?php echo $row['p2'];?></td>
                                </tr>
                            </table>
                            
							
						</div>
					</div>

                
          
        <div id="main">
						<div class="inner">
                
<?php                            
 $quary2=$db->prepare("SELECT * FROM mcomments WHERE mid=?");             $quary2->execute(array($mid));


if(count($row2=$quary2->fetch())==1){
   echo" <table align='center'>";
     echo   "<tr>";
        echo "<td align='center'>Be the first to leave a comment</td>";
        echo"</tr>";
        echo"</table>";
}                                  
else {
   
do
{echo"<table class='alt'>";
echo"<tr>";
    echo"<td> Name : ";echo $row2['username'];echo"</td>"; 
     echo"<td> Email: ";echo $row2['email'];echo"</td>";
echo"</tr>" ;  
    
    echo"<tr>";
        echo"<td colspan='2' align='center'>";echo $row2['comment'];echo"</td>";
    echo"</tr>";echo"</table>";
}while ($row2 = $quary2->fetch(PDO::FETCH_ASSOC));
}
 

?>                
            </div></div>              
                
                
				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Leave a Comment about the Movie</h2>
                                
				<form method="post" action="commentproc.php">

                <input type="hidden" value="<?php echo $mid; ?>" name="mid" />
				
                <input type="text" name="name" id="name" placeholder="Enter your Name" />
 
               
				<input type="email" name="email" id="email" placeholder="Email" />
				 
                <div class="field">
				<textarea name="comment" id="message" placeholder="Comment"></textarea>
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
     }
?>