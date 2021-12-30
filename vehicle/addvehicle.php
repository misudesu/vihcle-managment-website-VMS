<?php 
session_start();
?>

<?php

// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$gov = $model     = $chansi     = $mid     = $cc    = $price   =$year =$carid =$year =$carid =$fueltype =$loads =$bookid =$location=$cartaype= $photo= "";
$gov_err = $model_err = $chansi_err = $mid_err = $cc_err = $price_err = $year_err = $carid_err = $year_err = $carid_err = $location_err=$cartaype_err=$fueltype_err =$loads_err = $bookid_err =$photo_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    $input_gov = trim($_POST["gov"]);
    if(empty($input_gov))
    {
        $gov_err = "Please enter a name.";
    }
  
    else
    {
        $gov = $input_gov;
    }

    // Validate model
    $input_model = trim($_POST["model"]);
    if(empty($input_model))
    {
        $model_err = "Please enter a position.";
    }
  
    else
    {
        $model = $input_model;
    }
    ///
    //cartapye
    $input_cartype = trim($_POST["cartype"]);
    if(empty($input_cartype))
    {
        $cartaype_err = "Please enter a position.";
    }
  
    else
    {
        $cartaype = $input_cartype;
    }
//location
$input_location = trim($_POST["location"]);
if(empty($input_location))
{
    $location_err = "Please enter a car status or location.";
}

else
{
    $location = $input_location;
}

    // Validate chansi
    $input_chansi = trim($_POST["chansi"]);
    if(empty($input_chansi))
    {
        $chansi_err = "Please enter a office.";
    }
   
    else
    {
        $chansi = $input_chansi;
    }

    // Validate id
    $input_mid = trim($_POST["mid"]);
    if(empty($input_mid))
    {
        $mid_err = "Please enter the age.";     
    } 
   
    else
    {
        $mid = $input_mid;
    }

    // Validate cc
    $input_cc = trim($_POST["cc"]);
    if(empty($input_cc))
    {
        $cc_err = "Please enter the start date.";     
    } 
    else
    {
        $cc = $input_cc;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price))
    {
        $price_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $price = $input_price;
    }
    
    // Validate year 
    $input_year = trim($_POST["year"]);
    if(empty($input_year))
    {
        $year_err = "Please enter the start date.";     
    } 
    else
    {
        $year = $input_year;
    }
    
    // Validate carid
    $input_carid = trim($_POST["carid"]);
    if(empty($input_carid))
    {
        $carid_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $carid = $input_price;
    }
    // Validate fueltype
    $input_fueltype = trim($_POST["fueltype"]);
    if(empty($input_fueltype))
    {
        $fueltype_err = "Please enter the salary amount.";     
    } 
  
    else
    {
        $fueltype = $input_fueltype;
    }

    // Validate load
    $input_loads = trim($_POST["loads"]);
    if(empty($input_loads))
    {
        $loads_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $loads = $input_loads;
    }

    // Validate bookid 
    $input_bookid = trim($_POST["bookid"]);
    if(empty($input_bookid))
    {
        $bookid_err = "Please enter the salary amount.";     
    } 
 
    else
    {
        $bookid= $input_bookid;
    }
    // Validate photo
    $input_photo = trim($_FILES['photo']['name']);   
   
$tm=trim($_FILES['photo'] ['tmp_name']);
    if(empty($input_photo))
    {
        $photo_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $photo = $input_photo;

    }
    // Check input errors before inserting in database
    if(empty($gov_err) && empty($model_err) && empty($chansi_err) && empty($mid_err) && empty($cc_date_err) && empty($price_err) &&empty($year_err) &&empty($carid_err)&&empty($fueltype_err)&&empty($loads_err)&&empty($bookid_err)&&empty($photo_err)&&empty($location_err)&&empty($cartaype_err))
    {
        move_uploaded_file($tm,"../file/".$input_photo);
        // Prepare an insert statement 
        $sql = "INSERT INTO vehicle (gov, model, chansi, mid, cc, price,year,carid,fueltype,loads,bookid,location,cartype,photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssss", $gov, $model, $chansi, $mid, $cc, $price,$year,$carid,$fueltype,$loads,$bookid,$location,$cartaype,$photo);
            
            // Set parameters
            $gov    = $gov;
            $model  = $model;
            $chansi = $chansi;
            $mid     = $mid;
            $cc     = $cc;
            $price  = $price;
            $year   = $year;
            $carid  = $carid;
            $fueltype  = $fueltype;
            $loads      = $loads;
            $bookid    = $bookid;
            $photo     = $photo;
            $location=$location;
            $cartaype=$cartaype;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../vehicle/vehicle.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        
         
     
        }
           // Close statement
           mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
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

                        

