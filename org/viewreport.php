<?php 
session_start();
?>

<?php 
include "../config.php";
$panding="Active";
$Active=$conn->query("SELECT * FROM orgreport WHERE status='new' ");
$panding=$conn->query("SELECT * FROM orgreport WHERE status='seen' ");
if($Active->num_rows > 0){
  $count=mysqli_num_rows($Active);
 
  }else {
    $count="0";
  }if($panding->num_rows > 0){
    $Pcount=mysqli_num_rows($panding);
   
    }else {
      $Pcount="0";
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
$sql="SELECT * FROM orgreport";

$username=$conn->query("SELECT * FROM orgreport ");
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

 
  <span class="badge bg-success ">new <span class="badge bg-secondary"><?php echo"$count" ?></span></span>
<span class="badge bg-danger">seen  <span class="badge bg-secondary"><?php echo"$Pcount" ?></span></span>
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
                <h3 class="titulo-tabla">የተሽከርካር ጥገና መስርያ ቤቶች ሪፖርት  </h3>
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

         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">org name </th>
        
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Date</th> 
          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Status</th>
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
                                        <td><?=$row['orgname'];?></td>
                                                 
                                       
                                          <td><?=$row['date']; ?> </td>
                                        
                                           <td><?=$row['status'];?></td>
                                           <td>
                                               
                                              <button   class=" btn btn-link text-dark text-sm mb-0 px-0 ms-4"><a class="media" href="../org/filee/<?php echo $row['file']?>"><i class="fas fa-file-pdf text-lg me-1" aria-hidden="true"></i> PDF</a></button>
                                             
<?php
                                                 echo "<a style='color:red;' href='reportDelete.php?id=". $row['id'] ."' title='Delete Record' class='action-icon'> <i class='mdi mdi-delete'></i></a>";
                                              ?>
                                                 <a href="../driveraccount/process.php?orgseen=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >Seen</button>
                                
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
           
            </div>
        </div>
        
    </div>
  
        <!-- library js -->

      
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

