<?php
 include "../config.php";
 $sql ="SELECT * FROM alart";

?>
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


    <!---- start crud ---->
   
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <br>
                <h3 class="titulo-tabla"> Alart to all driver  </h3>
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
                                  
                                   
           
             
            <th > alart types  </th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date </th>
            <th >end date </th>
            <th >status</th>
            <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                        <td><?= $row['title'] ;?></td>
                                            <td><?= $row['start'] ;?></td>           
                                           <td><?= $row['enddate'] ;?></td>
                                            <td><?= $row['status'] ;?></td>
                                            <td>
 <?php 
  echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>";
                                               
echo "<a style='color:red;' href='delate.php?id=". $row['id'] ."' title='Delete Record' class='action-icon'> <i class='mdi mdi-delete'></i></a>";
                                             
                                                ?>
                                                  <?php $id=$row['id']; ?>
                                               
                                                 <a >  <button type="button"  class="btn btn-primary" name="updates" id="updates" data-bs-toggle="modal" data-bs-target="#<?php echo "update".$id;?>">update</button></a>  

                                            </td>
                                        </tr>
<!----update modale ----->
<!-- Modal -->
<div class="modal fade" id="<?php echo "update".$id;?>"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Add Schedule </h5>
        <a href="alart.php">   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </a>
     
    </div>
      <div class="modal-body">
		
      <form  action=" bdd.php" method="post">
     
          <div class="form-group">
         <label for="message-text" class="col-form-label"> Activity:</label>
            <textarea name="activity" class="form-control" id="message-text" aria-valuetext=""><?=$row['Activity'] ?></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type of Activity:</label>
            <input type="text" value="<?=$row['title'] ?>"  name="typesof" class="form-control" id="recipient-name">
               
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">event color:</label>
            <select type="text"  name="colore" class="form-control" id="recipient-name"  >
            <?php  
            if($row['colore']=="alert-danger"){
$red="red";
?>
 <option value="<?=$row['colore'] ?>"><?=$red ?></option>
                <option value="alert-danger">red </option>
                <option value="alert-warning">yellow</option>
                <option value="alert-success">green</option>
                <option value="alert-primary">normal </option>
<?php 
            } elseif ($row['colore']=="alert-warning") {
               $yelaw="yellow";

               ?>
 <option value="<?=$row['colore'] ?>"><?=$yelaw ?></option>
                <option value="alert-danger">red </option>
                <option value="alert-warning">yellow</option>
                <option value="alert-success">green</option>
                <option value="alert-primary">normal </option>
               <?php
            } elseif ($row['colore']=="alert-success") {
               $gren="green";

               ?>
 <option value="<?=$row['colore'] ?>"><?=$gren ?></option>
                <option value="alert-danger">red </option>
                <option value="alert-warning">yellow</option>
                <option value="alert-success">green</option>
                <option value="alert-primary">normal </option>
               <?php
            } else {
             $normal="normal";

             ?>
 <option value="<?=$row['colore'] ?>"><?=$normal ?></option>
                <option value="alert-danger">red </option>
                <option value="alert-warning">yellow</option>
                <option value="alert-success">green</option>
                <option value="alert-primary">normal </option>
             <?php
            }
            
            ?>
           
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date and Time:</label>
            <input type="date" name="date" class="form-control" id="recipient-name" value="<?= $row['start']?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">End Date:</label>
            <input type="date" name="enddate" class="form-control" id="recipient-name" value="<?= $row['enddate']?>">
        <input type="text" name="id" value="<?php echo $id; ?>" hidden> 
        </div>
        
      

</div>
      <div class="modal-footer">
    <button type="submit"  class="btn btn-primary" name="update" >update </button>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!-----end---->
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
    <!------end----->                
 
<!-- end -->
<a >  <button type="button"  class="btn btn-primary" name="adds" id="adds" data-bs-toggle="modal" data-bs-target="#add">Open</button></a>  
											
<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="5" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"> Add Schedule </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		
      <form  action=" bdd.php" method="post">
     
          <div class="form-group">
         <label for="message-text" class="col-form-label"> Activity:</label>
            <textarea name="activity" class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type of Activity:</label>
            <input type="text"  name="typesof" class="form-control" id="recipient-name">
         
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type of Activity:</label>
            <select type="text"  name="colore" class="form-control" id="recipient-name">
                <option value="">....</option>
                <option value="alert-danger">red </option>
                <option value="alert-warning">yellow</option>
                <option value="alert-success">green</option>
                <option value="alert-primary">normal </option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date and Time:</label>
            <input type="date" name="date" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">End Date:</label>
            <input type="date" name="enddate" class="form-control" id="recipient-name">
          </div>
        
      

</div>
      <div class="modal-footer">
        <button type="submit" name="save" class="btn btn-primary">save</button>
        </form>
      </div>
     
    </div>
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

    <!-- library js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
   <script>
        var idioma=
        {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
           "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "search/መፈለጊያ :",          
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "መጀመሪያ",
                "sLast":     "መጨረሻ",
                "sNext":     "ቀጣይ",
                "sPrevious": "ወደ ኃላ ለመመለስ"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copyTitle": 'Informacion copiada',
                "copyKeys": 'Use your keyboard or menu to select the copy command',
                "copySuccess": {
                    "_": '%d filas copiadas al portapapeles',
                    "1": '1 fila copiada al portapapeles'
                },

                "pageLength": {
                "_": "Mostrar %d filas",
                "-1": "Mostrar Todo"
                },
                "pageLengt": {
                "_": "Mostrar %d filas",
                "-1": "weekone",
                "-2":"weektwo"
                }
            }
        };
        $(document).ready(function() {
        var table = $('#ejemplo').DataTable( {
        "paging": true,
        "lengthChange": true,
        "searching": true,   
        "ordering": true,
        "filter":true,
        "info": true,
        "autoWidth": true,
        "language": idioma,
        "lengthMenu": [[5,10,20, -1],[5,10,50,"Mostrar Todo"]],
        dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
        buttons: {
        dom: {
        container:{
        tag:'div',
        className:'flexcontent'
        },
        buttonLiner: {
        tag: null
        }
        },
       
        buttons: [
           
                {
                    extend:    'pageLength',
                    titleAttr: 'Registros a mostrar',
                    className: 'selectTable'
                },
               
            ]
        }
        });
        } );
  
    </script>
   <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>       
        <!-- internal script -->
        <script>
document.getElementById("").addEventListener("click", displaytable);

function displaytable() {
 <?PHP 
    $table=$_POST['table'];
    header("location:index.php");
    ?>
}
</script>
    </body>
   
</html>

