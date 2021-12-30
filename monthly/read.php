<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM weekone WHERE id = ?";
  
    if($stmt = mysqli_prepare($conn, $sql))
    {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1)
            {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value           
         $weekid  = $row['weekoneid'] ;
             $date= $row['date'] ;
             $driverid= $row['driverid']; 
              $drivername= $row['drivername'] ;
              $location= $row['location'] ;
              $codnum1=  $row['codnum1']; 
              $hospitable= $row['hospitalteregna'] ;
           $codnum2=$row['codnum2']; 
            $satandsund=$row['satandsund'];
           $codnum3=$row['codnum3'];
            }
            else
            {
                // URL doesn't contain valid id parameter. Redirect to error page
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
    print_r($sql);
    exit();
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>የሹፌር ስም:<span class="font-weight-bold text-info"> <?= $row["drivername"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የሹፌር መለያ:<span class="font-weight-bold text-info"> <?= $row["driverid"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የጊዜ ሰሌዳ ከ :<span class="font-weight-bold text-info"> <?= $row["date"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ሳምንታዊ መስመር :<span class="font-weight-bold text text-success"> <?= $row["location"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ኮድ(የጎ/ቁጥር) : <span class="font-weight-bold"> <?= $row["codnum1"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ሆስፒታል : <span class="font-weight-bold"> <?= $row["hospitalteregna"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ኮድ(የጎ/ቁጥር) : <span class="font-weight-bold"> <?= $row["codnum2"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ቅዳሜ እና እሁድ  : <span class="font-weight-bold"> <?= $row["satandsund"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ኮድ(የጎ/ቁጥር):<span class="font-weight-bold text-info"> <?= $row["codnum3"]; ?></span></label>
                    </div>

                    <p><a href="../monthly/alltrip.php" type="button" class="btn btn-outline-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>