<?php 
session_start();
?>

<?php
			   require_once "../config.php";
         $sql=$conn->query("SELECT * FROM car ");
			   $driverid=$conn->query("SELECT * FROM driver ");
			   
?>

<form method="POST" action="../driver/driverinfo.php" enctype="multipart/form-data">
  <div class="row g-0  " >
        <div class="col-lg-8 pe-lg-2">
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0"> Driver Info </h5>
            </div>
            <div class="card-body bg-light">
              <form>
                <div class="row gx-2">
                  <div class="col-12 mb-3"><label class="form-label" for="event-name"> Full Name</label><input name="fullname" class="form-control" id="event-name" type="text" placeholder="Event Title"></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="email">Email</label><input name="email" class="form-control  " id="email" type="email" placeholder="email"  ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="phonenumber">Phone Namuber</label><input name="phonenumber" class="form-control " id="phonenumber" type="number" placeholder="09...." ></div>
                 <div class="col-sm-6 mb-3"><label class="form-label" for="password">password</label><input name="password" class="form-control " id="password" type="password" placeholder="...." ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="driverid">Driver ID </label><input  name="driverid" class="form-control " id="driverid" type="text" placeholder="user name" >
                 
                  </div>
                
                   
  
                  <div class="col-sm-6 mb-3"><label class="form-label" for="carid">Car ID</label><select name="carid" class="form-select " id="carid"  placeholder="...." >
                  <?php   while($row1 = mysqli_fetch_array($sql)):;?>
   
                  <option value="<?php echo $row1[14];?>"><?php echo $row1[14];?>
     
                </option>
                <?php endwhile;?>
                </select></div>
                
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input name="startdate" class="form-control datetimepicker flatpickr-input" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input name="starttime" class="form-control datetimepicker flatpickr-input" id="start-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input name="enddate" class="form-control datetimepicker flatpickr-input" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input name="endtime" class="form-control datetimepicker flatpickr-input" id="end-time" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" ></div>
                  <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input name="registrationdeadline" class="form-control datetimepicker flatpickr-input" id="registration-deadline" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"></div>
                  <div class="col-sm-6"><label class="form-label" for="time-zone">Timezone</label><select name="timezone" class="form-select" id="time-zone">
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
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-venue">Age</label><input name="age" class="form-control" id="age" type="text" placeholder="Venue"><button class="btn btn-link btn-sm btn p-0" type="button">Online Event</button></div>
                  <div class="col-sm-6 mb-3"><label class="form-label" for="event-address">Country</label><input name="country" class="form-control" id="country" type="text" placeholder="Address"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-city">Address</Address></label><input name="address" class="form-control" id="address" type="text" placeholder="City"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-state">Zone</label><input name="zone" class="form-control" id="zone" type="text" placeholder="State"></div>
                  <div class="col-sm-4 mb-3"><label class="form-label" for="event-country">City</label><input name="city" class="form-control" id="city" type="text" placeholder="Country"></div>
                  
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
                  <input name="dphoto" class=" block" type="file">
                </div>
                <div class="card-body bg-light">
                  <form class="dropzone dropzone-multiple p-0 dz-clickable" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
                    
                    <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="cloud-upload.svg" width="25" alt="">Drop your files here</div>
                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
                  </form>
                </div>
              </div>
<hr>
<div class="card mb-3">
    <div class="card-header">
      <h5 class="mb-0">Upload driver license</h5>
      <input name="dlicense" class=" block" type="file">
    </div>
    <div class="card-body bg-light">
      <form class="dropzone dropzone-multiple p-0 dz-clickable" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
        
        <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="cloud-upload.svg" width="25" alt="">Drop your files here</div>
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
                    <div class="col-auto"><input type="submit" name="submit" class="btn btn-falcon-default btn-sm me-2" value="save"><button class="btn btn-falcon-primary btn-sm">Make update</button></div>
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
 