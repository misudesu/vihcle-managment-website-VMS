

<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
   include "../config.php" ;
    $carlocation=$conn->query("SELECT * FROM report WHERE stutes='new'");
    $Acarlocation=$conn->query("SELECT * FROM trip WHERE City='out city'");
    $Bcarlocation=$conn->query("SELECT * FROM report WHERE stutes='seen'");
    $org=$conn->query("SELECT * FROM orgreport WHERE status='new'");
   
    $total=$conn->query("SELECT * FROM report ");
      if($carlocation->num_rows > 0){
        //$city=mysqli_num_rows($carlocation);
    $rowcount=mysqli_num_rows($carlocation);

               }else{
                $rowcount="0";
               }if($Acarlocation->num_rows > 0){
                $Acity=mysqli_num_rows($Acarlocation);
                   }else{
                     $Acity="0";
                   }if($Bcarlocation->num_rows > 0){
                    $rowcountseen=mysqli_num_rows($Bcarlocation);
                       }else{
                        $rowcountseen="0";
                       }if($total->num_rows > 0){
                        $retotal=mysqli_num_rows($total);
                           }else{
                            $retotal="0";
                           }if($org->num_rows > 0){
                            $orgnew=mysqli_num_rows($org);
                               }else{
                                $orgnew="0";
                               }
                  
   
                               $limit = 3;  
                               if (isset($_GET["page"])) {
                                 $page  = $_GET["page"]; 
                                 } 
                                 else{ 
                                 $page=1;
                                 };  
                               $start_from = ($page-1) * $limit;  
                               $result = mysqli_query($conn,"SELECT * FROM orgreport where status='new' ORDER BY id ASC LIMIT $start_from, $limit");         
                         
                         
                               $limit = 3;  
                               if (isset($_GET["page"])) {
                                 $page  = $_GET["page"]; 
                                 } 
                                 else{ 
                                 $page=1;
                                 };  
                               $start_from = ($page-1) * $limit;  
                               $outcity = mysqli_query($conn,"SELECT * FROM trip WHERE City='out city' ORDER BY id ASC LIMIT $start_from, $limit ");         
                             
                               $limit = 3;  
                               if (isset($_GET["page"])) {
                                 $page  = $_GET["page"]; 
                                 } 
                                 else{ 
                                 $page=1;
                                 };  
                               $start_from = ($page-1) * $limit;  
                               $PROreport= mysqli_query($conn,"SELECT * FROM proreport WHERE status='new' ORDER BY id ASC LIMIT $start_from, $limit ");         
                             
                               
                               $limit1 = 3;  
                               if (isset($_GET["page"])) {
                                 $page  = $_GET["page"]; 
                                 } 
                                 else{ 
                                 $page=1;
                                 };  
                               $start_from = ($page-1) * $limit;  
                               $schedulreport= mysqli_query($conn,"SELECT * FROM schedule WHERE status='new' ORDER BY id ASC LIMIT $start_from, $limit ");         
                             
                               
    
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
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
        <script src="https://kit.fontawesome.com/537a489355.js" crossorigin="anonymous"></script>
      
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
       
        <div class="wrapper">
           
        
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php include "rightsidebar.php" ?>
            <?php include "leftsidemenu.php"?>
            <div class="content-page">
                <div class="content">
                
<?php include "topbar.php" ?>
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Projects</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Daily report</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
<?php
 $vehicl=$conn->query( "SELECT * FROM vehicle WHERE cartype='Bus' ") ;
 $vehiclCompact=$conn->query( "SELECT * FROM vehicle WHERE cartype='Compact Car' ") ;
 $Totalvehicl=$conn->query( "SELECT * FROM vehicle ") ;
 $driver=$conn->query( "SELECT * FROM driver ") ;
 if($vehicl->num_rows > 0){
    //$city=mysqli_num_rows($carlocation);
$numBus=mysqli_num_rows($vehicl);
 }else{
$numBus="0";
 }if($vehiclCompact->num_rows > 0){
    //$city=mysqli_num_rows($carlocation);
$numComp=mysqli_num_rows($vehiclCompact);
 }else{
$numComp="0";
 }if($Totalvehicl ->num_rows > 0){
    //$city=mysqli_num_rows($carlocation);
$numTotal=mysqli_num_rows($Totalvehicl);
 }else{
$numTotal="0";
 }if($driver ->num_rows > 0){
    //$city=mysqli_num_rows($carlocation);
$Totaldriver=mysqli_num_rows($driver);
 }else{
$Totaldriver="0";
 }
