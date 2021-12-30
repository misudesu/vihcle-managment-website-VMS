<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM driver WHERE id = ?";
  
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
                $fullname=$row['fullname'];
                $email=$row['email'];
                $phonenumber=$row['phonenumber'];
                $driverid=$row['driverid'];
                $carid=$row['carid'];
                $startdate=$row['startime'];
                $enddate=$row['enddate'];
                $endtime=$row['endtime'];
                $registrationdeadline=$row['registrationdeadline'];
                $timezone=$row['timezone'];
                $age=$row['age'];
                $country=$row['country'];
                $address=$row['address'];
                $zone=$row['zone'];
                $city=$row['city'];
                $dphoto=$row['dphoto'];
                $dliceense=$row['dlicense'];
                $AccountStatus=$row['AccountStatus'];
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
        <div class="page-header">
                        <h1>Driver information </h1>
                        <hr>
                    </div>
            <div class="row">
             <div class="col-md-6">
                    <div class="form-group">
                        <label>full name:<span class="font-weight-bold text-info"> <?= $fullname; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>email:<span class="font-weight-bold text-info"> <?= $email; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>phonenumber :<span class="font-weight-bold text-info"> <?= $phonenumber; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>username :<span class="font-weight-bold text text-success"> <?= $driverid; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>car type : <span class="font-weight-bold"> <?= $carid; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>start date : <span class="font-weight-bold"> <?= $startdate; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>end date : <span class="font-weight-bold"> <?= $enddate; ?></span></label>
                    </div>
               
                    <div class="form-group">
                        <label>end time  : <span class="font-weight-bold"> <?= $endtime; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>RegistrationDeadline:<span class="font-weight-bold text-info"> <?= $registrationdeadline; ?></span></label>
                    </div>
                    </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>time zone:<span class="font-weight-bold text-info"> <?= $timezone; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>age:<span class="font-weight-bold text-info"> <?= $age; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>country:<span class="font-weight-bold text-info"> <?= $country; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>address:<span class="font-weight-bold text-info"> <?= $address; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>zone:<span class="font-weight-bold text-info"> <?= $zone; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>city:<span class="font-weight-bold text-info"> <?= $city; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Account Status:<span class="font-weight-bold text-info"> <?= $AccountStatus; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>driver photo: <img src="../image/<?= $dphoto ?>" width="212px" height="212px" alt=""> </label>
                    </div>
                    <div class="form-group">
                        <label>driver license:<img src="../image/<?= $dliceense ?>" width="212px" height="212px" alt=""></label>
                    </div>
                    <p><a href="alldriver.php" type="button" class="btn btn-outline-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>