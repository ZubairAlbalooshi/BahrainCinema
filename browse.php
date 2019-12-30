<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php 
session_start();
require("connection.php");

if(isset($_SESSION["username"])){
?>

<html>
	<head>
		<title>Generic - Phantom by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
                    <script language="javascript">
    
        var xmlHttp; 
        function GetXmlHttpObject() { 
var xmlHttp=null; 
try 
	{ 
	// Firefox, Opera 8.0+, Safari 
	xmlHttp=new XMLHttpRequest(); 
	}
catch (e) 
	{ 
	// Internet Explorer 
	try 
		{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } 
	catch (e) 
		{ xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
	} 
return xmlHttp; 
} 

        
	function clicked(str){
		xmlHttp=GetXmlHttpObject(); 
		if (xmlHttp==null) 
			{ alert ("Your browser does not support AJAX!"); 		return; }
		var url="movietype.php"; url=url+"?q="+str; 	url=url+"&sid="+Math.random(); 	xmlHttp.onreadystatechange=stateChanged;
 	xmlHttp.open("GET",url,true); 
		xmlHttp.send(null); }
        
	function stateChanged(){ 
        if (xmlHttp.readyState==4) { 			document.getElementById("result").innerHTML=xmlHttp.responseText; } 
	} 
        

        
    </script>
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
							<h1 align="center">Browse Movies by Genre</h1>
                            
                            <form>
                            <select name="genre" onchange="clicked(this.value)">
                              <option value="">Select something here!</option>
                              <option value="Action">Action</option>
                              <option value="Drama">Drama</option>
                              <option value="Fantasy">Fantasy</option>
                              <option value="Sci-Fi">Science Fiction</option>
                                <option value="Musical">Musical</option>
                            </select><br/>
                            </form>
						
                        
                        </div>
					</div>

                
                 
                
                <div class="inner">
                <section class="tiles">
                    
                <div id="result"></div>
                        
                </section>
        </div>
                        
               
                
                
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
<?php } 

else {
?>

<html>
	<head>
		<title>Generic - Phantom by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	 <script language="javascript">
    
        var xmlHttp; 
        function GetXmlHttpObject() { 
var xmlHttp=null; 
try 
	{ 
	// Firefox, Opera 8.0+, Safari 
	xmlHttp=new XMLHttpRequest(); 
	}
catch (e) 
	{ 
	// Internet Explorer 
	try 
		{ xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } 
	catch (e) 
		{ xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
	} 
return xmlHttp; 
} 

        
	function clicked(str){
		xmlHttp=GetXmlHttpObject(); 
		if (xmlHttp==null) 
			{ alert ("Your browser does not support AJAX!"); 		return; }
		var url="movietype.php"; url=url+"?q="+str; 	url=url+"&sid="+Math.random(); 	xmlHttp.onreadystatechange=stateChanged;
 	xmlHttp.open("GET",url,true); 
		xmlHttp.send(null); }
        
	function stateChanged(){ 
        if (xmlHttp.readyState==4) { 			document.getElementById("result").innerHTML=xmlHttp.responseText; } 
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
							<h1 align="center">Browse Movies by Genre</h1>
                            
                         <form>
                            <select name="genre" onchange="clicked(this.value)">
                              <option value="">Select something here!</option>
                              <option value="Action">Action</option>
                              <option value="Drama">Drama</option>
                              <option value="Fantasy">Fantasy</option>
                              <option value="Sci-Fi">Science Fiction</option>
                                <option value="Musical">Musical</option>
                            </select><br/>
                            </form>
                        
                        </div>
					</div>
                       <div class="inner">
                <section class="tiles">
                    
                <div id="result"></div>
                        
                </section>
        </div>
               
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


<?php 
     }
?>