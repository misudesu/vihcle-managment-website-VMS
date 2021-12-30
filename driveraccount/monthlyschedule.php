<?php 
session_start();
?>

<?php
                        // Include config file
                        require_once "../config.php";
                   
                            
                            $sql = "SELECT * FROM weekone";
                            $weektwo = "SELECT * FROM weektwo";
                            $weekthree = "SELECT * FROM weekthree";
                            $weekfour = "SELECT * FROM weekfour";
                        
                        // Attempt select query execution
                       
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
      <link rel="stylesheet" href="../home/assets/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/537a489355.js" crossorigin="anonymous"></script>
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


                        <header class="clearfix">
      <div id="logo" >
        <img src="../driverid/images/logo.png" >
      </div>
      <h1> ሳምንታዊ ስምሪት </h1>
      <div id="company" class="clearfix">
       
    </header>
    <main>
     
    
  
      <table class="table">
        <h3>ሳምንት አንድ  </h3>
    
        <thead class="thead">
          <tr>
         
            <th>የጊዜ ሰሌዳ </th>

<th >የሹፌር ስም</th>
<th >ሳምንታዊ መስመር </th>
<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ሆስፒታል ተረኛ </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-secondary opacity-7"> ቅዳሜና እሁድ ተረኛ</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
          </tr>
        </thead>
        <tbody class="tbody">
              <?php
 if($result = mysqli_query($conn, $sql))
 {
     if(mysqli_num_rows($result) > 0)
     {
            while($row = mysqli_fetch_array($result)):
            
            ?>
            <tr>
          
                <td><?= $row['date'] ;?></td>           
              
                <td><?= $row['drivername'] ;?></td>
                <td><?= $row['location'] ;?></td>
                <td><?= $row['codnum1']; ?></td>
                <td><?= $row['hospitalteregna'] ;?></td>
                <td><?= $row['codnum2']; ?></td>
                <td><?= $row['satandsund']; ?></td>
                <td><?= $row['codnum3']; ?></td>
               
          </tr>
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
         
          <tr>
            <td class="service"></td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td class="qty"></td>
            <td class="total"></td>
          </tr>
        
        
        </tbody>
      </table>

      <table class="table">
        <h3>ሳምንት ሁለት  </h3>
    
        <thead>
          <tr>
         
            <th>የጊዜ ሰሌዳ </th>

<th >የሹፌር ስም</th>
<th >ሳምንታዊ መስመር </th>
<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ሆስፒታል ተረኛ </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-secondary opacity-7"> ቅዳሜና እሁድ ተረኛ</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
          </tr>
        </thead>
        <tbody>
              <?php
 if($re = mysqli_query($conn, $weektwo))
 {
     if(mysqli_num_rows($re) > 0)
     {
            while($row = mysqli_fetch_array($re)):
            
            ?>
            <tr>
          
                <td><?= $row['date'] ;?></td>           
              
                <td><?= $row['drivername'] ;?></td>
                <td><?= $row['location'] ;?></td>
                <td><?= $row['codnum1']; ?></td>
                <td><?= $row['hospitalteregna'] ;?></td>
                <td><?= $row['codnum2']; ?></td>
                <td><?= $row['satandsund']; ?></td>
                <td><?= $row['codnum3']; ?></td>
               
          </tr>
          <?php
                       endwhile;   
                     echo "  <hr> ";
                       mysqli_free_result($re);
                      }
                      else
                      {
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                  }
                  else
                  {
                      echo "ERROR: Could not able to execute $weektwo. " . mysqli_error($conn);
                  }

                  // Close connection
                 // mysqli_close($connection);
                                    ?>
       
        </tbody>
      </table>
      <table class="table">
        <h3>ሳምንት ሦስት  </h3>
    
        <thead>
          <tr>
         
            <th>የጊዜ ሰሌዳ </th>

<th >የሹፌር ስም</th>
<th >ሳምንታዊ መስመር </th>
<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ሆስፒታል ተረኛ </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-secondary opacity-7"> ቅዳሜና እሁድ ተረኛ</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
          </tr>
        </thead>
        <tbody>
              <?php
 if($res = mysqli_query($conn, $weekthree))
 {
     if(mysqli_num_rows($res) > 0)
     {
            while($row = mysqli_fetch_array($res)):
            
            ?>
            <tr>
          <td><?= $row['date'] ;?></td>           
               <td><?= $row['drivername'] ;?></td>
                <td><?= $row['location'] ;?></td>
                <td><?= $row['codnum1']; ?></td>
                <td><?= $row['hospitalteregna'] ;?></td>
                <td><?= $row['codnum2']; ?></td>
                <td><?= $row['satandsund']; ?></td>
                <td><?= $row['codnum3']; ?></td>
         </tr>
          <?php
                       endwhile;   
                     echo "  <hr> ";
                       mysqli_free_result($res);
                      }
                      else
                      {
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                  }
                  else
                  {
                      echo "ERROR: Could not able to execute $weekthree. " . mysqli_error($conn);
                  }

                  // Close connection
               //   mysqli_close($connection);
                                    ?>
         
         
        </tbody>
      </table>
      <table class="table">
        <h3> ሳምንት አራት  </h3>
    
        <thead>
          <tr>
         
            <th>የጊዜ ሰሌዳ </th>

<th >የሹፌር ስም</th>
<th >ሳምንታዊ መስመር </th>
<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ሆስፒታል ተረኛ </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
            <th class="text-secondary opacity-7"> ቅዳሜና እሁድ ተረኛ</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ኮድ (የጎ/ቀጥር)</th>
          </tr>
        </thead>
        <tbody>
              <?php
 if($rese = mysqli_query($conn, $weekfour))
 {
     if(mysqli_num_rows($rese) > 0)
     {
            while($row = mysqli_fetch_array($rese)):
            
            ?>
            <tr>
          
                <td><?= $row['date'] ;?></td>           
              
                <td><?= $row['drivername'] ;?></td>
                <td><?= $row['location'] ;?></td>
                <td><?= $row['codnum1']; ?></td>
                <td><?= $row['hospitalteregna'] ;?></td>
                <td><?= $row['codnum2']; ?></td>
                <td><?= $row['satandsund']; ?></td>
                <td><?= $row['codnum3']; ?></td>
               
          </tr>
          <?php
                       endwhile;   
                     echo "  <hr> ";
                       mysqli_free_result($rese);
                      }
                      else
                      {
                          echo "<p class='lead'><em>No records were found.</em></p>";
                      }
                  }
                  else
                  {
                      echo "ERROR: Could not able to execute $weekfour. " . mysqli_error($conn);
                  }

                  // Close connection
                 // mysqli_close($connection);
                                    ?>
         
       
        
        </tbody>
      </table>
    
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice"></div>
    </div>
    </main>
          
<!--end -->

                     
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

