<?php 
session_start();
?>

<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "wachemo";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
	echo "Connection failed!";
}
// Include config file
//require_once "schedulle_conf.php";
 
// Define variables and initialize with empty values
$date     = $driverid    = $drivername     = $location     = $sideid  = $hospital =$sideid1 =$weakend =$sideid2= $table  = "";
$date_err = $driverid_err = $drivername_err =$location_err = $sideid_err = $hospital_err  =$sideid1_err =$weakend_err =$sideid2_err= $table_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate table
    $input_table = trim($_POST["tables"]);
    if(empty($input_table))
    {
        $table_err = "Please enter a table.";
    }
    
    else
    {
        $table = $input_table;
    }
    // Validate name
    $input_date = trim($_POST["date"]);
    if(empty($input_date))
    {
        $date_err = "Please enter a date.";
    }
    
    else
    {
        $date = $input_date;
    }

    // Validate position
    $input_driverid = trim($_POST["driverid"]);
    if(empty($input_driverid))
    {
        $driverid_err = "Please enter driver id.";
    }
    elseif(!($input_driverid))
    {
        $driverid_err = "Please enter a driver id .";
    }
    else
    {
        $driverid = $input_driverid;
    }

    // Validate office
    $input_drivername = trim($_POST["drivername"]);
    if(empty($input_drivername))
    {
        $drivername_err = "Please enter a driver name.";
    }
    elseif(!filter_var($input_drivername, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $drivername_err = "Please enter a driver name.";
    }
    else
    {
        $drivername = $input_drivername;
    }

    // Validate age
    $input_location = trim($_POST["location"]);
    if(empty($input_location))
    {
        $location_err = "Please enter location.";     
    } 
    
    else
    {
        $location = $input_location;
    }

    // Validate date
    $input_start_sideid = trim($_POST["sideid"]);
    if(empty($input_start_sideid))
    {
        $sideid_err = "Please enter the sideid.";     
    } 
   
    else
    {
        $sideid = $input_start_sideid;
    }
    
    // Validate salary
    $input_hospital = trim($_POST["hospital"]);
    if(empty($input_hospital))
    {
        $hospital_err = "Please enter the location .";     
    } 
   
    else
    {
        $hospital = $input_hospital;
    }
    
    //side1
    $input_sideid1 = trim($_POST["sideid1"]);
    if(empty($input_sideid1))
    {
        $sideid1_err = "Please enter the side id .";     
    } 
    
    else
    {
        $sideid1 = $input_sideid1;
    }
    
    // Validate salary

    $input_weakend = trim($_POST["weakend"]);
    if(empty($input_weakend))
    {
        $weakend_err = "Please enter the days  .";     
    } 
 
    else
    {
        $weakend = $input_weakend;
    }
    
    

    // Validate salary
    $input_sideid2 = trim($_POST["sideid2"]);
    if(empty($input_sideid2))
    {
        $sideid2_err = "Please enter the location .";     
    } 
   
    else
    {
        $sideid2 = $input_sideid2;
    }
    
    
    // Check input errors before inserting in database
    if(empty($date_err) && empty($driverid_err) && empty($drivername_err) && empty($location_err) && empty($sideid_err) && empty($hospital_err) && empty($sideid1_err)&& empty($weakend_err)&& empty($sideid2_err)&& empty($table_err) )
    {
        // Prepare an insert statement
        $sql = "INSERT INTO $table (date,weekoneid, driverid, drivername, location,codnum1 ,hospitalteregna ,codnum2 ,satandsund ,codnum3 ) VALUES (?,?,?,?,?,?,?,?,?,?)";
       
        if($stmt = mysqli_prepare($conn, $sql))
        {
            $week=$table;
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $date,$week,$driverid, $drivername, $location, $sideid, $hospital, $sideid1, $weakend,$sideid2);
            //set parametrs

            $date     =  $date ;
            $driverid    =$driverid ;
             $drivername  = $driverid ;
             $location  = $location; 
              $sideid  =$sideid;
            $hospital =$hospital;
               $sideid1 =$sideid1;
               $weakend =$weakend;
               $sideid2  = $sideid2;
               $week=$week;
            // Set parameters
            
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
             
                    // Display the alert box 
                   
                    $netfa=" data successfuly add $table";
             // echo "<script> swal('Good job!', 'You clicked the button!', 'success');</script>";
              //  header("location: crud.php");
                //exit();
            }
            else
            {
                $netfaError= "Error: " . $sql . "<br>" . $conn->error;
             //   echo "Something went wrong. Please try again later.";

            }
        }
         
        // Close statement
       // mysqli_stmt_close($stmt);
       
    }
    
    // Close connection
   // mysqli_close($conn);
   
}else{
   
    $name=$conn->query("SELECT * FROM driver "); 
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
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "../home/rightsidebar.php" ?>
            <?php include "../home/leftsidemenu.php" ?>
            <div class="content-page">
                <div class="content">
                
<?php include "../home/topbar.php" ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 


                       
 
<!--end -->

       <?php include "../monthly/crud.php" ?>
                     
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

