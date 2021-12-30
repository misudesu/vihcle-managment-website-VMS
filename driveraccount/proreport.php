<?php 
session_start();
?>

<?php
                        // Include config file
                        include "../config.php ";
                    
                        $sql = "SELECT * FROM megazin WHERE who='driver'";
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                          $name=$_POST['name'];
                          $date=$_POST['date'];
                          $message=$_POST['message'];
                         $filename=$_FILES['file']['name'];
                          $tmL=$_FILES['file'] ['tmp_name'];
                          move_uploaded_file($tmL,"../file/".$filename);
                          $sqls = "INSERT INTO proreport
                          VALUES ('',
                          '$filename','$date','$name','$message' ,'new')";
                          if ($conn->query($sqls) === TRUE) {
                           $notif= "Document saved successfully";
                          } else {
                            echo "Error: " . $sqls . "<br>" . $conn->error;
                          }
                          }
                     
                 
                            
                          
                          
                     
                        // Attempt select query execution
                       
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

    <body   data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
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
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        
                        <!-- end page title --> 


                       
 
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
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <br>
                <h3 class="titulo-tabla">megazin </h3>
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
           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">name</th>
         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">file </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date </th>
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">permition</th>
            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                        <td><?= $row['name'] ;?></td>
                                            <td><?= $row['file'] ;?></td>           
                                            <td><?= $row['date']; ?></td>
                                            <td><?= $row['who'] ;?></td>
                                           <td>
                                               
                                              <button   class=" btn btn-link text-dark text-sm mb-0 px-0 ms-4"><a class="media" href="../file/<?php echo $row['file']?>"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</a></button>
                                              <?php  //echo "<a href='../distrbution/update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                //echo "<a href='../distrbution/delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>                          
                            </table>
                        <?php
                            // Free result set
                            mysqli_free_result($result);
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
           
            </div>
        </div>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" > 
     
  <div class="card mb-3 mt-5">
    <div class="card-header">
      <h5 class="mb-0">Upload your  document</h5>
    </div>
    <div class="card-body bg-light">
    
        <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="cloud-upload.svg" width="25" alt=""> <input type="file"  name="file"> or Drop your files here</div>
        <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
    
    </div>
    <div >
      <input type="date" required name="date">
      <input type="text" name="name" required placeholder="enter your name" value="">
    </div>
    <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text"></textarea>
          </div>
    <div id="save" class="col-auto mt-2 bg-gradient-success"><button class="btn bg-light mt-2 mx-4 display  btn-sm me-2" >Submit</button></div>
        
  </div>
    </form>
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
</html>

