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
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $date=$_REQUEST['date'];
$travllocation=$_REQUEST['travllocation'];
$arrivedate=$_POST['arrivedate'];
$km=$_REQUEST['km'];
$travldate=$_REQUEST['travldate'];
$carlocation=$_REQUEST['carlocation'];
$gej=$_REQUEST['gej'];
$name=$_POST['name'];
$carid=$_POST['carid'];
$comment=$_REQUEST['comment'];
$file=$_FILES['file']['name'];
$tmL=$_FILES['file'] ['tmp_name'];
move_uploaded_file($tmL,"../driveraccount/file/".$file);


$sql = "INSERT INTO report 
VALUES ('','$name','$carid','$date','$travldate',	'$arrivedate',
'	$km',	'$travldate',
'	$carlocation','	$gej','	$comment','	$file','new'	
)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//date_default_timezone_set('GMT+3/Africa/Addis_Ababa'); // CDT
                        
$date=date("Y-m-d");
$check=$conn->query("SELECT * from report ");
if($check->num_rows>0){
  while($row = $check->fetch_assoc()){
   
    $time=date("h:i:s");
   // $k= "$date";
if( $date==$row['date'] ){
  $css = "display:none";
  $cssupdate="display:block";

 // $k=  "Today is ui " . date("Y/m/d") . "<br>";
}else{
  $css = "display:block";
  $cssupdate="display:none";
}
  }
}else{
  $cssupdate="display:none";
}


$resently=$conn->query("SELECT * FROM report WHERE date='$date' "); 
if($resently->num_rows>0){
  while($row = $resently->fetch_assoc()){
$date= $row['date'];
$travllocation=$row['travllocation'];
$arrivedate=$row['arrivedate'];
$km=$row['km'];
$travldate=$row['travldate'];
$carlo=$row['carlocation'];
$gej=$row['gej'];
$comment=$row['comment'];
$Afile=$row['file'];
$status=$row['stutes'];
$id=$row['id'];
    $carid=$row['carid'];
    $name=$row['name'];
    
  }
}

//$conn->close();
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
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" >
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-3 col-form-label">ቀን </label><br>
    <div class="col-sm-10 "><br>
      <input type="date" class="form-control" id="inputEmail3" name="date" value="<?= $date ?>" readonly >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የሄደበት ቀን  </label><br>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" name="travldate" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ስም   </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="ስም" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የተሽከርካሪ ሰሌዳ   </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" name="carid" placeholder="የተሽከርካሪ ሰሌዳ " >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የመጣበት ቀን </label><br>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" name="arrivedate" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የሽፈነው ከሎ ሜትር </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="የሽፈነው ከሎ ሜትር" name="km" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">የሄደበት ቦታ </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="የሄደበት ቦታ" name="travllocation"><br>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend><br>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="carlocation" id="gridRadios1" value="መኪናው ጊቢ ውስጥ ነው" checked><br>
          <label class="form-check-label" for="gridRadios1">
            መኪናው ጊቢ ውስጥ ነው 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="carlocation" id="gridRadios2" value="መኪናው ከጊቢ ውጭ ነው"><br>
          <label class="form-check-label" for="gridRadios2">
            መኪናው ከጊቢ ውጭ ነው 
          </label>
        </div>
       
        
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ጌጅ ላይ ያለው የአሁን ንባብ </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="ጌጅ ላይ ያለው የአሁን ንባብ" name="gej" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">አስተያየት  </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  placeholder="አስተያየት" name="comment" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ፋይል ካሎት   </label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="inputEmail3"  placeholder="አስተያየት" name="file" >
     
    </div>
  </div>
  <div class="form-group row">
    <div id="save" class="col-sm-10">
      <button style="<?=$css?>;" name="save"  type="submit" class="btn btn-primary">save</button>
      
    </div>
  </div>
</form>
                        <!-- end row-->

                  
            
                    <a >  <button style="<?=$cssupdate;?>" type="button"  class="btn btn-primary" name="update" id="update" data-bs-toggle="modal" data-bs-target="#add">Update</button></a>  
 <!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> update report </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="update.php" method="post" enctype="multipart/form-data" >
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-3 col-form-label">ቀን </label><br>
    <div class="col-sm-10 "><br>
      <input type="date" class="form-control" id="inputEmail3" name="date" value="<?=$date ?>" readonly >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የሄደበት ቀን  </label><br>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" name="travldate" value="<?=$travldate?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ስም   </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" value="<?=$name?>" name="name" placeholder="ስም" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የተሽከርካሪ ሰሌዳ   </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" value="<?=$carid?>" name="carid" placeholder="የተሽከርካሪ ሰሌዳ " >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የመጣበት ቀን </label><br>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputEmail3" name="arrivedate"  value="<?=$arrivedate ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">የሽፈነው ከሎ ሜትር </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="የሽፈነው ከሎ ሜትር" value="<?=$km?>" name="km" >
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">የሄደበት ቦታ </label><br>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="የሄደበት ቦታ" value="<?=$travllocation?>" name="travllocation"><br>
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0"></legend><br>
      <div class="col-sm-10">
        <div class="form-check">
          <?php
          if($carlo==="መኪናው ጊቢ ውስጥ ነው") {
           $car="መኪናው ጊቢ ውስጥ ነው";
           $carr="መኪናው ከጊቢ ውጭ ነው";
          }elseif ($carlo==="መኪናው ከጊቢ ውጭ ነው") {
           $car="መኪናው ከጊቢ ውጭ ነው";
           $carr="መኪናው ጊቢ ውስጥ ነው";
          } 
          
          ?>
          <input class="form-check-input" type="radio" name="carlo" id="gridRadios1" value="<?=$car?>" ><br>
          <label class="form-check-label" for="gridRadios1">
            መኪናው ጊቢ ውስጥ ነው 
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="carlo" id="gridRadios2" value="<?=$carr?>"><br>
          <label class="form-check-label" for="gridRadios2">
            መኪናው ከጊቢ ውጭ ነው 
          </label>
        </div>
       
        
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ጌጅ ላይ ያለው የአሁን ንባብ </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="ጌጅ ላይ ያለው የአሁን ንባብ" value="<?=$gej?>" name="gej" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">አስተያየት  </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3"  placeholder="አስተያየት" value="<?=$comment?>" name="comment" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">ፋይል ካሎት   </label>
    <div class="col-sm-10">
    <input type="text" hidden name="old" value="<?php echo $Afile?>">
      <input type="file" class="form-control" id="inputEmail3"  placeholder="file"  name="file" />
      <span  value="<?=$Afile?>"><?php echo $Afile?></span>
     
    </div>
  </div>
  <div class="form-group row">
    <input type="text" hidden name="id"  value="<?=$id?>">
    <div class="col-sm-10">
      <button     type="submit" class="btn btn-primary">update</button>
      
    </div>
  </div>
</form>
      </div>
     
    </div>
  </div>
</div>



                   
                    <!---->  
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

