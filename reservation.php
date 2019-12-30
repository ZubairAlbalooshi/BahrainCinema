<!DOCTYPE HTML>
<?php
session_start();
require('connection.php');
extract($_POST);
function err($s)
{
    echo'<html>
		<head>
			<title>Bahrain Cinema |Home </title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
			<link rel="stylesheet" href="assets/css/main.css" />
			<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
			<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
			<style>body{background-color:whitesmoke;}</style>
			</head>
            <body>
            <span>'.$s.'</span>
            </body>
            </html?
            ';
}
if(!isset($_SESSION['username'])){
    err('Please login before u start Reserving seats');
    header("Refresh:2; url=Login.php");
    exit();
}



else    
{
$us=$_SESSION['username'];
$quary=$db->prepare("SELECT * FROM users WHERE username='$us'");
$quary->execute();
$row=$quary->fetch();
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
                        
                        
                        var xmlHttp; 
                        function report1(str) {
                            xmlHttp=GetXmlHttpObject(); 
                            if (xmlHttp==null) 
                                { alert ("Your browser does not support AJAX!"); 		return; }
                            var url="process1.php"; url=url+"?q="+str; 	
                            url=url+"&sid="+Math.random(); 	
                            xmlHttp.onreadystatechange=stateChanged1;
                            xmlHttp.open("GET",url,true); 
                            xmlHttp.send(null); 
                            } 
                        function stateChanged1() { 
                            if (xmlHttp.readyState==4) { 			
                                document.getElementById("aid").innerHTML=xmlHttp.responseText; } 
                            } 
                        
                        function report2() {
                            xmlHttp=GetXmlHttpObject(); 
                            if (xmlHttp==null) 
                                { alert ("Your browser does not support AJAX!"); 		return; }
                            var url="process2.php";
                            var m=document.getElementById('mid').value;
                            var a=document.getElementById('aid').value;
                            url=url+"?m="+m+"&a="+a; 	
                            url=url+"&sid="+Math.random(); 	
                            xmlHttp.onreadystatechange=stateChanged2;
                            xmlHttp.open("GET",url,true); 
                            xmlHttp.send(null); 
                            } 
                        function stateChanged2() { 
                            if (xmlHttp.readyState==4) { 			
                                document.getElementById("sid").innerHTML=xmlHttp.responseText; } 
                            } 
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


			
                    </script>
                    </head>
        <body>

                
                <form method="post" action="reservation2.php">
                    <table border="2px" align ="center">
                    <tr>
        <td align="center" colspan="2"><b>Reservation</b></td>    
                        </tr>
                        <tr>
                            <td>Select the movie</td> 
                            <td><select id="mid" name ="movie" onclick="report1(this.value)" onchange="report1(this.value)">
                <?php
                            $query1=$db->query("SELECT * FROM movies");
                            
                            echo'<option value= 0"> please select a movie</option>';
                            
                            while($rs =$query1->fetch(PDO::FETCH_ASSOC))
                            {
                                echo'<option value="'.$rs['mid'].'">'.$rs['h2'].'</option>';
                                
                            }
    
                    ?>
                        </select>
                                </td>
                            
                            </tr>
                        <tr>
                            <td>Select the Auditoruim</td> 
                            <td><select id="aid" name = "auditorium" onclick='report2()' onchange="report2()">
                                <option value =0>Please select an Auditorium</option>
                                
                        </select>
                                </td>
                            
                            </tr>
                         <tr>
                            <td>Select the Timing</td> 
                            <td><select id="sid" name = "screening">
              
                        </select>
                                </td>
                            
                                </tr>
                                <tr>
                                <td align="center" colspan="2"><input type="submit" name="sb"></td>    
                                </tr>
                        
                    </table>
                
                    </form>
                
        </body>
        
	
                    </html>
    
<?php } ?>
	
	
}
