<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$EventTitle=$StartDate=$StartTime=$EndDate=$EndTime=$RegistrationDeadline=$Timezone=
$startLocation=$endLocation=$city=$State=$Country=$Description = $carID=$driverID=$seen="";
$EventTitle_err=$StartDate_err=$StartTime_err=$EndDate_err=$EndTime_err=$RegistrationDeadline_err=$Timezone_err=
$startLocation_err=$endLocation_err=$city_err=$State_err=$Country_err=$Description_err=$carID_err=$driverID_err=$seen_err="";
 

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
 // Validate table
     $input_EventTitle = trim($_POST["EventTitle"]);
     if(empty($input_EventTitle))
     {
         $EventTitle_err = "Please enter the side id .";     
     } else{
      $EventTitle= $input_EventTitle;
     }
     
   // Validate name
     $input_StartDate = trim($_POST["StartDate"]);
     if(empty($input_StartDate))
     {
         $StartDate_err = "Please enter the side id .";     
     } else{
      $StartDate= $input_StartDate;
     }
        
     // Validate position
     $input_driverid = trim($_POST["divID"]);
     if(empty($input_driverid))
     {
         $driverid_err = "Please enter the side id .";     
     } else{
      $driverid = $input_driverid;
     }
       
    // Validate office
  
    
    // Validate age
     $input_StartTime= trim($_POST["StartTime"]);
     if(empty($input_StartTime))
     {
         $StartTime_err = "Please enter the side id .";     
     } else{
      $StartTime = $input_StartTime;
     }
   
     // Validate date
     $input_EndDate = trim($_POST["EndDate"]);
     if(empty($input_EndDate))
     {
         $EndDate_err = "Please enter the side id .";     
     } else{
      $EndDate = $input_EndDate;
     }
    
    // Validate salary
   $input_EndTime = trim($_POST["EndTime"]);
   if(empty($input_EndTime))
   {
       $EndTime_err = "Please enter the side id .";     
   } else{
    $EndTime = $input_EndTime;
   }
   //side1
     $input_RegistrationDeadline = trim($_POST["RegistrationDeadline"]);
     if(empty($input_RegistrationDeadline))
     {
         $RegistrationDeadline_err = "Please enter RegistrationDeadline .";     
     } else{
      $RegistrationDeadline = $input_RegistrationDeadline;
     }
     
  // Validate salary
 $input_Timezone = trim($_POST["Timezone"]);
 if(empty($input_Timezone))
 {
     $Timezone_err = "Please enter Timezone .";     
 } else{
  $Timezone = $input_Timezone;
 }
        
  // Validate salary
   $input_startLocation = trim($_POST["startLocation"]);
   if(empty($input_startLocation))  {
    $startLocation_err = "Please enter startLocation .";     
}else{
  $startLocation = $input_startLocation;
}    
    // Check input errors before inserting in database
   $input_endLocation = trim($_POST["endLocation"]);
   if(empty($input_endLocation))  {
    $endLocation_err = "Please enter endLocation .";     
}else{
  $endLocation = $input_endLocation;
}
   
    //
  $input_city= trim($_POST["City"]);
  if(empty($input_city ))  {
    $city_err = "Please enter City .";     
}else{
  $city = $input_city;
}
   
    //
    $input_State= trim($_POST["State"]);
    if(empty($input_State ))  {
      $State_err = "Please enter State.";     
  }else{
    $State = $input_State;
  }
   
    //
    $input_Country= trim($_POST["Country"]);
    if(empty($input_Country ))  {
      $Country_err = "Please enter Country .";     
  }else{
    $Country = $input_Country;
  }
    
    //
    $input_Description= trim($_POST["Description"]);
    if(empty($input_Description ))  {
      $Description_err = "Please enter Description .";     
  }else{
    $Description = $input_Description;
  }
   //
    $input_carID= trim($_POST["carID"]);
    if(empty($input_carID  ))  {
      $carID_err = "Please enter car id .";     
  }else{
    $carID = $input_carID;
  }
  //
  $input_seen= trim($_POST["seen"]);
  if(empty($input_seen  ))  {
    $seen_err = "Please enter seen .";     
}else{
  $seen = $input_seen;
}

   // Prepare an update statement
        if(empty($EventTitle_err) && empty($StartDate_err) && empty($StartTime_err) && empty($EndDate_err) && empty($EndTime_err) && empty($RegistrationDeadline_err) &&
         empty($Timezone_err)&& empty($startLocation_err)&& empty($endLocation_err)&& empty($city_err)&& empty($State_err)&& empty($Country_err)&& empty($Description_err)&& empty($carID_err)&& empty($driverID_err)&& empty($seen_err) )
    {
        $sql = "UPDATE trip SET EventTitle=?,StartDate=?,StartTime=?,EndDate=?,EndTime=?,RegistrationDeadline=?,Timezone=?,
        startLocation=?,endLocation=?,City=?,State=?,Country=?,Description=?, carID=?,divID=?,seen=? WHERE id=?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $EventTitle,$StartDate,$StartTime,$EndDate,$EndTime,$RegistrationDeadline,$Timezone,
            $startLocation,$endLocation,$city,$State,$Country,$Description,$carID,$driverID,$seen);
   // Set parameters
            $EventTitle=$EventTitle;
            $StartDate=$StartDate;
            $StartTime=$StartTime;
            $EndDate=$EndDate;
            $EndTime=$EndTime;
            $RegistrationDeadline=$RegistrationDeadline;
            $Timezone=$Timezone;
            $startLocation= $startLocation;
            $endLocation=$endLocation;
            $city=$city;
            $State=$State;
            $Country=$Country;
            $Description=$Description;
            $carID=$carID;
            $driverID=$driverID;
            $seen=$seen;
           $id=$id;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Records updated successfully. Redirect to landing page
                header("location: tripupdate.php");
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
        $sqls = "SELECT * FROM trip WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sqls))
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="/js/js/list.min.js"></script>
</head>
<body>
<?php 
        if(!empty($netfa)){
            echo '<div class="alert alert-danger">' . $netfa . '</div>';
        }else if(!empty($netfaError)){
          echo '<div class="alert alert-danger">'.$netfaError. '</div>';
        }       
        ?> 
    <div class="card mb-3 my-6 mt-5 mx-10">
        <div class="card-header">
          <h5 class="mb-0">Event Details</h5>
        </div>
        <div class="card-body bg-light">
          <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="POST">
            <div class="row gx-2">
              <div class="col-12 mb-3"><label class="form-label" for="event-name">Event Title</label><input name="EventTitle" value="<?=$EventTitle  ?>" required class="form-control" id="event-name" type="text" placeholder="Event Title"></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input name="StartDate" value="<?=$StartDate?>" required class="form-control datetimepicker flatpickr-input" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input name="StartTime" value="<?=$StartTime ?>" required class="form-control datetimepicker flatpickr-input" id="start-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}"></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input name="EndDate" value="<?=$EndDate ?>" required class="form-control datetimepicker flatpickr-input" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input name="EndTime"  value="<?=$EndTime ?>" required class="form-control datetimepicker flatpickr-input" id="end-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input name="RegistrationDeadline"  value="<?=$RegistrationDeadline ?>" required class="form-control datetimepicker flatpickr-input" id="registration-deadline" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">Timezone</label><select name="Timezone"  value="<?=$Timezone ?>" required class="form-select" id="time-zone">
                  <option>GMT-12:00 Etc/GMT-12</option>
                  <option>GMT-11:00 Etc/GMT-11</option>
                  <option>GMT-11:00 Pacific/Midway</option>
                  <option>GMT-10:00 America/Adak</option>
                  <option>GMT-09:00 America/Anchorage</option>
                  <option>GMT-09:00 Pacific/Gambier</option>
                  <option>GMT-08:00 America/Dawson_Creek</option>
                  <option>GMT-08:00 America/Ensenada</option>
                  <option>GMT-08:00 America/Los_Angeles</option>
                  <option>GMT-07:00 America/Chihuahua</option>
                  <option>GMT-07:00 America/Denver</option>
                  <option>GMT-06:00 America/Belize</option>
                  <option>GMT-06:00 America/Cancun</option>
                  <option>GMT-06:00 America/Chicago</option>
                  <option>GMT-06:00 Chile/EasterIsland</option>
                  <option>GMT-05:00 America/Bogota</option>
                  <option>GMT-05:00 America/Havana</option>
                  <option>GMT-05:00 America/New_York</option>
                  <option>GMT-04:30 America/Caracas</option>
                  <option>GMT-04:00 America/Campo_Grande</option>
                  <option>GMT-04:00 America/Glace_Bay</option>
                  <option>GMT-04:00 America/Goose_Bay</option>
                  <option>GMT-04:00 America/Santiago</option>
                  <option>GMT-04:00 America/La_Paz</option>
                  <option>GMT-03:00 America/Argentina/Buenos_Aires</option>
                  <option>GMT-03:00 America/Montevideo</option>
                  <option>GMT-03:00 America/Araguaina</option>
                  <option>GMT-03:00 America/Godthab</option>
                  <option>GMT-03:00 America/Miquelon</option>
                  <option>GMT-03:00 America/Sao_Paulo</option>
                  <option>GMT-03:30 America/St_Johns</option>
                  <option>GMT-02:00 America/Noronha</option>
                  <option>GMT-01:00 Atlantic/Cape_Verde</option>
                  <option>GMT Europe/Belfast</option>
                  <option>GMT Africa/Abidjan</option>
                  <option>GMT Europe/Dublin</option>
                  <option>GMT Europe/Lisbon</option>
                  <option>GMT Europe/London</option>
                  <option>UTC UTC</option>
                  <option>GMT+01:00 Africa/Algiers</option>
                  <option>GMT+01:00 Africa/Windhoek</option>
                  <option>GMT+01:00 Atlantic/Azores</option>
                  <option>GMT+01:00 Atlantic/Stanley</option>
                  <option>GMT+01:00 Europe/Amsterdam</option>
                  <option>GMT+01:00 Europe/Belgrade</option>
                  <option>GMT+01:00 Europe/Brussels</option>
                  <option>GMT+02:00 Africa/Cairo</option>
                  <option>GMT+02:00 Africa/Blantyre</option>
                  <option>GMT+02:00 Asia/Beirut</option>
                  <option>GMT+02:00 Asia/Damascus</option>
                  <option>GMT+02:00 Asia/Gaza</option>
                  <option>GMT+02:00 Asia/Jerusalem</option>
                  <option>GMT+03:00 Africa/Addis_Ababa</option>
                  <option>GMT+03:00 Asia/Riyadh89</option>
                  <option>GMT+03:00 Europe/Minsk</option>
                  <option>GMT+03:30 Asia/Tehran</option>
                  <option>GMT+04:00 Asia/Dubai</option>
                  <option>GMT+04:00 Asia/Yerevan</option>
                  <option>GMT+04:00 Europe/Moscow</option>
                  <option>GMT+04:30 Asia/Kabul</option>
                  <option>GMT+05:00 Asia/Tashkent</option>
                  <option>GMT+05:30 Asia/Kolkata</option>
                  <option>GMT+05:45 Asia/Katmandu</option>
                  <option>GMT+06:00 Asia/Dhaka</option>
                  <option>GMT+06:00 Asia/Yekaterinburg</option>
                  <option>GMT+06:30 Asia/Rangoon</option>
                  <option>GMT+07:00 Asia/Bangkok</option>
                  <option>GMT+07:00 Asia/Novosibirsk</option>
                  <option>GMT+08:00 Etc/GMT+8</option>
                  <option>GMT+08:00 Asia/Hong_Kong</option>
                  <option>GMT+08:00 Asia/Krasnoyarsk</option>
                  <option>GMT+08:00 Australia/Perth</option>
                  <option>GMT+08:45 Australia/Eucla</option>
                  <option>GMT+09:00 Asia/Irkutsk</option>
                  <option>GMT+09:00 Asia/Seoul</option>
                  <option>GMT+09:00 Asia/Tokyo</option>
                  <option>GMT+09:30 Australia/Adelaide</option>
                  <option>GMT+09:30 Australia/Darwin</option>
                  <option>GMT+09:30 Pacific/Marquesas</option>
                  <option>GMT+10:00 Etc/GMT+10</option>
                  <option>GMT+10:00 Australia/Brisbane</option>
                  <option>GMT+10:00 Australia/Hobart</option>
                  <option>GMT+10:00 Asia/Yakutsk</option>
                  <option>GMT+10:30 Australia/Lord_Howe</option>
                  <option>GMT+11:00 Asia/Vladivostok</option>
                  <option>GMT+11:30 Pacific/Norfolk</option>
                  <option>GMT+12:00 Etc/GMT+12</option>
                  <option>GMT+12:00 Asia/Anadyr</option>
                  <option>GMT+12:00 Asia/Magadan</option>
                  <option>GMT+12:00 Pacific/Auckland</option>
                  <option>GMT+12:45 Pacific/Chatham</option>
                  <option>GMT+13:00 Pacific/Tongatapu</option>
                  <option>GMT+14:00 Pacific/Kiritimati</option>
                </select></div>
              <div class="col-12">
                <div class="border-dashed-bottom my-3"></div>
              </div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="event-venue">startLocation</label><input required name="startLocation"  value="<?=$startLocation ?>" class="form-control" id="event-venue" type="text" placeholder="Venue"><button class="btn btn-link btn-sm btn p-0" type="button">Online Event</button></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="event-address">endLocation</label><input required name="endLocation"  value="<?=$endLocation ?>" class="form-control" id="event-address" type="text" placeholder="Address"></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-city">City</label><input required name="City"  value="<?=$city ?>" class="form-control" id="event-city" type="text" placeholder="City"></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-state">State</label><input required name="State"  value="<?=$State ?>" class="form-control" id="event-state" type="text" placeholder="State"></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-country">Country</label><input required name="Country"  value="<?=$Country ?>" class="form-control" id="event-country" type="text" placeholder="Country"></div>
              <div class="col-12"><label class="form-label" for="event-description">Description</label><textarea  name="Description"    class="form-control" id="event-description" rows="6"><?=$Description ?></textarea></div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">carID</label><select required class="form-select" name="carID"   id="time-zone">
            
   <option value="<?= $carID;?>"><?= $carID;?>

 </option>
 
                  </select>
              </div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">driverId</label>
              <select class="form-select" name="divID" id="time-zone">
             
                  <option value="<?= $driverID?>"><?php echo $driverID;?>
                  
                </option>
               
                  </select>
              </div>
              <input type="hidden" name="id" value="<?= $id; ?>"/>
              <input type="hidden" name="seen" value="<?=$seen; ?>"/>
              <div class="col-sm-6 form-label my-2 "><button class="btn btn-primary" type="submit" name="save">Save</button></div>
            </div>
          </form>
        </div>
      </div>
</body>
</html>