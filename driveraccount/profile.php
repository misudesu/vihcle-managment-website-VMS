

<?php

require_once "../config.php";
session_start();

$driverids=	$_SESSION['driveruser_name'];
  // Check if username is empty
  if(empty($driverids)){
     echo "empty";
     
  } 
  else
  {

  
   
$query=$conn->query( "SELECT * FROM driver ");
$sql=$conn->query("SELECT * FROM users ");
$fullname=$driverids;
 if($query->num_rows > 0){
     while($row = $query->fetch_assoc()){
       $fornkey=$row['driverid'];
       if($fornkey==$driverids){
 $fullname =$row['fullname'];
          $email=$row['email'];
          $phonenumber=$row['phonenumber'];
  $driverid=$row['driverid'];
          $carid=$row['carid'];
          $startdate=$row['startdate'];
          $startime=$row['startime'];
          $enddate=$row['enddate'];
          $endtime=$row['endtime'];
          $registrationdeadline=$row['registrationdeadline'];
          $timezone=$row['timezone'];
          $age=$row['age'];
          $country=$row['country'];
          $address=$row['address'];
          $zone=$row['zone'];
          $city=$row['city'];
          $dphoto='../image/'.$row["dphoto"];
          $accountstats=$row["AccountStatus"];
          $dlicense='../image/'.$row["dlicense"];
      
       }
    
    }
  }else{
   
  }
  if($sql->num_rows>0){
    while($row = $sql->fetch_assoc()){
      $password=$row['password'];
    }
  }
 
  //$conn->close();
  }
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
<link rel="stylesheet" href="home/assets/css/imge.css">
        <script src="https://kit.fontawesome.com/537a489355.js" crossorigin="anonymous"></script>
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "../driveraccount/home/rightsidebar.php" ?>
            <?php include "../driveraccount/home/leftsidemenu.php" ?>
            <div class="content-page">
                <div class="content">
                
<?php include "../driveraccount/home/topbar.php" ?>
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 


                       
 
<!--end -->
<?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
    <div class="row g-0 p-4 p-md-5 pt-5 " style="margin-top: 100px; ">
    
        <div class=" col-md-3 pe-lg-3 mb-3">
          <div class="card h-lg-50 overflow-hidden">
            <div class="card-header bg-light">
                <div>
                    <div class="card " >
                       <!-- Image Zoom HTML -->   
                        <img  src="<?php echo $dphoto; ?>"  id="myImg" alt="profile_image">
                        
                        <div id="myModal" class="modal">
                            <img class="modal-content" id="img01">
                        <div id="caption"></div>
                        </div>
                      
                      </div>
                </div>
            </div>
            </div>
            <div class="card h-lg-50 overflow-hidden">
              <div class="card-header bg-light">
                  <div>
                      <div class="card" >
                         <!-- Image Zoom HTML -->   
                          <img  src="<?php echo $dlicense; ?>"  id="myImg1" alt="profile_image">
                          
                          <div id="myModal1" class="modal">
                              <img class="modal-content" id="img02">
                          <div id="caption1"></div>
                          </div>
                        
                        </div>
                  </div>
              </div>
              </div>
            
          </div>
   
        <div class="col-lg-8 ps-lg-4 mb-3">
          <div class="card h-lg-100">
            <div class="card-header">
              <div class="row flex-between-center">
                <div class="col-auto">
                  <h6 class="mb-0">profile Information</h6>
                </div>
                <div> 
                  <?= include 'updatepassword.php' ?>
                  <form action="updatepassword.php" method="POST">
                Full Name: <label> </label> <?= $fullname; ?> </br>
    Mobile: <label><?= $phonenumber; ?> </label> </br>
    Email:  <label>  <?= $email; ?> </label> </br>   
    </div>
    <div>
    user name: <input type="text" readonly  name="username" placeholder="user name" value="<?= $driverid; ?>"> 
     new password: <input type="text" name="password" placeholder="password" value="">
    </br>

    <button style="text-align: center; margin-top: 10px; margin-left: 50px;" name="change" type="submit">change</button>
</form> 
  </div>
               </div>
          </div>
        </div>
        <div class="col-lg-12 mb-5 my-5 pe-lg-2 ">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0"> Driver Info </h5>
            </div>
            <div class="card-body bg-light">
              <form>
                <div class="row gx-2">
                  <div class="col-12 mb-3"><label class="form-label" for="event-name">Full Name</label><input class="form-control" id="event-name" type="text" placeholder="Event Title" value="<?php echo $fullname; ?>" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input value="<?php echo $startdate; ?>" class="form-control datetimepicker flatpickr-input" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly" value="<?php echo $startdate; ?>"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input value="<?php echo $startime; ?>" class="form-control datetimepicker flatpickr-input" id="start-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input value="<?php echo $enddate; ?>" class="form-control datetimepicker flatpickr-input" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input value="<?php echo $endtime; ?>" class="form-control datetimepicker flatpickr-input" id="end-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly"></div>
                  <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input value="<?php echo $registrationdeadline; ?>" class="form-control datetimepicker flatpickr-input" id="registration-deadline" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly"></div>
                  <div class="col-sm-6"><label class="form-label" for="time-zone">Timezone</label><select aria-readonly="true" value="<?php echo $timezone; ?>" class="form-select" id="time-zone">
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
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-venue">age</label><input value="<?php echo $age; ?>" class="form-control" id="event-venue" type="text" placeholder="Venue"><button class="btn btn-link btn-sm btn p-0" type="button"></button></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-address">Country</label><input value="<?php echo $country; ?>" class="form-control" id="event-address" type="text" placeholder="Address"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-city">Address</label><input value="<?php echo $address; ?>" class="form-control" id="event-city" type="text" placeholder="City"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-state">Zone</label><input value="<?php echo $zone; ?>" class="form-control" id="event-state" type="text" placeholder="State"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-country">City</label><input value="<?php echo $city; ?>" class="form-control" id="event-country" type="text" placeholder="Country"></div>
                  
                </div>
              </form>
            </div>
          </div>

  
                  <!-- end row-->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<!---footer--->
<?php include "../driveraccount/home/footer.php" ?>
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
    
<script>
  // Get the modal
  var modal = document.getElementById('myModal');
  
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg');
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
      modal.style.display = "block";
      
      modalImg.src = this.src;
      modalImg.alt = this.alt;
      captionText.innerHTML = this.alt;
  }
  
  
  // When the user clicks on <span> (x), close the modal
  modal.onclick = function() {
      img01.className += " out";
      setTimeout(function() {
         modal.style.display = "none";
         img01.className = "modal-content";
       }, 400);
      
   }    
      
  </script>
  <!---end of profile zoom-->
  
  <!--license zoom script-->
  
<script>
  // Get the modal
  var modal = document.getElementById('myModal1');
  
  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById('myImg1');
  var modalImg = document.getElementById("img02");
  var captionText = document.getElementById("caption1");
  img.onclick = function(){
      modal.style.display = "block";
      
      modalImg.src = this.src;
      modalImg.alt = this.alt;
      captionText.innerHTML = this.alt;
  }
  
  
  // When the user clicks on <span> (x), close the modal
  modal.onclick = function() {
      img01.className += " out";
      setTimeout(function() {
         modal.style.display = "none";
         img01.className = "modal-content";
       }, 400);
      
   }    
      
  </script>
</html>

