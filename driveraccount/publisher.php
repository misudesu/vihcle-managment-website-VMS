<?php 
session_start();
?>

<?php 
 require_once "../config.php";
                   
                            
 $sql = "SELECT * FROM megazin WHERE who='publisher'";

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
        <link rel="stylesheet" href="../home/assets/css/theme.min.css">
    <link rel="stylesheet" href="../home/assets/css/user.min.css">
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
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


                       
 
<!--end -->
<div id="content" class="p-4 p-md-5 pt-5 ">
    <div class=" h-100 h-xxl-auto mt-xxl-3 my-3  mb-4 p-5 mx-4" >
        <div class="card-header d-flex flex-between-center bg-light py-2">
          <h6 class="mb-0">Shared Files</h6><a class="py-1 fs--1 font-sans-serif" href="#!">Annual Report</a>
        </div>
        <div class="card pb-0">
         
        <?php
 if($result = mysqli_query($conn, $sql))
 {
     if(mysqli_num_rows($result) > 0)
     {
            while($row = mysqli_fetch_array($result)):
            
            ?>
         
         
          <hr class="bg-200">
          <div class="d-flex mb-3 hover-actions-trigger align-items-center">
            <div class="file-thumbnail"><img class="img-fluid" src="../image/<?=$row['file'] ?>" alt=""></div>
            <div class="ms-3 flex-shrink-1 flex-grow-1">
              <h6 class="mb-1"><a class="stretched-link text-900 fw-semi-bold" href="#!"><?=$row['name'] ?></a></h6>
              <div class="fs--1"><span class="fw-semi-bold"><?=$row['who'] ?></span><span class="fw-medium text-600 ms-2"><?=$row['date'] ?></span></div>
              <div class="hover-actions end-0 top-50 translate-middle-y"><a class="btn btn-light border-300 btn-sm me-1 text-600" data-bs-toggle="tooltip" data-bs-placement="top" title="" href="../file/<?= $row['file']?>" download="download" data-bs-original-title="Download" aria-label="Download"><img src="/img/download (3).svg" alt="" width="15">download</a></div>
            </div>
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
                      echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                  }

                  // Close connection
                //  mysqli_close($connection);
                                    ?>


        </div>
      </div>
    <!---end of anual report-->
    </div>
       
                     
                        <!-- end row-->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<!---footer--->
<?php include "../driveraccount/home/footer.php" ?>
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

