
<?php 
session_start();
?>

<?php 

include("db_connect.php");
if(isset($_COOKIE['adminname'])&&$_COOKIE['Aacct']){	
//	$userid=$_COOKIE['adminid'];
//$useremail=$_COOKIE['adminemail'];
	 
}else{
	// header('location:../index.php');
    //  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <title>Project Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../home/assets/images/favicon.ico">
        <!-- App css -->
        <link href="../home/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="../home/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="../home/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

        <script src="https://kit.fontawesome.com/537a489355.js" crossorigin="anonymous"></script>
      
        
<!-- //side nav css file -->

        <!---css for id --->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />


 <!-- js-->
<script src="admin/js/jquery-1.11.1.min.js"></script>
<script src="admin/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="admin/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="admin/js/metisMenu.min.js"></script>
<script src="admin/js/custom.js"></script>
<link href="admin/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
 <script src="script/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
 
 <!-- <script src="jquery.js"></script> -->    
<link href="css/animate.min.css" rel="stylesheet"/>   
      <link rel="stylesheet" href="css/bootstrap-dropdownhover.css">

   
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>      

   
   <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
   <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js'></script>
   <script src='https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js'></script>

      <script>
      
      $(document).ready(function() {
    $('#example').DataTable( {
        
        
    } );
        } );
      
      </script>
<script type="text/javascript"> 
            $(document).on("click", ".open-Delete", function () {
                                  var myValue = $(this).data('id');
                                        swal({
                                         title: "Are you sure?",
                                         text: "You want to remove this staff from the database!",
                                         type: "warning",
                                         showCancelButton: true,
                                        cancelButtonColor: "red",
                                        confirmButtonColor: "green",
                                        confirmButtonText: "Yes, remove!",
                                         cancelButtonText: "No, cancel!",
                                        closeOnConfirm: false,
                                        closeOnCancel: false,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                  	var vals=myValue;
                                               $.ajax ({
                                                      type : 'POST',
                                                      url: "upload.php",
                                                      data: { Valuedel: vals},
                                                      success: function(result) {
                                                      if(result=="ok"){
                                                                    swal({title: "Deleted!", text: "Staff has been deleted from the database.", type: "success"},
                                                          function(){ 
                                                                          location.reload();
                                                                          }
                                                                      );                               	                        
                                                                 }

                                                       }
                                                  }); } else {
	                                                           swal("Cancelled", "This user is safe :)", "error");
                                                          }
                                         });
                                       
                                       });
                </script>

<script type="text/javascript">
 $(document).on("click", ".open-Updatepicture", function () {
     var myTitle = $(this).data('id');
     $(".modal-body #bookId").val(myTitle);
     
}); 
 </script>
 	<!-- requried-jsfiles-for owl -->
									<!-- //requried-jsfiles-for owl -->
        <!-------end--->
    </head>
    <script type="text/javascript">
 $(document).on("click", ".open-Passwords", function () {
     
       var myT = $(this).data('id');
     var myTitle = $(this).data('ie');
       var myp = $(this).data('if');
       var mym = $(this).data('ig');
       var myn = $(this).data('ih');
       var myk = $(this).data('ij');
       var mykm = $(this).data('ik');
       
       
     $(".modal-title #oldname").val(myTitle);
       $(".modal-body #oldname").val(myTitle);
       $(".modal-body #oldpass").val(mykm);
     $(".modal-body #ss").val(myp);     
     $(".modal-body #bb").val(mym);
     $(".modal-body #cc").val(myn);
     $(".modal-body #dd").val(myk);
      $(".modal-body #staffid").val(myT); 
}); 
 </script>
