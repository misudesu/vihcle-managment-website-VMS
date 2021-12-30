<?php 
session_start();
?>

<?php 
include "../config.php";
$panding="Active";
$Active=$conn->query("SELECT * FROM orgtable WHERE AccountStates='Active' ");
$delete=$conn->query("SELECT * FROM orgtable WHERE AccountStates='Delate' ");
$panding=$conn->query("SELECT * FROM orgtable WHERE AccountStates='panding' ");
if($Active->num_rows > 0){
  $count=mysqli_num_rows($Active);
 
  }else {
    $count="0";
  }if($panding->num_rows > 0){
    $Pcount=mysqli_num_rows($panding);
   
    }else {
      $Pcount="0";
    }if($delete->num_rows > 0){
      $Dcount=mysqli_num_rows($delete);
     
      }else {
        $Dcount="0";
      }
      $limit = 5;  
      if (isset($_GET["page"])) {
        $page  = $_GET["page"]; 
        } 
        else{ 
        $page=1;
        };  
    // $start_from = ($page-1) * $limit;  
   //   $result = mysqli_query($conn,"SELECT * FROM orgtable ORDER BY id ASC LIMIT $start_from, $limit");         
$sql="SELECT * FROM orgtable";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
   
    $date=$_POST['date'];
    $file=$_FILES['file']['name'];
   
$tm=$_FILES['file'] ['tmp_name'];
$name=$_POST['name'];
   
    move_uploaded_file($tm,"../file/".$file);
    $insert="INSERT INTO  orgfile VALUES ('','$name','$username','$date','$file','new') ";
    if ($conn->query($insert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $username . "<br>" . $conn->error;
    }
}
$username=$conn->query("SELECT * FROM orgtable ");
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
                        <div class="row">
<div class="col-12">

 
  <span class="badge bg-success ">Active <span class="badge bg-secondary"><?php echo"$count" ?></span></span>
<span class="badge bg-danger">Panding  <span class="badge bg-secondary"><?php echo"$Pcount" ?></span></span>
<span class="badge bg-warning text-dark">Daletded <span class="badge bg-secondary"><?php echo"$Dcount" ?></span> </span>
  </div>  
</div>

                       
 
