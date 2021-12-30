<?php 
session_start();
?>

<?php 
$servername = "localhost";
$usernames = "root";
$passwords = "";
$dbname = "wachemo";
// Create connection
$conn = new mysqli($servername, $usernames, $passwords, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$id=$_REQUEST['id'];
if(isset($_POST['save'])){


$fullname=$_REQUEST['fullname'];
$email=$_REQUEST['email'];
$phonenumber=$_REQUEST['phonenumber'];

$password=$_REQUEST['password'];
$driverid=$_POST['driverid'];
$carid=$_REQUEST['carid'];
$startdate=$_REQUEST['startdate'];
$startime=$_REQUEST['starttime'];
$enddate=$_REQUEST['enddate'];
$endtime=$_REQUEST['endtime'];
$registrationdeadline=$_REQUEST['registrationdeadline'];
$timezone=$_REQUEST['timezone'];
$age=$_REQUEST['age'];
$country=$_REQUEST['country'];
$address=$_REQUEST['address'];
$zone=$_REQUEST['zone'];
$city=$_REQUEST['city'];
$dphoto=$_FILES['dphoto']['name'];
$tm=$_FILES['dphoto'] ['tmp_name'];
$dlicense=$_FILES['dlicense']['name'];
$tmL=$_FILES['dlicense'] ['tmp_name'];
$idd=$_POST['id'];
$oldfile = $_POST['old'];
$oldfilephoto = $_POST['oldphoto'];


//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$hashed_password = md5($password);
if($_FILES['dphoto']['size'] == 0) {
    move_uploaded_file($tm,"../image/".$dlicense);
    $sql = "UPDATE driver 
    SET fullname='$fullname',email='$email',phonenumber='$phonenumber',
    driverid='$driverid',	carid='$carid',
    startdate='$startdate',startime='$startime',enddate='$enddate',endtime='$endtime',
    registrationdeadline='$registrationdeadline',timezone='$timezone',age='$age',
    country='$country',address='$address', zone='$zone',city='$city',dphoto='$oldfilephoto',dlicense='$dlicense',AccountStatus='Active' 	
    where id='$idd'";
    $regsterd = "UPDATE  users
    SET user_name='$driverid',password='$hashed_password',name='$fullname',accounttype='driver',stutes='Active'
    where user_name='$driverid' ";
    if ($conn->query($sql) === TRUE) {
        $netfa= "New record created successfully";
      } else {
        $netfaError= "Error: " . $sql . "<br>" . $conn->error;
      }
      if ($conn->query($regsterd) === TRUE) {
        $netfaa= "New record created successfully";
        header("location: alldriver.php");
      } else {
        $netfaErrorr= "Error: " . $regsterd . "<br>" . $conn->error;
      }
}elseif($_FILES['dlicense']['size'] == 0) {
    move_uploaded_file($tm,"../image/".$dphoto);
    $sql = "UPDATE driver 
    SET fullname='$fullname',email='$email',phonenumber='$phonenumber',
    driverid='$driverid',	carid='$carid',
    startdate='$startdate',startime='$startime',enddate='$enddate',endtime='$endtime',
    registrationdeadline='$registrationdeadline',timezone='$timezone',age='$age',
    country='$country',address='$address', zone='$zone',city='$city',dphoto='$dphoto',dlicense='$oldfile',AccountStatus='Active' 	
    where id='$idd'";
    $regsterd = "UPDATE  users
    SET user_name='$driverid',password='$hashed_password',name='$fullname',accounttype='driver',stutes='Active'
    where user_name='$driverid' ";
    if ($conn->query($sql) === TRUE) {
        $netfa= "New record created successfully";
      } else {
        $netfaError= "Error: " . $sql . "<br>" . $conn->error;
      }
      if ($conn->query($regsterd) === TRUE) {
        $netfaa= "New record created successfully";
        header("location: alldriver.php");
      } else {
        $netfaErrorr= "Error: " . $regsterd . "<br>" . $conn->error;
      }
}elseif($_FILES['file']['dphoto'] == 0 && $_FILES['dlicense']['size'] == 0 ) {
    $sql = "UPDATE driver 
    SET fullname='$fullname',email='$email',phonenumber='$phonenumber',
    driverid='$driverid',	carid='$carid',
    startdate='$startdate',startime='$startime',enddate='$enddate',endtime='$endtime',
    registrationdeadline='$registrationdeadline',timezone='$timezone',age='$age',
    country='$country',address='$address', zone='$zone',city='$city',dphoto='$oldfilephoto',dlicense='$oldfile',AccountStatus='Active' 	
    where id='$idd'";
    $regsterd = "UPDATE  users
    SET user_name='$driverid',password='$hashed_password',name='$fullname',accounttype='driver',stutes='Active'
    where user_name='$driverid' ";
    if ($conn->query($sql) === TRUE) {
        $netfa= "New record created successfully";
      } else {
        $netfaError= "Error: " . $sql . "<br>" . $conn->error;
      }
      if ($conn->query($regsterd) === TRUE) {
        $netfaa= "New record created successfully";
        header("location: alldriver.php");
      } else {
        $netfaErrorr= "Error: " . $regsterd . "<br>" . $conn->error;
      }
}else{
    move_uploaded_file($tm,"../image/".$dphoto);
    move_uploaded_file($tmL,"../image/".$dlicense);
    $sql = "UPDATE driver 
SET fullname='$fullname',email='$email',phonenumber='$phonenumber',
driverid='$driverid',	carid='$carid',
startdate='$startdate',startime='$startime',enddate='$enddate',endtime='$endtime',
registrationdeadline='$registrationdeadline',timezone='$timezone',age='$age',
country='$country',address='$address', zone='$zone',city='$city',dphoto='$dphoto',dlicense='$dlicense',AccountStatus='Active' 	
where id='$idd'";
$regsterd = "UPDATE  users
SET user_name='$driverid',password='$hashed_password',name='$fullname',accounttype='driver',stutes='Active'
where user_name='$driverid' ";
if ($conn->query($sql) === TRUE) {
    $netfa= "New record created successfully";
  } else {
    $netfaError= "Error: " . $sql . "<br>" . $conn->error;
  }
  if ($conn->query($regsterd) === TRUE) {
    $netfaa= "New record created successfully";
    header("location: alldriver.php");
  } else {
    $netfaErrorr= "Error: " . $regsterd . "<br>" . $conn->error;
  }
}


}
$lod="SELECT * FROM driver";
if($result = mysqli_query($conn, $lod))
{
    if(mysqli_num_rows($result) > 0)
    {
    
        while($row = mysqli_fetch_array($result))
        { 
$Afullname=$row['fullname'];
$Aemail=$row['email'];
$Aphonenumber=$row['phonenumber'];

$Adriverid=$row['driverid'];
$Acarid=$row['carid'];
$Astartdate=$row['startdate'];
$Astartime=$row['startime'];
$Aenddate=$row['enddate'];
$Aendtime=$row['endtime'];
$Aregistrationdeadline=$row['registrationdeadline'];
$Atimezone=$row['timezone'];
$Aage=$row['age'];
$Acountry=$row['country'];
$Aaddress=$row['address'];
$Azone=$row['zone'];
$Acity=$row['city'];
$Adphoto=$row['dphoto'];
$Adlicense=$row['dlicense'];
  }
        mysqli_free_result($result);
    }
    else
    {
        echo "<p class='lead'><em>No records were found.</em></p>";
    }
}
else
{
    echo "ERROR: Could not able to execute $lod. " . mysqli_error($conn);
}

// Close connection

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

                        
<?php
			   require_once "../config.php";
         $sql=$conn->query("SELECT * FROM vehicle ");
			   $driverid=$conn->query("SELECT * FROM driver ");
			   
?>
<?php 
        if(!empty($netfa)){
            echo '<div class="alert alert-danger">' . $netfa . '</div>';
        }else if(!empty($netfaError)){
          echo '<div class="alert alert-danger">'.$netfaError. '</div>';
        }       
        ?> 
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
 
<div class="row g-0 my-3 " >

        <div class="col-lg-8 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0"> Driver Info </h5>
            </div>
            <div class="card-body bg-light">
              <form>
                <div class="row gx-2">
                  <div class="col-12 mb-3"><label class="form-label" for="event-name"> Full Name</label><input name="fullname" value="<?=$Afullname?>" class="form-control" id="event-name" type="text" placeholder="Event Title"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="email">Email</label><input name="email" value="<?=$Aemail?>" class="form-control  " id="email" type="email" placeholder="email"  ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="phonenumber">Phone Namuber</label><input name="phonenumber" value="<?=$Aphonenumber?>" class="form-control " id="phonenumber" type="number" placeholder="09...." ></div>
                 <div class="col-sm-6 mb-3"><label class="form-label" for="password">password</label><input name="password"  class="form-control " id="password" type="password" placeholder="...." ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="driverid">Driver ID </label><input  name="driverid" value="<?=$Adriverid?>" class="form-control " id="driverid" type="text" placeholder="user name" >
                 
                  </div>
                
                   
  
                  <div class="col-sm-6 mb-3"><label class="form-label" for="carid">Car ID</label><select name="carid" class="form-select " id="carid"  placeholder="...." >
                  <?php   while($row1 = mysqli_fetch_array($sql)):;?>
   <option value="<?=$Acarid?>"><?php echo $Acarid;?></option>
                  <option value="<?php echo $row1[14];?>"><?php echo $row1[14];?>
     
                </option>
                <?php endwhile;?>
                </select></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input name="startdate" value="<?=$Astartdate?>" class="form-control datetimepicker flatpickr-input" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input name="starttime" value="<?=$Astartime?>" class="form-control datetimepicker flatpickr-input" id="start-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input name="enddate" value="<?=$Aenddate?>" class="form-control datetimepicker flatpickr-input" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input name="endtime" value="<?=$Aendtime?>" class="form-control datetimepicker flatpickr-input" id="end-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input name="registrationdeadline" value="<?=$Aregistrationdeadline?>" class="form-control datetimepicker flatpickr-input" id="registration-deadline" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"></div>
                  <div class="col-sm-6"><label class="form-label" for="time-zone">Timezone</label><select name="timezone" class="form-select" id="time-zone">
                  <option><?=$Atimezone?></option>   
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
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-venue">Age</label><input name="age" value="<?=$Aage?>" class="form-control" id="age" type="text" placeholder="Venue"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-address">Country</label><input name="country" value="<?=$Acountry?>" class="form-control" id="country" type="text" placeholder="Address"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-city">Address</Address></label><input name="address" value="<?=$Aaddress?>" class="form-control" id="address" type="text" placeholder="City"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-state">Zone</label><input name="zone" value="<?=$Azone?>" class="form-control" id="zone" type="text" placeholder="State"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-country">City</label><input name="city" value="<?=$Acity?>" class="form-control" id="city" type="text" placeholder="Country"></div>
                  
                </div>
              </form>
            </div>
          </div>

  
         
        
      
        </div>
        <!--end of driver info-->
        <div class="col-lg-4 ps-lg-2">
          <div class="sticky-sidebar">
            <div class="card mb-lg-0">
              <div class="card-header">
                <h5 class="mb-0">Other Info</h5>
              </div>

              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0" >Upload your  Photos</h5>
                  <input type="text"  hidden name="oldphoto" value="<?php echo $Adphoto?>">
                  <input name="dphoto" class=" block" type="file">
                  <span  value="<?=$Adphoto?>"><?php echo $Adphoto?></span>
                </div>
                <div class="card-body bg-light">
                  <form class="dropzone dropzone-multiple p-0 dz-clickable" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
                    
                    <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="../image/<?=$Adphoto?>" width="300" alt="">Drop your files here</div>
                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
                  </form>
                </div>
              </div>
<hr>
<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Upload driver license</h5>
      <input type="text" hidden  name="old" value="<?php echo $Adlicense?>">
      <input name="dlicense"  class=" block" type="file">
      <span  value="<?=$Adlicense?>"><?php echo $Adlicense?></span>
  </div>
    <div class="card-body bg-light">
      <form class="dropzone dropzone-multiple p-0 dz-clickable" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
        
        <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="../image/<?=$Adlicense?>" width="300" alt="">Drop your files here</div>
        <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
      </form>
    </div>
  </div>
  <hr>
              <div class="card mt-3">
                <div class="card-body">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Nice Job! You're almost done</h5>
                    </div>
                    <?php
                     $id =  trim($_GET["id"]);
                    ?>
                    <input type="text" hidden name="id" value="<?=$id?>">
                    <div class="col-auto"><input type="submit" name="save" class="btn btn-falcon-default btn-sm me-2" value="save"></div>
                  </div>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
      <!----->
     
        
       
       
      <!---->
    
    

    </form>
 
                     
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

