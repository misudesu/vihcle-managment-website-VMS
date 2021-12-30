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
   //mysqli_close($conn);
   
}else{
   
    $name=$conn->query("SELECT * FROM driver "); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Create Record</title>
    <link rel="stylesheet" href="../driver/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="../driver/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <!-- add style css -->
   <link rel="stylesheet" href="css/css-create-style.css">

</head>

<body>
<?php 
        if(!empty($netfa)){
            echo '<div class="alert alert-success alert-dismissible"   >' . $netfa . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }else if(!empty($netfaError)){
          echo '<div class="alert alert-danger">'.$netfaError. '</div>';
        }       
        ?> 
    <div class="container">
        <div class="signup-form">
            <div class="row ">
                <div class="col-md-12" >
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>ወራዊ መደባ </p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   <div class="form-group <?= (!empty($table_err)) ? 'has-error' : ''; ?>"><select class="form-control "  name="tables" id="tables">
       <option class="form-control" value=""></option>
        <option class="form-control" value="weekone">weekone</option>
        <option class="form-control" value="weektwo">weektwo</option>
        <option class="form-control" value="weekthree">weekthree</option>
        <option class="form-control" value="weekfour">weekfour</option>
    </select>
    <span class="help-block"><?= $table_err;?></span>
</div>
                    <div class="form-group <?= (!empty($date_err)) ? 'has-error' : ''; ?>">
                            <label>ቀን</label>
                            <input type="text" name="date" class="form-control" value="<?= $date; ?>">
                            <span class="help-block"><?= $date_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($driverid_err)) ? 'has-error' : ''; ?>">
                            <label>የሾፌር መለያ </label>
                            <select  name="driverid" class="form-select">
                          <?php 
                           $id=$conn->query("SELECT * FROM driver ");
                          while($row = $id->fetch_assoc()): ?>
                        <option value="<?php echo $row['driverid'];?>"><?php echo $row['driverid'];?></option>
                        <?php endwhile;?>  
                        </select>
                            <span class="help-block"><?= $driverid_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($drivername_err)) ? 'has-error' : ''; ?>">
                            <label>የሾፌር ስም </label>
                            <select  name="drivername" class="form-select" >
                         <?php  $name=$conn->query("SELECT * FROM driver ");
                          while($row = $name->fetch_assoc()): ?>
                         ?>
                         
                        <option value="<?php echo $row['fullname'];?>"> <?php echo $row['fullname'];?></option>
                        <?php endwhile;?>    
                    </select>
                            <span class="help-block"><?= $drivername_err;?></span>
                          
                        </div>
                        <div class="form-group <?= (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>ሳምንታዊ መስመር</label>
                            <input type="text" name="location" class="form-control" value="<?= $location; ?>">
                            <span class="help-block"><?= $location_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($sideid_err)) ? 'has-error' : ''; ?>">
                            <label>የጎ ቁጥር</label>
                            <input type="number" name="sideid" class="form-control" value="<?= $sideid; ?>">
                            <span class="help-block"><?= $sideid_err;?></span>
                        </div>
                        <div class="form-group<?= (!empty($hospital_err)) ? 'has-error' : ''; ?>">
                            <label>ሆስፒታል ተረኛ </label>
                            <input type="text" name="hospital" class="form-control" value="<?= $hospital; ?>">
                            <span class="help-block"><?= $hospital_err;?></span>
                            
                        </div>
                        <div class="form-group <?= (!empty($sideid1_err)) ? 'has-error' : ''; ?>">
                            <label>የጎን ቁጥር</label>
                            <input type="text" name="sideid1" class="form-control" value="<?= $sideid1; ?>">
                            <span class="help-block"><?= $sideid1_err;?></span>

                        </div>

                        <div class="form-group <?= (!empty($weakend_err)) ? 'has-error' : ''; ?>">
                            <label>ቅዳሜና እሁድ ተረኛ</label>
                            <input type="text" name="weakend" class="form-control" value="<?= $weakend; ?>">
                            <span class="help-block"><?= $weakend_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($sideid2_err)) ? 'has-error' : ''; ?>">
                            <label>ኮድ የጎን ቁጥር</label>
                            <input type="text" name="sideid2" class="form-control" value="<?= $sideid2; ?>">
                            <span class="help-block"><?= $sideid2_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                       
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