?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?=$numBus?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Bus</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?= $numComp?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total Compact Car</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?=$numTotal?></span></h3>
                                                        <p class="text-muted font-15 mb-0">Total vehicle </p>
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-sm-6 col-xl-3">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                                        <h3><span><?= $Totaldriver?></span> <i class="mdi mdi-arrow-up text-success"></i></h3>
                                                        <p class="text-muted font-15 mb-0">Total Driver</p>
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>

                       
                        <!-- end row-->
                        <div class="row" >
<div class="col-1 col-sm-12"></div>
          <div class="col-sm-6 col-xl-5 card ">
          <span class="badge bg-success ">Org report <span class="badge bg-secondary"><?php echo"$orgnew" ?></span></span>
          <table  class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>user name</th>
              
                <th>date</th>
                <th>status</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php //$query=$conn->query( "SELECT * FROM orgfile WHERE catagory='new' ") ;
while($row = $result->fetch_assoc()):
  $drivername=$row['orgname'];
 
  $location=$row['date'];
  $enddate=$row['status'];

  ?>
<tr>
  <td> <?=$drivername;?></td>
 
  <td><?=$location;?></td>
  <td><?=$enddate;?></td>
</tr>

<?php 
endwhile;
 
?>
              </tbody>
            </table>
            <?php  
$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM orgreport where status='new' ");
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {

              $pagLink .= "<li class='page-item'><a class='page-link' href='../home/home.php?page=".$i."'>".$i."</a></li>";	

            }

echo $pagLink . "</ul>";  
?>
          </div>
          <!--start-->
          <div class="col-md-5 col-sm-12 col-xl-5 card">
          <span class="badge bg-warning "><strong>Out of city</strong> <span class="badge bg-secondary"><?php echo"$Acity" ?></span> </span>

          <table  class="table table-bordered table-striped">
       
              <thead>
                <tr>
                <th>name</th>
                <th>car type</th>
                <th>location</th>
                <th>end date</th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php  //$query=$conn->query( "SELECT * FROM trip WHERE City='out city' ") ;
while($row = $outcity->fetch_assoc()):
  $drivername=$row['divID'];
  $carid=$row['carID'];
  $location=$row['startLocation'];
  $enddate=$row['EndDate'];
  $locationend=$row['endLocation'];
  ?>
<tr>
  <td> <?=$drivername?></td>
  <td><?=$carid?></td>
  <td><?=$location." : ".$locationend?></td>
  <td><?=$enddate?></td>
</tr>

<?php 
endwhile;
 
?>
              </tbody>
            </table>
            <?php  
$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM trip WHERE City='out city'");
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {

              $pagLink .= "<li class='page-item'><a class='page-link' href='../home/home.php?page=".$i."'>".$i."</a></li>";	

            }

echo $pagLink . "</ul>";  
?>
          </div>
                        </div>   
