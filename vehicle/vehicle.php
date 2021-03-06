<?php 
session_start();
?>

<?php

// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$gov = $model     = $chansi     = $mid     = $cc    = $price   =$year =$carid =$year =$carid =$fueltype =$loads =$bookid = $photo= "";
$gov_err = $model_err = $chansi_err = $mid_err = $cc_err = $price_err = $year_err = $carid_err = $year_err = $carid_err =$fueltype_err =$loads_err = $bookid_err =$photo_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate name
    $input_gov = trim($_POST["gov"]);
    if(empty($input_gov))
    {
        $gov_err = "Please enter a name.";
    }
  
    else
    {
        $gov = $input_gov;
    }

    // Validate model
    $input_model = trim($_POST["model"]);
    if(empty($input_model))
    {
        $model_err = "Please enter a position.";
    }
  
    else
    {
        $model = $input_model;
    }


    // Validate chansi
    $input_chansi = trim($_POST["chansi"]);
    if(empty($input_chansi))
    {
        $chansi_err = "Please enter a office.";
    }
   
    else
    {
        $chansi = $input_chansi;
    }

    // Validate id
    $input_mid = trim($_POST["mid"]);
    if(empty($input_mid))
    {
        $mid_err = "Please enter the age.";     
    } 
   
    else
    {
        $mid = $input_mid;
    }

    // Validate cc
    $input_cc = trim($_POST["cc"]);
    if(empty($input_cc))
    {
        $cc_err = "Please enter the start date.";     
    } 
    else
    {
        $cc = $input_cc;
    }
    
    // Validate price
    $input_price = trim($_POST["price"]);
    if(empty($input_price))
    {
        $price_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $price = $input_price;
    }
    
    // Validate year 
    $input_year = trim($_POST["year"]);
    if(empty($input_year))
    {
        $year_err = "Please enter the start date.";     
    } 
    else
    {
        $year = $input_year;
    }
    
    // Validate carid
    $input_carid = trim($_POST["carid"]);
    if(empty($input_carid))
    {
        $carid_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $carid = $input_price;
    }
    // Validate fueltype
    $input_fueltype = trim($_POST["fueltype"]);
    if(empty($input_fueltype))
    {
        $fueltype_err = "Please enter the salary amount.";     
    } 
  
    else
    {
        $fueltype = $input_fueltype;
    }

    // Validate load
    $input_loads = trim($_POST["loads"]);
    if(empty($input_loads))
    {
        $loads_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $loads = $input_loads;
    }

    // Validate bookid 
    $input_bookid = trim($_POST["bookid"]);
    if(empty($input_bookid))
    {
        $bookid_err = "Please enter the salary amount.";     
    } 
 
    else
    {
        $bookid= $input_bookid;
    }
    // Validate photo
    $input_photo = trim($_POST["photo"]);
    if(empty($input_photo))
    {
        $photo_err = "Please enter the salary amount.";     
    } 
   
    else
    {
        $photo = $input_photo;
    }
    // Check input errors before inserting in database
    if(empty($gov_err) && empty($model_err) && empty($chansi_err) && empty($mid_err) && empty($cc_date_err) && empty($price_err) &&empty($year_err) &&empty($carid_err)&&empty($fueltype_err)&&empty($loads_err)&&empty($bookid_err)&&empty($photo_err))
    {
        // Prepare an insert statement 
        $sql = "INSERT INTO vehicle (gov, model, chansi, mid, cc, price,year,carid,fueltype,loads,bookid,photo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $gov, $model, $chansi, $mid, $cc, $price,$year,$carid,$fueltype,$loads,$bookid,$photo);
            
            // Set parameters
            $gov    = $gov;
            $model  = $model;
            $chansi = $chansi;
            $mid     = $mid;
            $cc     = $cc;
            $price  = $price;
            $year   = $year;
            $carid  = $carid;
            $fueltype  = $fueltype;
            $loads      = $loads;
            $bookid    = $bookid;
            $photo     = $photo;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        
         
     
        }
           // Close statement
           mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
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


                       
 
<!--end -->

                        


             
                <h3 class="titulo-tabla">???????????? ???????????? ?????????</h3>
                
                    <?php
                        // Include config file
                        require_once "../config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM vehicle";
                    ?>
                    <?php
                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                            <table id="example" class="table table-havard table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>?????????????????? ???????????? ?????? ??????</th>
                                        <th>????????????????????? ?????????</th>
                                      
                                        <th>?????????????????? ??????</th>
                                        <th>?????????????????? ????????? ???.???</th>
                                        <th>???????????? ?????????</th>
                                        <th>?????????????????? ???????????? ????????????</th>
                                      
                                        <th>??????????????? ?????????</th>
                                        <th>?????????</th>
                                        
                                        <th>??????????????? ??????  </th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ;?></td>
                                            <td><?= $row['gov'] ;?></td>

                                            <td><?= $row['model'] ;?></td>
                                           
                                            <td><?= $row['price']; ?></td>
                                            <td><?= $row['year'] ;?></td>
                                            <td><?= $row['carid'] ;?></td>
                                            <td><?= $row['fueltype'] ;?></td>
                                   
                                            <td><?= $row['bookid'] ;?></td>
                                            <td><?= $row['targa'] ;?></td>
                                            <td> <img src="../file/<?= $row['photo'] ;?>" width="70px" height="50px" alt="image"> </td>
                                            
                                            

                                            <td>
                                                <?php
                                               echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>";
                                               echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                               echo "<a style='color:red;' href='delete.php?id=". $row['id'] ."' title='Delete Record' class='action-icon'> <i class='mdi mdi-delete'></i></a>";
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
                <a href="../vehicle/addvehicle.php" class="btn btn-success pull-left">Add New Employee</a>

            
                     
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
            "sEmptyTable":     "Ning????n dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "search/??????????????? :",          
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "???????????????",
                "sLast":     "????????????",
                "sNext":     "?????????",
                "sPrevious": "?????? ?????? ???????????????"
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
        "lengthMenu": [[5,10,20, -1],[5,10,50,"??????????????? "]],
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
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-clipboard"></i>Copiar',
                    title:'Titulo de tabla copiada',
                    titleAttr: 'Copiar',
                    className: 'btn btn-app export barras',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9]
                    }
                },

                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                    title:'Titulo de tabla en pdf',
                    titleAttr: 'PDF',
                    
                    className: 'btn btn-app export pdf',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9 ]
                    },
                    customize:function(doc) {

                        doc.styles.title = {
                            color: '#4c8aa0',
                            fontSize: '30',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = { 
                            width: '100px',
                            'max-width': '100px'
                        },
                        doc.styles.tableHeader = {
                            fillColor:'#4c8aa0',
                            color:'white',
                            alignment:'center'
                        },
                        doc.content[1].margin = [ 100, 0, 100, 0 ]
                    }
                },

                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>Excel',
                    title:'Titulo de tabla en excel',
                    titleAttr: 'Excel',
                    className: 'btn btn-app export excel',
                    exportOptions: {
                        columns: [0, 1,2,3,4,5,6,7,8,9 ]
                    },
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>CSV',
                    title:'Titulo de tabla en CSV',
                    titleAttr: 'CSV',
                    className: 'btn btn-app export csv',
                    exportOptions: {
                        columns: [0, 1,2,3,4,5,6,7,8,9 ]
                    }
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>Imprimir',
                    title:'Titulo de tabla en impresion',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-app export imprimir',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9 ]
                    }
                },
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

</html>

