<?php 
session_start();
include("db_connect.php");

if(isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){
$adminid = $_COOKIE['adminid'];
$adminemail = $_COOKIE['adminemail'];

$sqluser ="SELECT * FROM Administrator WHERE Password='$adminid' && Email='$adminemail'";

$retrieved = mysqli_query($db,$sqluser);
    while($found = mysqli_fetch_array($retrieved))
	     {
              $firstname = $found['Firstname'];
		      $sirname= $found['Sirname'];
              $id= $found['id'];
		 }	   
 }else{
	 header('location:index.php');
      exit;
}
	

if(isset($_GET['ids'])) 
          {	           
			  $id=$_GET['ids'];
              $query = "SELECT Name,Type,Size,content FROM Files WHERE id='$id' ";         
         $result = mysqli_query($db,$query) or die('Error, query failed');		 
     list($name, $type, $content) = mysqli_fetch_array($result);
	       $path = 'media/'.$name;
		   $size = filesize($path);
	     header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header("Content-length:". $size);
         header("Content-type:". $type);
         header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
		 header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
     ob_clean();
       flush();
	       readfile('media/'.$name);	
             
                exit;      
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

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
             
             
             <!-- //the next plugin link below are for date --> 
              <!-- //the next plugin link below are for date --> 
              <link rel="stylesheet" href="css/zebra_datepicker.min.css" type="text/css">
      

      <!-- Bootstrap Core CSS -->
      <link href="admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
      
      <!-- Custom CSS -->
      
      <link href="admin/css/style.css" rel='stylesheet' type='text/css' />
      
      
      <!-- font-awesome icons CSS -->
      <link href="admin/css/font-awesome.css" rel="stylesheet"> 
      <!-- //font-awesome icons CSS-->
      
      
   
       <!-- js-->
      <script src="admin/js/jquery-1.11.1.min.js"></script>
      <script src="admin/js/modernizr.custom.js"></script>
      
      <!--webfonts-->
      <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
      <!--//webfonts--> 
      
      
      <!-- Metis Menu -->
      <script src="admin/js/metisMenu.min.js"></script>
      <script src="admin/js/custom.js"></script>
      <link href="admin/css/custom.css" rel="stylesheet">
      <!--//Metis Menu -->
       <script src="script/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="script/sweetalert.css">
       <!-- //the links below are for date plugin -->
       <script src="script.js"></script>
         
    
    </head>
       
<?php if(isset($_SESSION['Import'])) {?>
<script type="text/javascript">  

 $(document).ready(function(){ 
                                    swal({
                                         title: "Successfully",
                                         text: "File uploaded successfully",
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
                                                         window.location ="admin.php";
                                                     } 
                                           else {
                                                        window.location ="bulk.php";
                                                 }
                                         });
                                         
                                                    });
                   
                    </script> 
<?php  session_destroy(); }?> 


 
 <script type="text/javascript">
 
 $(document).on("click", ".Open-Enumeration", function () {

        				$(".modal-body #Enumeration").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
					setTimeout(' window.location.href = "update_payer.php"; ',3000);
		
});  


 $(document).on("click", ".Open-groups", function () {

        				$(".modal-body #groupss").html('<img src="ajax-loader.gif" /> &nbsp;REDIRECTING PLEASE WAIT ...');
					setTimeout(' window.location.href = "groups_.php"; ',3000);
		
});
 </script>
<div id="Updatepanel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body" > 
      	   	
                		
         <!-- <a id='Taxreceipt' href="#" style="width:100%;font-size: 15px;" class="btn btn-success">
            <span class="glyphicon glyphicon-move" style="color:black;font-size: 28px;"></span>Enumeration Max update with Tax payers details</a>
      -->
         		
        <a id='Enumeration' href="#" style="width:100%;font-size: 15px;" class="Open-Enumeration btn btn-success">
           <span class="glyphicon glyphicon-map-marker" style="color:#00ACED;font-size: 28px;"></span>Update Actual Enumeration by Selecting Actual Tax Payer</a>
       
              		
         <a id='groupss' href="#" style="width:100%;font-size: 15px;" class="Open-groups btn btn-success">	
          <span class="glyphicon glyphicon-magnet" style="font-size: 28px;"></span>Update Enumeration Data Based on Group</a>
        
      </div>
      <div class="modal-footer">
      </div>
      </div>       
  </div>
  </div> 
  
<div id="Updatepicture" class="modal fade" role="dialog">
  <div class="modal-dialog" style="float:right;width:20%">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">        	        	
        	</h4>
      </div>
      <div class="modal-body" >
        <center><p></p>
        	<form method="post" action="upload.php" enctype='multipart/form-data'>        		
            
        	<p style="margin-bottom:10px;">
        			Select picture<input name='file' type='file' id='file' >
           </p>  
           <p>
        	<input name='id' type='hidden' value='' id='bookId'>
        	<input name='category' type='hidden' value='User'>

           </p>     	      		
	                
        </center>
      </div>
      <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Change" id="btns1" name="bulk"> &nbsp;
                  
      </div>
      </div>
       </form>
  </div>
  </div>