<!--end -->

                        <div class="row mt-2">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-4">Daily Report   </h4>

                                        <div class="my-4 chartjs-chart" style="height: 202px;">
                                            <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                                        </div>

                                        <div class="row text-center mt-2 py-2">
                                            <div class="col-4">
                                                <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                                                <h3 class="fw-normal">
                                                    <span><?php  echo $rowcount;?></span>
                                                </h3>
                                                <p class="text-muted mb-0">አዳድስ ሪፖርቶች </p>
                                            </div>
                                            <div class="col-4">
                                                <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                                                <h3 class="fw-normal">
                                                    <span><?php echo $rowcountseen;?></span>
                                                </h3>
                                                <p class="text-muted mb-0"> የታዩ ረፖርቶች </p>
                                            </div>
                                            <div class="col-4">
                                                <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                                                <h3 class="fw-normal">
                                                    <span><?php  echo $retotal;?></span>
                                                </h3>
                                                <p class="text-muted mb-0"> አጠቃላይ ረፖርቶች </p>
                                            </div>
                                        </div>
                                        <!-- end row-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-3">Issues</h4>
                                        <?php
                                        $proreport=$conn->query( "SELECT * FROM proreport ") ;
                                        $seenreport=$conn->query( "SELECT * FROM proreport  WHERE status='seen'") ;
                                        if($proreport->num_rows > 0){
                                           //$city=mysqli_num_rows($carlocation);
                                       $report=mysqli_num_rows($proreport);
                                        }else{
                                       $report="0";
                                        }if($seenreport->num_rows > 0){
                                            //$city=mysqli_num_rows($carlocation);
                                        $reportseen=mysqli_num_rows($seenreport);
                                         }else{
                                        $reportseen="0";
                                         }
                                        
                                        ?>

                                        <p><b><?=$reportseen?></b> Tasks seen out of <?=$report?></p>

                                        <div class="table-responsive">

                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                <?php  //$query=$conn->query( "SELECT * FROM trip WHERE City='out city' ") ;
while($row = $PROreport->fetch_assoc()):
  $name=$row['name'];
  $date=$row['date'];
  $status=$row['status'];

  ?>



                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">name</a></h5>
                                                            <span class="text-muted font-13"><?=$name?></span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Status</span> <br>
                                                            <span class="badge badge-success-lighten"><?=$status?></span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">date</span>
                                                            <h5 class="font-14 mt-1 fw-normal"><?=$date?></h5>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Total time spend</span>
                                                            <h5 class="font-14 mt-1 fw-normal">3h 20min</h5>
                                                        </td>
                                                        <td class="table-action" style="width: 90px;">
                                                       </td>
                                                    </tr>
                                                   
                                                   
                                                    
                                                    <?php 
endwhile;
 
?>
                                                </tbody>
                                            </table>
                                            <?php  
$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM proreport WHERE status='new'");
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {

              $pagLink .= "<li class='page-item'><a class='page-link' href='../home/home.php?page=".$i."'>".$i."</a></li>";	

            }

echo $pagLink . "</ul>";  
?>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->


                        
                        <div class="row">
                            <div class="col-xl-5">
                              
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                          
                                        <h4 class="header-title mb-3">Your Calendar</h4>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div data-provide="datepicker-inline" data-date-today-highlight="true" class="calendar-widget"></div>
                                            </div> <!-- end col-->
                                             

                                            <div class="card  col-6 col-lg-4 ">
                                                <div class="row">
            <div class="card-header pb-0">
              <h6>Schedule Events</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">important</span> 
              </p>
            </div>
            <div class="card-body mb-3 ">
              <div class="timeline timeline-one-side">
              <?php  //$query=$conn->query( "SELECT * FROM schedule WHERE status='new' ") ;
while($row = $schedulreport->fetch_assoc()):
  $name1=$row['title'];
  $date1=$row['start'];
  $status1=$row['status'];

  ?>

                <div class="timeline-block  ">
                  <span class="timeline-step">
                    <i class="ni uil-bell <?= $row['colore']?> text-gradient"> </i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0"><?= $name1 ?></h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $date1?></p>
                  </div>

                </div>
                <?php 
                endwhile;
                ?>
                </div>
                <?php   $result_db1 = mysqli_query($conn,"SELECT COUNT(id) FROM schedule");
$row_db1 = mysqli_fetch_row($result_db1);  
$total_records1 = $row_db1[0];  
$total_pages1 = ceil($total_records1 / $limit1); 
/* echo  $total_pages; */
$pagLink1 = "<ul class='pagination'>";  
for ($ii=1; $ii<=$total_pages1; $ii++) {

              $pagLink1 .= "<li class='page-item'><a class='page-link' href='../home/home.php?page=".$ii."'>".$ii."</a></li>";	

            }

