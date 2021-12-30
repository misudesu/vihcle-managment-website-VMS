<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM trip WHERE id = ?";
  
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
                $seen=$row['seen'];
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
        <div class="page-header">
                        <h1>View Record</h1>
                        <hr>
                    </div>
            <div class="row">
             <div class="col-md-6">
                    <div class="form-group">
                        <label>EventTitle:<span class="font-weight-bold text-info"> <?= $EventTitle; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>StartDate:<span class="font-weight-bold text-info"> <?= $StartDate; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>StartTime :<span class="font-weight-bold text-info"> <?= $StartTime; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>EndDate :<span class="font-weight-bold text text-success"> <?= $EndDate; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>EndTime : <span class="font-weight-bold"> <?= $EndTime; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>RegistrationDeadline : <span class="font-weight-bold"> <?= $RegistrationDeadline; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Timezone : <span class="font-weight-bold"> <?= $Timezone; ?></span></label>
                    </div>
               
                    <div class="form-group">
                        <label>startLocation  : <span class="font-weight-bold"> <?= $startLocation; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>endLocation:<span class="font-weight-bold text-info"> <?= $endLocation; ?></span></label>
                    </div>
                    </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>city:<span class="font-weight-bold text-info"> <?= $city; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>state:<span class="font-weight-bold text-info"> <?= $State; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>country:<span class="font-weight-bold text-info"> <?= $Country; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Description:<span class="font-weight-bold text-info"> <?= $Description; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>carID:<span class="font-weight-bold text-info"> <?= $carID; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>driverID:<span class="font-weight-bold text-info"> <?= $driverID; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>seen:<span class="font-weight-bold text-info"> <?= $seen; ?></span></label>
                    </div>

                    <p><a href="alltrip.php" type="button" class="btn btn-outline-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>