<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$date = $table   = $driverid    = $drivername     = $location     = $sideid  = $hospital =$sideid1 =$weakend =$sideid2= $table  = "";
$date_err = $driverid_err = $drivername_err =$location_err = $sideid_err = $hospital_err  =$sideid1_err =$weakend_err =$sideid2_err= $table_err="";
 

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
     // Validate table
     $input_table = trim($_POST["table"]);
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
        // Prepare an update statement
        $sql = "UPDATE weekone SET date=?,weekoneid=?, driverid=?, drivername=?, location=?,codnum1=? ,hospitalteregna=? ,codnum2=? ,satandsund=? ,codnum3=? WHERE id=?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $date,$week,$driverid, $drivername, $location, $sideid, $hospital, $sideid1, $weakend,$sideid2);
            
            // Set parameters
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
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Records updated successfully. Redirect to landing page
                header("location: ../monthly/alltrip.php");
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
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM weekone WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                   
                    $table  = $row['weekoneid'] ;
                    $date= $row['date'] ;
                    $driverid= $row['driverid']; 
                     $drivername= $row['drivername'] ;
                     $location= $row['location'] ;
                     $sideid=  $row['codnum1']; 
                     $hospital= $row['hospitalteregna'] ;
                  $sideid1=$row['codnum2']; 
                   $satandsund=$row['satandsund'];
                  $sideid2=$row['codnum3'];
                }
                else
                {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            }
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }
    else
    {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
   <!-- add style css -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <div class="signup-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?= (!empty($table_err)) ? 'has-error' : ''; ?>"><select class="form-control "  name="table" id="table">
       <option class="form-control" value="<?= $table; ?>"><?= $table; ?></option>
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
                            <input type="text" name="driverid" class="form-control" value="<?= $driverid ?>">
                            <span class="help-block"><?= $driverid_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($drivername_err)) ? 'has-error' : ''; ?>">
                            <label>የሾፌር ስም </label>
                            <input type="text" name="drivername" class="form-control" value="<?= $drivername; ?>">
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
                            <input type="date" name="hospital" class="form-control" value="<?= $hospital; ?>">
                            <span class="help-block"><?= $hospital_err;?></span>
                            
                        </div>
                        <div class="form-group <?= (!empty($sideid1_err)) ? 'has-error' : ''; ?>">
                            <label>የጎን ቁጥር</label>
                            <input type="text" name="sideid1" class="form-control" value="<?= $sideid1; ?>">
                            <span class="help-block"><?= $sideid1_err;?></span>

                        </div>

                        <div class="form-group <?= (!empty($weakend_err)) ? 'has-error' : ''; ?>">
                            <label>ቅዳሜና እሁድ ተረኛ</label>
                            <input type="text" name="weakend" class="form-control" value="<?= $satandsund; ?>">
                            <span class="help-block"><?= $weakend_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($sideid2_err)) ? 'has-error' : ''; ?>">
                            <label>ኮድ የጎን ቁጥር</label>
                            <input type="text" name="sideid2" class="form-control" value="<?= $sideid2; ?>">
                            <span class="help-block"><?= $sideid2_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default" style="color:red;">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>