<script type="text/javascript">
 $(document).on("click", ".Open-Taxreceipt", function () {

        				$(".modal-body #Taxreceipt").html('<img src="ajax-loader.gif" /> &nbsp;LOADING PLEASE WAIT ...');
					setTimeout(' window.location.href = "tax_receipts.php"; ',3000);
		
});    
 </script>
  <div id="Taxreceipts" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="font-size: 14px; font-family: Times New Roman;color:black;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>

      <div class="modal-body" >       	
      	<center>        		
        		                                                           	      		
           <a id='Taxreceipt' href="#" style="width:90%;font-size: 24px;" class="Open-Taxreceipt btn btn-success">CLICK TO PROCEED TO TAX RECEIPTS</a>
         </center>
      </div>
      <div class="modal-footer">
      </div>
      </div>       
  </div>
  </div> 
    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "../home/rightsidebar.php" ?>
            <?php include "leftsidemenu.php" ?>
            <div class="content-page">
                <div class="content">
                
<?php include "../home/topbar.php" ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 


                       	<!-- header-starts -->
	
		<!-- //header-ends -->
		<!-- main content start-->
		<div id=""  >
			<div class="main-page my-5" style="margin-top:3%">
			
			
			</div>
			<div class="charts" >
			<div class="mid-content-top charts-grids">
				
				<div class="middle-content" >
						<h4 class="title">
                           
						</h4>
					<!-- start content_slider -->
					          
                                     
                                   
            				      
            				      		<div class="middle-content">
					
					     <table id="example" class="display nowrap" >
        <thead>
            <tr>
                <th>Bulk registration upload from Excel</th>
                             
                <th>&nbsp;</th>
                 
               <?php
            				                                      
		           echo"<th><a href='bulk.php?ids=1'> <i class='fa fa-download'></i></a>&nbsp;<a href='groups_.php'> <i class='fa fa-refresh'></i></a>&nbsp;<a href='administrator.php'> <i class='fa fa-close'></i></a></th>";										             			 	
				                        
		         ?>  
        
            </tr>
        </thead>
        <tbody>      	

        </tbody>
        
    </table>

				                       
                                  
                              </div>					
			   </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class="charts" >
			<div class="mid-content-top charts-grids">
				
				<div class="alert alert-success">
                             <i class="fa fa-info-circle"></i>&nbsp;Ensure that the file upload is in CSV Format Otherwise it will not save
                              </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class="charts" >		
			<div class="mid-content-top charts-grids" style="background-color:#00ACED">
				<div class="middle-content" >
						<h4 class="title">
                            <i class="fa fa-info-circle"></i>&nbsp;Steps to save the file!

						</h4>
					<!-- start content_slider -->
					     <div class="container">
					     	<ol>
					     		<li>Download the sample file format below  on the mail icon or on top of the to the right corner of this page on a downoad icon</li>
					     		<li>Fill the employee details in the columns of the file</li>
					     		<li>Save the file as CSV not as xls </li>
					     		<li>Upload the file</li>
					        </ol>
                        </div>
                        SAMPLE FORMAT&nbsp;<a href='bulk.php?ids=1'><i class="fa fa-envelope"></i></a>&nbsp;Note:The web as file type will only be noted on excel files download from this application

					
			   </div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
		<div class="charts" >		
			<div class="mid-content-top charts-grids" >
				
						
					<!-- start content_slider -->
					      

        <form method="post" action="upload.php" enctype='multipart/form-data'>        		
           <p style="margin-bottom:10px;">
               <input id="datepicker-starting-view" type="date" class="form-control" data-zdp_readonly_element="false" placeholder="Select Submission Date" name="sbd" style='width:255px;'>  
           </p>  
             				                           
            				                           <p style="margin-bottom:10px;">
        			
           </p> 
        	<p style="margin-bottom:10px;">
        			<input name='file' type='file' id='file' >
           </p>  
          
          <button class="btn btn-success" name="bulk" id="btns3" >&nbsp;       		 
       		 <span class="glyphicon glyphicon-import" style="color: #F0F0F0"> </span> &nbsp;Import </button>
       	 
      
      
       </form>
                           

					
			   
					<!--//sreen-gallery-cursual---->
			</div>
		</div>
	
	
	
	
		
			
				
		
		
				</div>
		</div>
                       
 
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

<!-- //for index page weekly sales java script -->
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
	<!-- //side nav js -->
	
		<!-- //for index page weekly sales java script -->
		
<!-- // the two links below are for date picker calendar -->
   <script type="text/javascript" src="js/zebra_datepicker.min.js"></script>        
        <script type="text/javascript" src="js/examples.js"></script>
<!-- //the link below used for form slidng on click -->
 <script  src="js/index.js"></script>
	
	 <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.js"> </script>
	  <!-- //Bootstrap Core JavaScript -->
	 

    </body>
</html>