<?php if(isset($_SESSION['memberadded'])){?>
 <script type="text/javascript"> 
 	          $(document).ready(function(){
 	          	                             swal({title: "Successful!", text: "Staff added successfully!!.", type: "success"});
                                  });
              </script>
            
           <?php 
	
		    }?>
		    <?php if(isset($_SESSION['memberexist'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "There is arleady a staff with those details in the database", "error");     				              
                               });
                </script>
           <?php 
       }  
           ?>
            <?php if(isset($_SESSION['emptytextboxes'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "You did not fill all the textboxes on the form", "error");     				              
                               });
                </script>
           <?php 
       	 }  
           ?>
           <?php if(isset($_SESSION['tutor'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){ 
                                    swal({
                                         title: "User removed successfully",
                                         text: "Do you want to remove another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="administrator.php?id=2";
                                                     } 
                                           else {
                                                        window.location ="administrator.php";
                                                 }
                                         });
                                         
                                                    });
                </script>
           <?php 
       	 }  
           ?>
           <?php if(isset($_SESSION['cat'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){    	
    				              sweetAlert("Oops...", "This category arleady in the system", "error");     				              
                               });
                </script>
           <?php 
       	  }  
           ?>
           <?php if(isset($_SESSION['category'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){ 
                                    swal({
                                         title: "Category added successfully",
                                         text: "Do you want to add another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="administrator.php?id=3";
                                                     } 
                                           else {
                                                        window.location ="administrator.php";
                                                 }
                                         });
                                         
                                                    });
       
                    </script>             
           <?php 
       	 }  
           ?>
           <?php if(isset($_SESSION['del'])){?>
                <script type="text/javascript"> 
            $(document).ready(function(){ 
                                    swal({
                                         title: "Category Deleted",
                                         text: "Do you want to delete another one?",
                                         type: "success",
                                         showCancelButton: true,
                                        confirmButtonColor: "green",
                                        confirmButtonText: "OK!",
                                        closeOnConfirm: true,
                                        closeOnCancel: true,
                                          buttonsStyling: false
                                        },
                     function(isConfirm){
                                      if (isConfirm) {                                      	
                                                         window.location ="administrator.php?id=4";
                                                     } 
                                           else {
                                                        window.location ="administrator.php";
                                                 }
                                         });
                                         
                                                    });
       
                </script>
           <?php 
       	  }  
           ?>
 


 
 <?php if(isset($_SESSION['pass'])) {?>
<script type="text/javascript"> 
$(document).ready(function(){ 
   
 		                           swal({title: "Successful!", text: "Staff details edited!!.", type: "success"});

                               });
       
                    </script>
      <?php  }?>
      
      
      <?php   $sqlid ="SELECT * FROM idcard Order BY id DESC";
			       $ret = mysqli_query($db,$sqlid);				                
                     while($found = mysqli_fetch_array($ret))
	                 {
                       $idsx=$found['id'];
                     }
      
	  
	    

$sqluse ="SELECT * FROM Inorg ORDER BY id DESC ";
$retrieve = mysqli_query($db,$sqluse);
    while($foundk = mysqli_fetch_array($retrieve))
	     {
              $name = $foundk['name'];
		      $website= $foundk['website'];
              $phone= $foundk['Phone'];
              $year= $foundk['year'];
			  $mail= $foundk['email'];
			  $idz= $foundk['id'];
		 }	 

  ?>

 <div id="Taxreceipted" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	 PRINT IDs IN BULK
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	     <form action="printbulk.php" method="post">
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">From</span>
    <input id="text" type="number" class="form-control" name="startpoint" >
  </div>
  <div class="input-group" style="margin-bottom:10px">
    <span class="input-group-addon">To</span>
   <input type="number" class="form-control" name="endpoint" >
  </div>
  <div class="input-group">
    <span class="input-group-addon">ticket id starts @</span>
    <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo$idsx; ?>" readonly="readonly">
  </div>
  

      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" value="Submit" id="btns1" name="Change"> &nbsp;
      </div>
      </form> 
      </div>       
  </div>
  </div> 
 


