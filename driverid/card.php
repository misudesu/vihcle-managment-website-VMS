
<?php
session_start();
include("db_connect.php");
require "vendor/autoload.php";
if(!isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){ header('location:index.php');
      exit;}
	

$serial="0001";
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>card</title>
<style>
  body{
		  	background:#FFFFFF
		  }
#bg {
  width: 1000px;
  height: 420px;
 
  margin:27px;
 	float: left; 
 		
}

#id {
  width:270px;
  height:450px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #FFFFFF;
		  	border-radius: 2%;
			  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('images/logo.png');   /*if you want to change the background image replace logo.png*/
  background-repeat:repeat-x;
  background-size: 250px 450px;
  opacity: 0.2;
  z-index: -1;
  text-align:center;
 
}
.container{

		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:250px;
		  	height:450px;
		  	background: #FFFFFF;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:270px;
		  	border-radius:2%;
			  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;

		  	
		  }
</style>
	</head>
<?php 
include_once("db_connect.php");

$sqluse ="SELECT * FROM Inorg WHERE id=1 ";
$retrieve = mysqli_query($db,$sqluse);
    $numb=mysqli_num_rows($retrieve); 
	while($foundk = mysqli_fetch_array($retrieve))
	                                     {
                                              $profile= $foundk['pname'];
											  $name = $foundk['name'];
		                                  }
?>
	<body>
		<script type="text/javascript">	
 		

 </script>
 
      <div id="bg">
            <div id="id">
            	 <table>
        <tr> <td>
        	<?php if($numb!=0 ){
                                    if($profile!=""){echo"<img src='media/$profile'  width='70px' height='70px' alt=''>";}
									else{
										 echo"<img src='images/logo.png' alt='Avatar'  width='70px' height='70px'>";
									    }	   
                               }else{
			?>
        	<img src="images/logo.png" alt="Avatar"  width="70px" height="70px"> <?php }?>
        	</td>
        <td><h3><b>የመውጫ ደረሰኝ</b></h3></td>
       </tr>        
    </table><center>
        <?php  
     $idx = $_GET['id'];
      $sqlmember ="SELECT * FROM idcard WHERE id='$idx' ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];$rank=$found['Rank'];
                       $id=$found['id'];$dept=$found['Department'];$contact=$found['Email'];
			                $count=$count+1;  $get_time=$found['Time']; $time=time(); $pass=$found['Staffid'];
			              $names=$firstname." ".$sirname;
						  $profile= $found['Picname'];
					 }  	 

             	 	
             	 	if($profile!=""){          
										   echo"<img src='images/$profile' height='175px' width='200px' alt='' style='border: 2px solid black;'>";	   
									    }
								else{
									echo"<img src='admin/images/logo.jpg' height='175px' width='200px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>   </center>              <div class="container" align="center">
      
      	<p style="margin-top:2%">የሾፌር ስም</p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($names)){ $namez=$title.' '.$names;echo$namez;} ?></p>
      	<p style="margin-top:-4%">የሚሄድበት ቦታ </p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($rank)){ echo$rank;} ?></p>
       <p style="margin-top:-4%">መነሻ ሰአት:</p>
        <p style="font-weight: bold;margin-top:-4%"><?php if(isset($pass)){ echo$pass;} ?></p>
      	<p style="margin-top:-4%">የመኪናው ታርጋ :</p>
      	<p style="font-weight: bold;margin-top:-4%"><?php if(isset($dept)){ echo$dept;} ?></p>      	
      	<p style="margin-top:-4%">የሾፌር ፊርሚያ </p>
              
      </div>
            </div>
            <div class="id-1">
    	 
                     	 <center> <img src="images/logo.png" alt="Avatar" width="200px" height="175px" >        
       <div class="container" align="center">
      <p style="margin:auto">በዚህ መታወቅያ ላይ የሚትመለከቱት ሙሉ መረጃ በዋቸሞ ዩኒቨርሲት የውስጥ ክፍል የተረጋገጠ ነው </p>
      	<h2 style="color:#00BFFF;margin-left:2%">ዋቸሞ ዩኒቨርሲት  </h2>
      <p style="margin:auto">ይህ መውጫ የሚያገለግለው ለአንድ ጊዜ አገልግሎት ብቻ ነው </p>
        <hr align="center" style="border: 1px solid black;width:80%;margin-top:13%"></hr> 

      	<p align="center" style="margin-top:-2%">የፈቀደው አካል ፊርሚያ</p>
      		<p> <?php if(isset($code)){ echo$code;}?>
      			</p>
      		 <?php if(isset($name)){ echo"Property of ".$name;}?> </center>
     </div>
</div>

        </div>
	</body>
</html>
