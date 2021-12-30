<?php 
session_start();
?>

<?php

// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$gov = $model     = $chansi     = $mid     = $cc    = $price   =$year =$carid =$year =$carid =$fueltype =$loads =$bookid = $photo= "";
$gov_err = $model_err = $chansi_err = $mid_err = $cc_err = $price_err = $year_err = $carid_err = $year_err = $carid_err =$fueltype_err =$loads_err = $bookid_err =$photo_err ="";

if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $id = $_POST["id"];
    // Validate name
    $input_gov = trim($_POST["gov"]);
    if(empty($input_name))
    {
        $name_err = "Please enter a name.";
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
    $input_photo = trim($_POST["photo"]);
    if(empty($input_photo))
    {
        $photo_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $photo = $input_photo;
    }
    // Check input errors before inserting in database
    if(empty($gov_err) && empty($model_err) && empty($chansi_err) && empty($mid_err) && empty($cc_date_err) && empty($price_err) &&empty($year_err) &&empty($carid_err)&&empty($fueltype_err)&&empty($loads_err)&&empty($bookid_err)&&empty($photo_err))
    {
        // Prepare an update statement statement 
        $sql = "UPDATE vehicle SET name=? gov=?, model=?, chansi=?, mid=?, cc=?, price=?,year=?,carid=?,fueltype=?,loads=?,bookid=?,photo=? WHERE id=?";
        if($stmt = mysqli_prepare($conn, $sql))
        {
          // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssi", $gov, $model, $chansi, $mid, $cc, $price,$year,$carid,$fueltype,$loads,$bookid,$photo,$param_id);
            
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
            $loads  = $loads;
            $bookid = $bookid;
            $photo  = $photo;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location:all-vehicles.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        
         
     
        }
           // Close statement
         //  mysqli_stmt_close($stmt);
    }
    
    // Close connection
   // mysqli_close($conn);
}
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM vehicle WHERE id =?";
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
    
                if(mysqli_num_rows($result) ==1)
                {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                 $gov    =$row["gov"];
                $model   =$row["model"];
                $chansi  =$row["chansi"];
                $mid     =$row["mid"];
                $cc      =$row["cc"];
                $price   =$row["price"];
                $year    =$row["year"];
                $carid   =$row["carid"];
                $fueltype  =$row["fueltype"];
                $loads      =$row["loads"];
                $bookid    =$row["bookid"];
                $photo     =$row["photo"];

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
   <link rel="stylesheet" href="style.css">

<div class="container-fluid mt-5 mx-5 my-5">

                    <!-- start page title -->
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?= (!empty($gov_err)) ? 'has-error' : ''; ?>">
                            <label>የመንግስት መስርያ ቤቱ  ስም</label>
                            <input type="text" name="gov" class="form-control" value="<?= $gov; ?>">
                            <span class="help-block"><?= $gov_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($model_err)) ? 'has-error' : ''; ?>">
                            <label>የተሽከርካሪዉ ሞዴል</label>
                            <input type="text" name="model" class="form-control" value="<?= $model; ?>">
                            <span class="help-block"><?= $model_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($chansi_err)) ? 'has-error' : ''; ?>">
                            <label>የቻንሲ ቁጥር</label>
                            <input type="text" name="chansi" class="form-control" value="<?= $chansi; ?>">
                            <span class="help-block"><?= $chansi_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($mid_err)) ? 'has-error' : ''; ?>">
                            <label>የሞተር ቁጥር</label>
                            <input type="text" name="mid" class="form-control" value="<?= $mid; ?>">
                            <span class="help-block"><?= $mid_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($cc_err)) ? 'has-error' : ''; ?>">
                            <label>ሲሲ</label>
                            <input type="text" name="cc" class="form-control" value="<?= $cc; ?>">
                            <span class="help-block"><?= $cc_err;?></span>
                        </div>

                        <div class="form-group<?= (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>የተገዛበት ዋጋ</label>
                            <input type="number" name="price" class="form-control" value="<?= $price; ?>">
                            <span class="help-block"><?= $price_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($year_err)) ? 'has-error' : ''; ?>">
                            <label>የተገዛበት ቀንና አ.ም</label>
                            <input type="date" name="year" class="form-control" value="<?= $year; ?>">
                            <span class="help-block"><?= $year_err;?></span>
                        </div>


                        <div class="form-group <?= (!empty($carid_err)) ? 'has-error' : ''; ?>">
                            <label>የሰሌዳ ቁጥር</label>
                            <input type="text" name="carid" class="form-control" value="<?= $carid; ?>">
                            <span class="help-block"><?= $carid_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($fueltype_err)) ? 'has-error' : ''; ?>">
                            <label>የሚጠቀመው የነዳጅ አይነት</label>
                            <input type="text" name="fueltype" class="form-control" value="<?= $fueltype; ?>">
                            <span class="help-block"><?= $fueltype_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($loads_err)) ? 'has-error' : ''; ?>">
                            <label>የመጫን ችሎታ</label>
                            <input type="text" name="loads" class="form-control" value="<?= $loads; ?>">
                            <span class="help-block"><?= $loads_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($bookid_err)) ? 'has-error' : ''; ?>">
                            <label>የደብተር ቁጥር</label>
                            <input type="text" name="bookid" class="form-control" value="<?= $bookid; ?>">
                            <span class="help-block"><?= $bookid_err;?></span>
                        </div>

                       <div class="form-group <?= (!empty($photo_err)) ? 'has-error' : ''; ?>">
                            <label>የመኪናው ፎቶ</label>
                            <input type="file" name="photo" class="form-control" value="<?= $photo; ?>">
                            <span class="help-block"><?= $photo_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default" style="color:red;">Cancel</a>
                    </form>


</div>

</body>
</html>