<div id="Passwords" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-family: Times New Roman;color:#F0F0F0;"><center>
                   Edit details of <input style="border: none;background:#222d32" type="text" id="oldname" value="" readonly="readonly" />
	    	
        	</center></h4>
      </div>
      <div class="modal-body" >
        <center>
             
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	      <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;ቀን:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname" id='oldname'></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;የሰሌዳ ቁጥር:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname" id='ss'></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">የሾፌር ስም :<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="minstitution"  id='cc'></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	የሚሄድበት ቦታ:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mrank" id='dd'></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;መነሻ ሰአት:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="memail" id='bb'></span></p>
        	     <p ><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;መመለሻ ሰአት :<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mid" id='oldpass'></span></p>
        		Add profile picture:<input name='filed' type='file' id='filed' >
                <input type="hidden" name="page" id="staffid"/>                                                       	      		
           
        </center>
        
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Reset" id="amendreceipt" name="resetpass"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">        	        	
        	</h4>
      </div>
      <div class="modal-body" >
        <center><p></p>
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	<p style="margin-bottom:10px;">
        			Select picture<input name='file2' type='file' id='file2' >
           </p>  
           <p>
        	<input name='id' type='hidden' value='' id='bookId'>
        	<input name='category' type='hidden' value='Administrator'>
        	 <input type="hidden" name="page" value="users.php"/>                                                        	      		

           </p>     	      		
	                
        </center>
      </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Change" id="btns1" name="Change"> &nbsp;
                  
      </div>
      </div>
       </form>
  </div>
  </div>
 
 <div id="Useradd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	የመውጭያ ደረሰኝ መረጂያ ማስገቢያ
        	</center></h4>
      </div>

      <div class="modal-body" >       	
      	<center> 
        		<form method="post" action="upload.php" enctype='multipart/form-data' style="width: 98%;">        		

            	
      	        <p style="margin-bottom:10px;">  
        	      <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="pro">&nbsp;Pro&nbsp;&nbsp; &nbsp; &nbsp;</span>
        	    <span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="dr">&nbsp;Dr &nbsp; &nbsp;&nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mr">&nbsp;Mr &nbsp; &nbsp; &nbsp;&nbsp;</span>        		
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="mrs">&nbsp;Mrs &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
        		<span style="font-size: 15px; font-weight: bold;"><input type="checkbox" name="miss">&nbsp;Miss</span>
        		</p>
        		                                                           	      		
                 <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;ቀን:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mfname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp; &nbsp;የሾፌር ሙሉ ስም:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="msname"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">:<label style="color: red;font-size:20px;">የሰሌዳ ቁጥር *</label><input style="width:270px;" type="text" name="minstitution"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;የሚሄድበት ቦታ :<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="memail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;የወጣበት ሰአት:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mphone"></span></p>
        	     <p ><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp; &nbsp;&nbsp;መመለሻ ሰአት :<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="mpassword"></span></p>
        		መውጫ:<input name='filed' type='file' id='filed' >
                    
        		   <input type="hidden" name="page" value="idcard.php"/>                                                        	      		
         </center>
      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-success" value="Submit" id="addmember" name="addmember"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div> 
  
  <div id="Initialisation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	SYSTEM INFORMATION INITIALISATION
        	</center></h4>
      </div>
      	<form method="post" action="upload.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org Name:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgname"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgphone"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgemail"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Website:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgwebsite"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active Year:<label style="color: red;font-size:20px;">*</label><input style="width:270px;" type="text" name="orgyear"></span></p>
        	        Attach Organisation Logo:(<h7 style="color:red">Make sure it is a transparent image</h7>)<input name='filed' type='file' id='filed' >
                                   	 <input type="hidden" name="page" value="admin.php"/>                                                        	      		
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Finish" id="addmember" name="orginitial"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div>
  
 <div id="Initialisation2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" style="background:#222d32">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-weight: bold;color: #F0F0F0"><center>
        	EDIT SYSTEM INFORMATION
        	</center></h4>
      </div>
      	<form method="post" action="upload.php" enctype='multipart/form-data'>        		

      <div class="modal-body" >       	
      	<center> 
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;Org Name:<label style="color: red;font-size:20px;">*</label>
        			<input style="width:270px;" type="text" name="orgname" value="<?php if(isset($name)){echo$name;} ?>"></span></p>
        	    <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Phone:<label style="color: red;font-size:20px;">*</label>
        	    	<input style="width:270px;" type="text" name="orgphone" value="<?php if(isset($phone)){echo$phone;} ?>"></span></p>
        		<p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Email:<label style="color: red;font-size:20px;">*</label>
        			<input style="width:270px;" type="text" name="orgemail" value="<?php if(isset($mail)){echo$mail;} ?>"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">&nbsp; &nbsp;&nbsp;&nbsp;Website:<label style="color: red;font-size:20px;">*</label>
        	     	<input style="width:270px;" type="text" name="orgwebsite" value="<?php if(isset($website)){echo$website;} ?>"></span></p>
        	     <p style="margin-bottom:10px;"><span style="font-size: 18px; font-weight: bold;">Active Year:<label style="color: red;font-size:20px;">*</label>
        	     	<input style="width:270px;" type="text" name="orgyear" value="<?php if(isset($year)){echo$year;} ?>"></span></p>
        	                         	   Attach Organisation Logo:(<h7 style="color:red">Make sure it is a transparent image</h7>)<input name='filed' type='file' id='filed' >
                                          	      	 <input type="hidden" name="page" value="admin.php"/>                                                        	      		
                          	      	<input type="hidden" name="pageid" value="<?php echo$idz; ?>"/> 	
      	
         </center>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Update" id="addmember" name="orgupdate"> &nbsp;
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
      </div>
       </form>
  </div>
  </div> 
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "../home/rightsidebar.php" ?>
            <?php include "../driverid/leftsidemenu.php" ?>
            <div class="content-page">
                <div class="content">
                