echo $pagLink1 . "</ul>";  
?>
                </div>
              </div>
                                            </div>
            </div>
      
          </div>


                                        <!-- end row -->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->

                        </div>
                        <!-- end row-->

                        
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

<!---footer--->
<?php include "footer.php" ;  ?>
<!---end--->
        </div>
        <!-- END wrapper -->

<!---right side bar--->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
       <!--  <script src="assets/js/pages/demo.dashboard-projects.js"></script> -->
       <script  type="text/javascript">
       var n="<?php echo $rowcount ?>";
       var total="<?php echo $retotal ?>";
       var seen="<?php echo $rowcountseen ?>";
       !function(o){"use strict";function t(){this.$body=o("body"),this.charts=[]}t.prototype.respChart=function(r,a,e,n){Chart.defaults.global.defaultFontColor="#8391a2",Chart.defaults.scale.gridLines.color="#8391a2";var i=r.get(0).getContext("2d"),s=o(r).parent();return function(){var t;switch(r.attr("width",o(s).width()),a){case"Line":t=new Chart(i,{type:"line",data:e,options:n});break;case"Bar":t=new Chart(i,{type:"bar",data:e,options:n});break;case"Doughnut":t=new Chart(i,{type:"doughnut",data:e,options:n})}return t}()},t.prototype.initCharts=function(){var t,r,a,e=[];return 0<o("#task-area-chart").length&&(t={labels:["Sprint 1","Sprint 2","Sprint 3","Sprint 4","Sprint 5","Sprint 6","Sprint 7","Sprint 8","Sprint 9","Sprint 10","Sprint 11","Sprint 12","Sprint 13","Sprint 14","Sprint 15","Sprint 16","Sprint 17","Sprint 18","Sprint 19","Sprint 20","Sprint 21","Sprint 22","Sprint 23","Sprint 24"],datasets:[{label:"This year",backgroundColor:o("#task-area-chart").data("bgcolor")||"#727cf5",borderColor:o("#task-area-chart").data("bordercolor")||"#727cf5",data:[16,44,32,48,72,60,84,64,78,50,68,34,26,44,32,48,72,60,74,52,62,50,32,22]}]},e.push(this.respChart(o("#task-area-chart"),"Bar",t,{maintainAspectRatio:!1,legend:{display:!1},tooltips:{intersect:!1},hover:{intersect:!0},plugins:{filler:{propagate:!1}},scales:{xAxes:[{barPercentage:.7,categoryPercentage:.5,reverse:!0,gridLines:{color:"rgba(0,0,0,0.05)"}}],yAxes:[{ticks:{stepSize:10,display:!1},min:10,max:100,display:!0,borderDash:[5,5],gridLines:{color:"rgba(0,0,0,0)",fontColor:"#fff"}}]}}))),0<o("#project-status-chart").length&&(a={labels:["አዳዲስ ረፖርቶች ","የታዩ ","አጠቃላይ ረፖርት የተደረጉ "],
datasets:[{data:[n,seen,total],backgroundColor:(r=o("#project-status-chart").data("colors"))?r.split(","):["#0acf97","#727cf5","#fa5c7c"],borderColor:"transparent",borderWidth:"3"}]},e.push(this.respChart(o("#project-status-chart"),"Doughnut",a,{maintainAspectRatio:!1,cutoutPercentage:80,legend:{display:!1}}))),e},t.prototype.init=function(){var r=this;Chart.defaults.global.defaultFontFamily='-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',r.charts=this.initCharts(),o(window).on("resize",function(t){o.each(r.charts,function(t,r){try{r.destroy()}catch(t){}}),r.charts=r.initCharts()})},o.ChartJs=new t,o.ChartJs.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.ChartJs.init()}();
</script>
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

<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>