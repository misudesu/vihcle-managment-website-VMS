<?php 
include "../config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$EventTitle=$_POST['EventTitle'];
$StartDate=$_POST['StartDate'];
$StartTime=$_POST['StartTime'];
$EndDate=$_POST['EndDate'];
$EndTime=$_POST['EndTime'];
$RegistrationDeadline=$_POST['RegistrationDeadline'];
$Timezone=$_POST['Timezone'];
$startLocation=$_POST['startLocation'];
$endLocation=$_POST['endLocation'];
$city=$_POST['City'];
$State=$_POST['State'];
$Country=$_POST['Country'];
$Description=$_POST['Description'];
$driverID=$_POST['driverID'];
$carID=$_POST['carID'];

$sql = "INSERT INTO trip
VALUES ('','$EventTitle','$StartDate','$StartTime','$EndDate','$EndTime','$RegistrationDeadline',
'$Timezone','$startLocation','$endLocation','$city','$State','$Country','$Description'
,'$carID','$driverID','new')";
if ($conn->query($sql) === TRUE) {
  $netfa= "Data saved successfully";
} else {
  $netfaError= "Error: " . $sql . "<br>" . $conn->error;
}

}

$sql=$conn->query("SELECT * FROM vehicle ");
$driverid=$conn->query("SELECT * FROM driver ");

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
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row gx-2">
              <div class="col-12 mb-3"><label class="form-label" for="event-name">Event Title</label><input name="EventTitle" required class="form-control" id="event-name" type="text" placeholder="Event Title"></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input name="StartDate" required class="form-control datetimepicker flatpickr-input" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input name="StartTime" required class="form-control datetimepicker flatpickr-input" id="start-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}"></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input name="EndDate" required class="form-control datetimepicker flatpickr-input" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input name="EndTime" required class="form-control datetimepicker flatpickr-input" id="end-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input name="RegistrationDeadline" required class="form-control datetimepicker flatpickr-input" id="registration-deadline" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">Timezone</label><select name="Timezone" required class="form-select" id="time-zone">
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
              <div class="col-sm-6 mb-3"><label class="form-label" for="event-venue">startLocation</label><input required name="startLocation" class="form-control" id="event-venue" type="text" placeholder="Venue"><button class="btn btn-link btn-sm btn p-0" type="button">Online Event</button></div>
              <div class="col-sm-6 mb-3"><label class="form-label" for="event-address">endLocation</label><input required name="endLocation" class="form-control" id="event-address" type="text" placeholder="Address"></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-city">City</label><select required name="City" class="form-control" id="event-city" type="text" placeholder="City">
                <option value="in city">in hossana</option>
                <option value="out city">out of hossana</option>
                <option value="out city"> around hossana</option>
              </select></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-state">State</label><input required name="State" class="form-control" id="event-state" type="text" placeholder="State"></div>
              <div class="col-sm-4 mb-3"><label class="form-label" for="event-country">Country</label><input required name="Country" class="form-control" id="event-country" type="text" placeholder="Country"></div>
              <div class="col-12"><label class="form-label" for="event-description">Description</label><textarea  name="Description" class="form-control" id="event-description" rows="6"></textarea></div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">carID</label><select required class="form-select" name="carID" id="time-zone">
              <?php   while($row1 = mysqli_fetch_array($sql)):;?>
   
   <option value="<?php echo $row1[14];?>"><?php echo $row1[14];?>

 </option>
 <?php endwhile;?>
                  </select>
              </div>
              <div class="col-sm-6"><label class="form-label" for="time-zone">driverId</label>
              <select class="form-select" name="driverID" id="time-zone">
              <?php   while($row1 = mysqli_fetch_array($driverid)):; ?>
   
                  <option value="<?php echo $row1[4];?>"><?php echo $row1[4];?>
                  
                </option>
                <?php endwhile;?>
                  </select>
              </div>
              <div class="col-sm-6 form-label my-2 "><button class="btn btn-primary" type="submit" name="save">Save</button></div>
            </div>
          </form>
        </div>
      </div>
</body>

</html>