<!--end -->

                        
<style>
        :after, :before {
            box-sizing: border-box;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        i{
        margin-bottom:4px;
        }
        .btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-app {
            color: white;
            box-shadow: none;
            border-radius: 3px;
            position: relative;
            padding: 10px 15px;
            margin: 0;
            min-width: 60px;
            max-width: 80px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
            font-size: 12px;
            transition: all .2s;
            background-color: steelblue !important;
        }
        .btn-app > .fa, .btn-app > .glyphicon, .btn-app > .ion {
            font-size: 30px;
            display: block;
        }
        .btn-app:hover {
            border-color: #aaa;
            transform: scale(1.1);
        }
        .pdf {
        background-color: #dc2f2f !important;
        }
        .excel {
            background-color: #3ca23c !important;
        }
        .csv {
            background-color: #e86c3a !important;
        }
        .imprimir {
            background-color: #8766b1 !important;
        }
        /*
        Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox
        .flexcontent {
            display: flex;
            justify-content: space-around;
        }
        */
        .selectTable{
        height:40px;
        float:right;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
            margin-top: 15px;
        }

        .btn-secondary {
            color: #fff;
            background-color: #4682b4;
            border-color: #4682b4;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: #315f86;
            border-color: #545b62;
        }
        .titulo-tabla{
        color:#606263;
        text-align:center;
        margin-top:15px;
        margin-bottom:15px;
        font-weight:bold;
        }
        .inline{
        display:inline-block;
        padding:0;
        }

    </style>
    
    <div class="container mt-1">
        <div class="row">
            <div class="col-12">
                <br>
                <h3 class="titulo-tabla">የተሽከርካር ጥገና መስርያ ቤቶች </h3>
                <hr>   
                        
                    
                    <?php
                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                    
                            <table id="ejemplo" class="table table-striped table-bordered" style="width:100%" >
                                <thead>
                                    <tr>
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">user name</th>
         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">org name </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">org Address  </th>

          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Date</th> 
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Account Status</th>
          <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            $id=$row['id'];
                                        ?>
                                        <tr>
                                        <td><?=$row['orgID'];?></td>
                                            <td><?= $row['orgName'] ;?></td>           
                                            <td><?= $row['orgAddress']; ?></td>
                                          <td><?=$row['StartDate']; ?> </td>
                                        
                                           <td><?=$row['AccountStates'];?></td>
                                           <td>
                                               
                                              <button   class=" btn btn-link text-dark text-sm mb-0 px-0 ms-4"><a class="media" href="../org/filee/<?php echo $row['orgFile']?>"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</a></button>
                                             
<?php
                                                echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                                 <a href="../driveraccount/process.php?Active=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >Active</button>
                                                 <a href="../driveraccount/process.php?Panding=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >pending</button>
                                                 <a href="../driveraccount/process.php?Delate=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >delate</button>
                                                </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>                          
                            </table>
                        <?php
                            // Free result set
                           // mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
       <button class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreens">Account</button>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" > 
    <div class="col-sm-4 p-3">
Name <input class="form-control " type="text" name="name">
<div class="col-sm-6 mb-3"><label class=" col-sm-6 form-label" for="carid">user name</label></label><select name="username" class="form-select " id="username"  placeholder="user name" >
                  <?php   while($row1 = mysqli_fetch_array($username)):;?>
   
                  <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?>
     
                </option>
                <?php endwhile;?>
                </select></div>
                                    
date <input class="form-control " type="date" name="date">
file <input class="form-control " type="file" name="file"> <br>
<button class="btn btn-primary form-control "  name="send">send</button>
</div>
</form>   
            </div>
        </div>
        
    </div>
  
        <!-- library js -->

        <div class="modal" id="exampleModalFullscreens">
    <div class="modal-dialog modal-fullscreen" style="display: block;" aria-modal="true" role="dialog">
    
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Organization account</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  ">
            <form class="control-label " action="orgConfig.php" method="POST" enctype="multipart/form-data">
                <div class="row mx-5" > 
               
                   <div class="card form-group col-8 ">
                
                       <div class="row ">
                         <div class=" col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"> <placeholder><b>የመንግስት መስያ ቤቱ ስም</b> </placeholder> <input class="form-control" name="orgName" type="text" id="orgname"></div>
                         <div class="col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"><placeholder><b>የጅመረበት ቀን</b> </placeholder><input class="form-control" name="StatrDate" type="date" id="startdate"></div>
                         <div class="col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"> <placeholder><b>የተከፈተበት ሰዐት</b></placeholder><input class="form-control" name="StartTime" type="time" id="starttime"></div>
                         <div class="col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"><placeholder><b>የሚያበቃበት ቀን</b> </placeholder><input class="form-control" name="EndDate" type="date" id="enddate"></div>
                         <div class="col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"><placeholer><b>የሚያበቃበት ሰአት</b></placeholer><input class="form-control" name="EndTime" type="time" id="endtime"></div>
                         <div class="col-12 col-md-4 col-lg-4 mt-2 mx-1 my-2 form-floating mb-1"><placeholder><b>የመስርያ ቤቱ አድራሻ </b> </placeholder><input class="form-control" name="orgAddress" type="text" id="orgAddress"></div>
                       </div>
                    
                   </div>
                   <div class="card form-group col-3 mx-5  ">
                   
                       <div class="form-floating mb-1 mt-1" ><label>user name</label><input  class="form-control" type="text" placeholder="username" name="orgID" id="orgID "></div>
                       <div class="form-floating mb-1" ><label>password</label><input class="form-control" type="password"  name="password" id="orgFile"></div>
                       <div class="form-floating mb-1" ><input class="form-control" type="file" placeholder="attach file" name="orgFile" id="orgFile"></div>
                      
              
                   </div>
                    <!---->
                    <div class="card-body">
          <div class="row justify-content-between align-items-center">
            <div class="col-md">
              <h5 class="mb-2 mb-md-0">Nice Job! You're almost done</h5>
            </div>
            <div class="col-auto"><button class="btn btn-falcon-default btn-sm me-2" type="submit">Save</button><button type="reset" class="btn btn-falcon-primary btn-sm">reset </button></div>
          </div>
        </div>
      </div>
                           </form>

                       </div> 
          </div>
              </div>
                <div class="modal-footer">
                <div class="card mt-1">
       
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
    
<!-----end of account creation fullpage-->  
                     
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

