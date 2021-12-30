<?php 
session_start();
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

    
<div class="row g-0 p-4 p-md-5 pt-5  " style="margin-top: 50px;">

<!-----post form link table-->
<div>

     
 <div class="text-center pt-2" >
     <h2>Request your problem</h2>
 <p>Type and search the table for request Form Document:</p>  
 <br>
 </div>   
<div class=" card p-4 p-md-5 pt-2 table-responsive scrollbar">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<br>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th scope="col">Name</th>

<th class="text-end" scope="col">download</th>
</tr>
</thead>
<tbody id="myTable">
<tr>
<td>Ricky Antony</td>

<td class="text-end">
<div><div class="form-check form-switch">
<button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button></div>
</div>
</td>
</tr>
<tr>
<td>Emma Watson</td>

<td class="text-end">
<div><div class="form-check form-switch">
 <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button></div>
</div>
</td>
</tr>
<tr>
<td>Rowen Atkinson</td>

<td class="text-end">
<div><div class="form-check form-switch">
  <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button></div>
</div>
</td>
</tr>
<tr>
<td>Antony Hopkins</td>

<td class="text-end">
<div><div class="form-check form-switch">
 <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button></div>
</div>
</td>
</tr>
<tr>
<td>Jennifer Schramm</td>

<td class="text-end">
<div><div class="form-check form-switch">

 <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button></div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<!----end-->

<div class="card mb-3 mt-5">
 <div class="card-header">
   <h5 class="mb-0">Upload your  document</h5>
 </div>
 <div class="card-body bg-light">
   <form class="dropzone dropzone-multiple p-0 dz-clickable" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
     
     <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="cloud-upload.svg" width="25" alt=""> <input type="file"> or Drop your files here</div>
     <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column"></div>
   </form>
 </div>
 <div class="col-auto mt-2 bg-gradient-success"><button class="btn bg-light mt-2 mx-4  btn-sm me-2">Submit</button></div>
     
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
</html>