<div class="container-fluid mt-5 my-7 p-2">
                <!-- start page title -->
 <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group col-6 <?= (!empty($gov_err)) ? 'has-error' : ''; ?>">
                            <label>የመንግስት መስርያ ቤቱ  ስም</label>
                            <input type="text" name="gov" class="form-control" value="<?= $gov; ?>">
                            <span class="help-block"><?= $gov_err;?></span>
                        </div>
                        <div class="form-group col-6 <?= (!empty($model_err)) ? 'has-error' : ''; ?>">
                            <label>የተሽከርካሪዉ ሞዴል</label>
                            <input type="text" name="model" class="form-control" value="<?= $model; ?>">
                            <span class="help-block"><?= $model_err;?></span>
                        </div>
                        <div class="form-group col-6 <?= (!empty($chansi_err)) ? 'has-error' : ''; ?>">
                            <label>የቻንሲ ቁጥር</label>
                            <input type="text" name="chansi" class="form-control" value="<?= $chansi; ?>">
                            <span class="help-block"><?= $chansi_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($mid_err)) ? 'has-error' : ''; ?>">
                            <label>የሞተር ቁጥር</label>
                            <input type="text" name="mid" class="form-control" value="<?= $mid; ?>">
                            <span class="help-block"><?= $mid_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($cc_err)) ? 'has-error' : ''; ?>">
                            <label>ሲሲ</label>
                            <input type="text" name="cc" class="form-control" value="<?= $cc; ?>">
                            <span class="help-block"><?= $cc_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>የተገዛበት ዋጋ</label>
                            <input type="number" name="price" class="form-control" value="<?= $price; ?>">
                            <span class="help-block"><?= $price_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($year_err)) ? 'has-error' : ''; ?>">
                            <label>የተገዛበት ቀንና አ.ም</label>
                            <input type="date" name="year" class="form-control" value="<?= $year; ?>">
                            <span class="help-block"><?= $year_err;?></span>
                        </div>


                        <div class="form-group col-6 <?= (!empty($carid_err)) ? 'has-error' : ''; ?>">
                            <label>የሰሌዳ ቁጥር</label>
                            <input type="text" name="carid" class="form-control" value="<?= $carid; ?>">
                            <span class="help-block"><?= $carid_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($fueltype_err)) ? 'has-error' : ''; ?>">
                            <label>የሚጠቀመው የነዳጅ አይነት</label>
                            <input type="text" name="fueltype" class="form-control" value="<?= $fueltype; ?>">
                            <span class="help-block"><?= $fueltype_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($loads_err)) ? 'has-error' : ''; ?>">
                            <label>የመጫን ችሎታ</label>
                            <input type="text" name="loads" class="form-control" value="<?= $loads; ?>">
                            <span class="help-block"><?= $loads_err;?></span>
                        </div>

                        <div class="form-group col-6 <?= (!empty($bookid_err)) ? 'has-error' : ''; ?>">
                            <label>የደብተር ቁጥር</label>
                            <input type="text" name="bookid" class="form-control" value="<?= $bookid; ?>">
                            <span class="help-block"><?= $bookid_err;?></span>
                        </div>
                        <div class="form-group col-6 <?= (!empty($bookid_err)) ? 'has-error' : ''; ?>">
                            <label>የመኪናው አድራሻ </label>
                            <select   name="location" class="form-control" value="<?= $location; ?>"> 
                        <option value="in city">in city</option>
                        <option value="out city">out city</option>
                        </select>
                            <span class="help-block"><?= $location_err;?></span>
                        </div>
                        <div class="form-group col-6 <?= (!empty($bookid_err)) ? 'has-error' : ''; ?>">
                            <label>የመኪናው አይነት   </label>
                            <select   name="cartype" class="form-control" value="<?= $cartype; ?>"> 
                        <option value="Bus">Bust </option>
                        <option value="Compact Car">Compact Car</option>
                        </select>
                            <span class="help-block"><?= $cartaype_err;?></span>
                        </div>
                       <div class="form-group col-6 <?= (!empty($photo_err)) ? 'has-error' : ''; ?>">
                            <label>የመኪናው ፎቶ</label>
                            <input type="file" name="photo" class="form-control" value="<?= $photo; ?>">
                            <span class="help-block"><?= $photo_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                       
                    </form>


</div>
                     
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

