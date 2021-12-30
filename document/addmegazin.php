<?php 
session_start();
?>

<?php 
include "../config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name=$_POST['name'];
  $date=$_POST['date'];
  $howacces=$_POST['who'];
    $filename=$_FILES['file']['name'];
  $tmL=$_FILES['file'] ['tmp_name'];
  move_uploaded_file($tmL,"../file/".$filename);
  $sql = "INSERT INTO megazin
  VALUES ('','$name',
  '$filename','$howacces','$date')";
  if ($conn->query($sql) === TRUE) {
    echo "Document saved successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
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
<div class="row mt-5 mx-1">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" > 
      <div class="col-6">
          <p>Add / store  file for drivers or as a megazin!</p>

        </div>
        <div class="col-4">
            <label for="name">document name</label>
<input required class="form-control" type="text" id="name" name="name">
<div>
    <input class="form-control" required type="date" name="date">
</div>
        </div>
        <div class="col-5">
            <label for="pdf"> attach file with pdf format</label>
        <input required class="form-control" type="file" name="file" id="pdf">
        <div>
            <select required class="form-select" name="who">
                <option value="admin">admin</option>
                <option value="driver">driver</option>
           <option value="distrpution">distrbution</option>
           <option value="publisher">publisher</option>
            </select>
        </div>
        </div>
<div class="col-4">
    <button class="btn btn-primary" type="submit" name="save"> save </button>
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