<?php include "../home/topbar.php" ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 

	
                        <div class="charts my-5">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Driver</h4>
					<!-- start content_slider -->
	
					
					     <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
            	<th>ተ.ቁ</th>
                <th>ቀን እና ስም </th>
                <th>መመለሻ ሰዓት </th>
                <th>የወጣበት ሰዓት </th>              
                <th>የሰሌዳ ቁጥር</th>
                <th> የሚሄድበት ቦታ</th>           
                <th>PRINT</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
        	 <?php   $sqlmember ="SELECT * FROM idcard ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];$rank=$found['Rank'];
                       $id=$found['id'];$dept=$found['Department'];$contact=$found['Email'];
			                $count=$count+1;  $get_time=$found['Time']; $time=time(); $pass=$found['Staffid'];
			              $names=$firstname." ".$sirname;
					    	 
			      echo"<tr>    <td>$id</td>                                       
                             <td>$title , $firstname $sirname</td>        	
                             <td>$pass</td>
                             <td>$rank</td>
                             
			                 <td>$dept</td>
			                 <td>$contact</td>
			                 <td>
			                   <a  href='card.php?id=$id' class='btn my-2  btn-success' title='click to print report' ><span class='glyphicon glyphicon-print' style='color:white;'></span></a>
                              </td>
			                 <td>
			                   <a data-toggle='modal' data-id='$id' data-ie='$firstname'   data-if='$sirname' data-ig='$rank' data-ih='$dept' data-ij='$contact' data-ik='$pass' class='open-Passwords btn  btn-info' title='edit user details' href='#Passwords'><span class='glyphicon glyphicon-edit' style='color:white;'></span></a>
							 
			                 </td>				                 
			                 <td>
			                   <a data-id='$id'  class='open-Delete btn  btn-danger' title='delete user' ><span class='glyphicon glyphicon-trash' style='color:white;'></span></a>
							 
			                 </td>			 
                             </tr>"; 
					 
					 } 
		
		           	?>
            </tbody>
        
    </table>
                          
				        </div>
		
				</div>

					<!--//sreen-gallery-cursual---->
			</div>
	<!-- new added graphs chart js-->
 <script src="admin/js/Chart.bundle.js"></script>
    <script src="admin/js/utils.js"></script>
<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;			
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="admin/js/jquery.nicescroll.js"></script>
	<script src="admin/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- side nav js -->
	<script src='admin/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
		
	<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.js""> </script>
	<!-- //Bootstrap Core JavaScript -->
	 	<script src="css/bootstrap-dropdownhover.js"></script>
	

                       
 
<!--end -->

  
                     
                        <!-- end row-->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<!---footer--->
<?php include "../home/footer.php" ?>
<!---end--->
        </div>
        <!-- END wrapper -->

<!---right side bar--->

        <!-- bundle -->
        <script src="../home/assets/js/vendor.min.js"></script>
        <script src="../home/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="../home/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src=".../home/assets/js/pages/demo.dashboard-projects.js"></script>
        <!-- end demo js-->
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/614a5630d326717cb682aa33/1fg561c9f';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<!---end---bar-->


    </body>
</html>

