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
    err("Please login before u start Reserving seats");      
    header("Refresh:2; url=Login.php"); 
    exit();
}



    else if((!isset($sb))||($auditorium==0)||($screening==0)||($movie==0))
    {
        err("please select a fill all details of reservation before u proceed");
        header("Refresh:2; url=reservation.php");
        exit();
    }
   // if(isset($_POST['movie']))
   //     $mid=$_POST['mid'];
    
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
            <link rel="stylesheet" href="assets/css/seat.css" />
			<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
			<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
			<style>body{background-color:whitesmoke;}</style>
            
            <script language="javascript">
                
                
                function GetXmlHttpObject() {  
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


                 // Clicking any seat
                function add(id)
                {
                    xmlHttp=GetXmlHttpObject(); //use the same function as the previous example
                    if (xmlHttp==null)  {   alert ("Your browser does not support AJAX!");   return;   } 
                    if(!document.getElementById(id).classList.contains('seatUnavailable'))
                        {
                            if(document.getElementById(id).classList.contains('seatSelected'))
                                {
                                    var price=document.getElementById("seatsList").getElementsByClassName(id)[0].getAttribute('value');
                                    document.getElementById(id).classList.remove("seatSelected");
                                    var element = document.getElementsByClassName(id);
                                    element[0].parentNode.removeChild(element[0]);
                                    
                                    removeFromCheckout(price);
                                    refreshCounter();
                                }
                            else 
                                {
                                    var tempid = id.split("_");
                                    var price = document.getElementById(id).getAttribute('value');
                                    var seatDetails="Row : "+tempid[0]+" Seat : "+tempid[1]+" Price: BHD "+price;
                                    var seatsLeft=parseInt(document.getElementsByClassName("MaxSeats")[0].textContent);
                                    var selectedSeats=parseInt(document.getElementsByClassName("seatSelected").length);
                                    if(selectedSeats<seatsLeft)
                                        {
                                            seatDetails="Row : "+tempid[0]+" Seat : "+tempid[1]+" Price: BHD "+price;
                                            document.getElementById("seatsList").innerHTML+='<li value='+price+' class ='+id+'>'+seatDetails+" "+"<button id='remove:"+id+"'+ class='btn btn-default btn-sm removeSeat' value='"+price+"'"+' onclick="bclick(this.id)"'+"><strong>X</strong></button></li>";
                                            document.getElementById(id).classList.add("seatSelected");
                                            addToCheckout(price);
                                            refreshCounter();
                                            
                                        }
                                    
                                    
                                }
                        }
                }
                    function refreshCounter()
                    {
                        document.getElementsByClassName("seatsAmount")[0].innerHTML=document.getElementsByClassName("seatSelected").length;
                        
                    }
                    function addToCheckout(price)
                    {
                        
                        var seatPrice = parseInt(price);
                        var num=parseInt(document.getElementsByClassName("txtSubTotal")[0].textContent);
                        num+=seatPrice;
                        num=num.toString();
                        document.getElementsByClassName("txtSubTotal")[0].innerHTML=num;
                    }
                    
                    function removeFromCheckout(price)
                    {
                        var seatPrice = parseInt(price);
                        var num=parseInt(document.getElementsByClassName("txtSubTotal")[0].textContent);
                        num-=seatPrice;
                        num=num.toString();
                        document.getElementsByClassName("txtSubTotal")[0].innerHTML=num;
                        
                        
                    }
                function clearb(){
                    document.getElementsByClassName("txtSubTotal")[0].innerHTML="0";
                    document.getElementsByClassName("seatsAmount")[0].innerHTML="0";
                    var selectedSeats=parseInt(document.getElementsByClassName("seatSelected").length);
                    while(selectedSeats>0)
                        {
                            document.getElementsByClassName("seatSelected")[--selectedSeats].classList.remove("seatSelected");
                            
                        }
                    document.getElementById("seatsList").innerHTML="";
                         
                }
                function bclick(id)
                {
                                    var vid=id.split(":");
                                    var price=document.getElementById("seatsList").getElementsByClassName(vid[1])[0].getAttribute('value');
                                    document.getElementById(vid[1]).classList.remove("seatSelected");
                                    var element = document.getElementsByClassName(vid[1]);
                                    element[0].parentNode.removeChild(element[0]);
                                    removeFromCheckout(price);
                                    refreshCounter();
                    
                }
                    
                 function checkSeats()
                {
                     
                    var url="checkseats.php";
                    var elements=document.getElementsByClassName("seatNumber");
                    var num=elements.length;
                    var sid=document.getElementById("screenid").value;
                    url=url+"?screenid="+sid; 	
                    for(var i=0;i<num;i++)
                        {
                            var xmlHttp;
                            xmlHttp=GetXmlHttpObject(); 
                            if (xmlHttp==null) 
                                { alert ("Your browser does not support AJAX!"); 		return; }
                            
                            var seatid =elements[i].getAttribute('id');
                            var r=seatid.split("_");
                            var url1=url+"&seatr="+r[0]+"&seatc="+r[1];
                            url1=url1+"&sid="+Math.random(); 	
                            xmlHttp.onreadystatechange=function () { 
                        if (xmlHttp.readyState==4) { 	
                            //document.getElementById(seatid).className+=xmlHttp.responseText;
                            document.getElementById(seatid).className+=xmlHttp.responseText;
                            
                            
                        } 
                        } 
                           
                            xmlHttp.open("GET",url1,false); 
                            xmlHttp.send(null);
                        }
                    
                    
                }
                function checkout(){
                    
                    var elements=document.getElementsByClassName("seatSelected");
                    var num=elements.length;
                    document.getElementById("scid").setAttribute('value',document.getElementById("screenid").value);
                    var seats="";
                    if(num>0){
                        var seatid =elements[0].getAttribute('id');
                            seats+=seatid;
                        
                    }
                  
                    
                    for(var i=1;i<num;i++)
                        { 
                            
                            seatid =elements[i].getAttribute('id');
                            seats+=":"+seatid;
                 
                        }
                    document.getElementById("ss").setAttribute('value',seats);
                    if(num==0)
                        {
                            document.getElementsByClassName('MinSeats')[0].innerHTML="Please Select atleast 1 seat ";
                            return false;
                            
                        }
                    else
                    {
                    document.getElementById('cost').setAttribute('value',document.getElementsByClassName('txtSubTotal')[0].innerHTML);
                        return true;
                    }
                    
                    
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
            
            <form >
                    <table border="2px" align ="center">
                        <tr>
                        <td align="center" colspan="5"><b>Reservation</b></td>    
                        </tr>
                        <?php
                        $quary=$db->prepare("SELECT * FROM movies WHERE mid=?");
                        $quary->execute(array($movie));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                        ?>
                                    <tr>
                                        <td rowspan="3" style="width:25%"><img src=<?php echo $row["src"]; ?> ></td>
                                        <td>Movie Name</td>
                                        <td><?php echo $row["h2"]; ?></td>
                                        <td><input type="hidden" id="movie" value= <?php echo $row["mid"]; ?> ></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php
                            
                        $quary=$db->prepare("SELECT * FROM auditorium WHERE aid=?");
                        $quary->execute(array($auditorium));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                            ?>
                            <td>Movie venue</td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><input type="hidden" id="auditorium" value= <?php echo $row["aid"]; ?> ></td>
                        </tr>
                        <?php }?>
                        <tr>
                         <?php
                            
                        $quary=$db->prepare("SELECT * FROM screening WHERE id=?");
                        $quary->execute(array($screening));
                        $row=$quary->fetch();
                        $count= $quary->rowCount();
                        if($count)
                        {
                            ?>
                            <td>Movie venue</td>
                            <td><?php echo $row["start"]; ?></td>
                            <td><input type="hidden" id="screenid" value= <?php echo $row["id"]; ?> ></td>
                        <?php }?>
                        </tr>
                </table>   
            </form>
            
            
        <div class="seatSelection col-lg-12">
                        <p class="seatSection">
                            <span class="MaxSeats">5</span> seats Maximum can be selected<br />
                            <span class="MinSeats"></span><br/>
                            SCREEN HERE
                        </p>
                        <div class="seatsChart col-lg-6">
                            <div class="seatRow">
                                <div class="seatRowNumber">
                                    Row A
                                </div>
                                <div id="A_0" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber " onclick="add(this.id)">0</div>
                                <div id="A_1" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">1</div>
                                <div id="A_2" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">2</div>
                                <div id="A_3" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">3</div>
                                <div id="A_4" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber " onclick="add(this.id)">4</div>
                                <div id="A_5" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">5</div>
                                <div id="A_6" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber  "onclick="add(this.id)">6</div>
                                <div id="A_7" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">7</div>
                                <div id="A_8" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">8</div>
                                <div id="A_9" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">9</div>


                            </div>
                            <div class="seatRow">
                                <div class="seatRowNumber">
                                    Row B
                                </div>
                                <div id="B_0" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">0</div>
                                <div id="B_1" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">1</div>
                                <div id="B_2" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">2</div>
                                <div id="B_3" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">3</div>
                                <div id="B_4" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">4</div>
                                <div id="B_5" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">5</div>
                                <div id="B_6" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber  "onclick="add(this.id)">6</div>
                                <div id="B_7" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">7</div>
                                <div id="B_8" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">8</div>
                                <div id="B_9" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">9</div>

                            </div>
                            <div class="seatRow">
                                <div class="seatRowNumber">
                                    Row C
                                </div>
                                <div id="C_0" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">0</div>
                                <div id="C_1" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">1</div>
                                <div id="C_2" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">2</div>
                                <div id="C_3" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">3</div>
                                <div id="C_4" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">4</div>
                                <div id="C_5" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)"onclick="add(this.id)">5</div>
                                <div id="C_6" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber  "onclick="add(this.id)">6</div>
                                <div id="C_7" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">7</div>
                                <div id="C_8" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">8</div>
                                <div id="C_9" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">9</div>

                            </div>
                            <div class="seatRow">
                                <div class="seatRowNumber">
                                    Row D
                                </div>
                                <div id="D_0" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">0</div>
                                <div id="D_1" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">1</div>
                                <div id="D_2" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">2</div>
                                <div id="D_3" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">3</div>
                                <div id="D_4" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">4</div>
                                <div id="D_5" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">5</div>
                                <div id="D_6" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">6</div>
                                <div id="D_7" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">7</div>
                                <div id="D_8" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">8</div>
                                <div id="D_9" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">9</div>

                            </div>
                            <div class="seatRow">
                                <div class="seatRowNumber">
                                    Row E
                                </div>
                                <div id="E_0" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">0</div>
                                <div id="E_1" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">1</div>
                                <div id="E_2" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">2</div>
                                <div id="E_3" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">3</div>
                                <div id="E_4" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">4</div>
                                <div id="E_5" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">5</div>
                                <div id="E_6" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">6</div>
                                <div id="E_7" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">7</div>
                                <div id="E_8" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">8</div>
                                <div id="E_9" role="checkbox" value="4" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber "onclick="add(this.id)">9</div>
                            </div>
                        </div>
                        <div class="seatsReceipt col-lg-2">
                            <p><strong>Selected Seats: <span class="seatsAmount" />0 </strong> <button id="btnClear" class="btn" onclick="clearb()">Clear</button></p>
                            <ul id="seatsList" class="nav nav-stacked"></ul>

                        </div>

                    <div class="checkout col-lg-offset-6">
                        <span>Subtotal: BHD</span><span class="txtSubTotal">0.00</span><br />
                        <form onsubmit="return checkout()" method="post" action="reservation3.php" id="myform">
                            <input type=hidden id="scid" name="scid" value="">
                            <input type=hidden id="ss" name="ss" value=""?>
                            <input type=hidden id="cost" name="cost" value="">
                        </form>
                            <button id="btnCheckout" name="btnCheckout" type="submit" form="myform" class="btn btn-primary"> Check out </button>
                       
                    </div>
            </div>
        </body>
        <script language="javascript">
            
            
            
            
            window.onload=checkSeats();
                
   
            </script>
</html>
<?php
}

?>
			
