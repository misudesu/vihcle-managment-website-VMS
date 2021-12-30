<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    // Include config file
    require_once "../config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM vehicle WHERE id = ?";
  
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
                        <label>የመንግስት መስርያ ቤቱ ስም :<span class="font-weight-bold text text-success"> <?= $row["gov"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የተሽከርካሪዉ ሞዴል: <span class="font-weight-bold"> <?= $row["model"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የቻንሲ ቁጥር: <span class="font-weight-bold"> <?= $row["chansi"]; ?></span></label>
                    </div>
                   
                    <div class="form-group">
                        <label>የሞተር ቁጥር: <span class="font-weight-bold"> <?= $row["mid"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ሲሲ:<span class="font-weight-bold text-info"> <?= $row["cc"]; ?></span></label>
                    </div>

                    <div class="form-group">
                        <label>የተገዛበት ዋጋ:<span class="font-weight-bold text-info"> <?= $row["price"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የተገዛበት ቀንና አ.ም:<span class="font-weight-bold text-info"> <?= $row["year"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የሰሌዳ ቁጥር:<span class="font-weight-bold text-info"> <?= $row["carid"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የሚጠቀመው የነዳጅ አይነት:<span class="font-weight-bold text-info"> <?= $row["fueltype"]; ?></span></label>

                    </div>
                    <div class="form-group">
                        <label>የመጫን ችሎታ:<span class="font-weight-bold text-info"> <?= $row["loads"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>የደብተር ቁጥር :<span class="font-weight-bold text-info"> <?= $row["bookid"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>ፎቶ : <span class="font-weight-bold text-info"> <img src="../file/<?= $row['photo'] ;?>" width="300px" height="200px" alt=""></span></label>
                    </div>
                    <p><a href="vehicle.php" type="button" class="btn btn-outline-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>