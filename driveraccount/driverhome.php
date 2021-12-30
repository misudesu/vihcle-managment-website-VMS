
		   <?php
           session_start();
		 
           if (isset($_SESSION['id']) && isset($_SESSION['driveruser_name'])) {
			require_once "../config.php";
			   $driverids=$_SESSION['driveruser_name'];
			   $divid='';
			   $sql=$conn->query("SELECT * FROM trip ");
			   if($sql->num_rows>0){
				while($row = $sql->fetch_assoc()){
					$divid=$row['divID'];
					if($divid=$driverids){
$seen=$row['seen'];
					}else{
						header("location: home/logout.php");
						exit;
					}
				  
				}
				}
			$alart="SELECT * FROM alart WHERE status='new' ";
				

                    $limit1 = 5;  
					if (isset($_GET["page"])) {
					  $page  = $_GET["page"]; 
					  } 
					  else{ 
					  $page=1;
					  };  
					$start_from = ($page-1) * $limit1;  
					$query= mysqli_query($conn,"SELECT * FROM trip  ORDER BY id DESC LIMIT $start_from, $limit1 ");         
				  
								  
			   
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
    </head>

    <body class="loading"   data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "../driveraccount/home/rightsidebar.php" ?>
            <?php include "../driveraccount/home/leftsidemenu.php" ?>
            <div class="content-page">
                <div class="content">
                
<?php include "../driveraccount/home/topbar.php" ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 


                       
<div id="content" class=" p-md-1 " >
<?php 
			if($result = mysqli_query($conn, $alart))
 {
     if(mysqli_num_rows($result) > 0)
     {
            while($row = mysqli_fetch_array($result)):
				
            ?>
		<div class="alert <?=$row['colore'] ?> alert-dismissible  fade show" role="alert">
			<span class="alert-icon"><i class="ni ni-like-2"></i></span>
	
			<span class="alert-text"><strong><?=  $row['title'] ?>!</strong> <?=$row['Activity'] ?>! <br></span>
			<span> Date:<?=$row['start']?></span>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times; </span>
			</button>
		</div>
		<?php
                       endwhile;   
                     echo "  <hr> ";
                       mysqli_free_result($result);
                      }
                      else
                      {
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                  }
                  else
                  {
                      echo "ERROR: Could not able to execute $alart. " . mysqli_error($conn);
                  }

                  // Close connection
                //  mysqli_close($connection);
                                    ?>
	
		</div>
			<div  >
			   
		   
				 <div >
					<div class="row mt-4">
						<div class="col-md-12">
			 
							<!----message start -->
							
						   
							<div class="card card-body">
								   
							   <div class="container-fluid py-4">
								   <div class="row">
									 <div class="col-12">
									   <div class="card mb-4">
										 <div class="card-header pb-0">
										   <h6>message</h6>
										 </div>
										 <div class="card-body px-0 pt-0 pb-2">
										   <div class="table-responsive p-0">
										   <input class="form-control" id="myInput" type="text" value="new" placeholder="Search..">
											   <!--table start-->
											   <table class="table align-items-center mb-0">
											   <thead>
												 <tr>
												   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
												   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Event Title</th>
												   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
												   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RegistrationDeadline</th>
												   <th class="text-secondary opacity-7"></th>
												 </tr>
											   </thead>
											   <tbody id="myTable">
								<?php
  // Check if username is empty
  if($divid==$driverids){
	
 
	
  
   



	
     while($row = $query->fetch_assoc()):
		 
       $fornkey=$row['divID'];
       if($fornkey==$driverids){
		   $id=$row['id'];
		$EventTitle=$row['EventTitle'];
		$StartDate=$row['StartDate'];
		$StartTime=$row['StartTime'];
		$EndDate=$row['EndDate'];
		$EndTime=$row['EndTime'];
		$RegistrationDeadline=$row['RegistrationDeadline'];
		$Timezone=$row['Timezone'];
		$startLocation=$row['startLocation'];
		$endLocation=$row['endLocation'];
		$city=$row['City'];
		$State=$row['State'];
		$Country=$row['Country'];
		$Description=$row['Description'];
		$driverID=$row['divID'];
		$carID=$row['carID'];
     ?>

											
												 <tr>
												   <td>
													
														 <h6 class="mb-0 text-sm">Distribution</h6>
														 <p class="text-xs text-secondary mb-0">Organization</p>
													 
												   </td>
												   <td>
													 <p class="text-xs font-weight-bold mb-0"><?php echo $EventTitle; ?></p>
												
												   </td>
												   <td class="align-middle text-center text-sm">
													 <span class="badge badge-sm bg-danger"  id="color"><?php echo $row['seen'] ?></span>
												   </td>
												   <td class="align-middle text-center">
													 <span class="text-secondary text-xs font-weight-bold"><?php echo $RegistrationDeadline; ?></span>
												   </td>
												   <td class="align-middle">
												   <a href="../driveraccount/process.php?open=<?php echo $id;?>">  <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >seen</button>
	   </a>  
												
												 <a >  <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#<?php echo $EventTitle.$id; ?>">Open</button></a>  
												</td>
												 </tr>
												
												 
<!-- Modal -->
<div class="modal fade" id="<?php echo $EventTitle.$id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $EventTitle; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		  <div class="row" >
			  <div class="cal col-md-4 col-lg-4" >
				  <section>
       <p>Start Date: <?php echo"$StartDate" ?></p>
	   <p>Start Time: <?php echo"$StartTime" ?></p>
    <p>End Date:<?php echo"$EndDate" ?></p> 
	<p>End Time:<?php echo"$EndTime" ?></p> 
	</section>
	</div>
	<div class="cal col-md-4 col-lg-4">
		<section >
<p>Registration Dead line:<?php echo"$RegistrationDeadline" ?></p>	
<p>Time zone:<?php echo"$Timezone" ?></p>
<p>startLocation:<?php echo"$startLocation" ?></p>
<p>endLocation:<?php echo"$endLocation" ?></p>
</section>
</div>
<div class="cal col-md-4 col-lg-4"> <section class="section">
<p>city:<?php echo"$city" ?></p>
<p>State:<?php echo"$State" ?></p>
<p>Country:<?php echo"$Country" ?></p>
<p>carID:<?php echo"$carID" ?></p>
</section></div>
</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
	
	

<?php }
endwhile;
 } 
?>
											   </tbody>
											 </table>
											 <!--tabel end-->
											 <?php   $result_db1 = mysqli_query($conn,"SELECT COUNT(id) FROM trip");
$row_db1 = mysqli_fetch_row($result_db1);  
$total_records1 = $row_db1[0];  
$total_pages1 = ceil($total_records1 / $limit1); 
/* echo  $total_pages; */
$pagLink1 = "<ul class='pagination'>";  
for ($ii=1; $ii<=$total_pages1; $ii++) {

              $pagLink1 .= "<li class='page-item'><a class='page-link' href='../driveraccount/driverhome.php?page=".$ii."'>".$ii."</a></li>";	

            }

echo $pagLink1 . "</ul>";  
?>
										   </div>
										 </div>
									   </div>
									 </div>
								   </div>
					   
								   
								 </div>
					   
						   </div>
						   <!---end of message-->
				   
					  </div>
					 
				</div>
			  </div> 
		
      </div>
	 
<!---end--->
        </div>
 
<!--end -->

      
                     
                        <!-- end row-->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
<?php include "../driveraccount/home/footer.php"?>
<!---footer--->
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

<script>
			
			

		  </script>
    </body>
   
		  <script>
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });
              </script>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>