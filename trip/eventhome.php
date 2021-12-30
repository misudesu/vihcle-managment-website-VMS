<?php
                        // Include config file
                        require_once "../config.php";
                      
                        $sql = "SELECT * FROM trip";
                      
                     
                     
                        
                        // Attempt select query execution
                       
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data table</title>
    <!-- library css -->
     <!-- library css -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../driver/css/bootstrap.min.css">

</head>
<body  >
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
    
    <div class="container ">
        <div class="row">
            <div class="col-12 ">
                <br>
                <h3 class="titulo-tabla"> All Trip </h3>
                <hr>   
                        
                    
                    <?php
                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                    <div class="card">
                            <table id="ejemplo" class=" table table-responsive  align-items-center mb-0 " >
                                <thead class="card-header " >
                                    <tr>
                                  
            <th >EventTitle </th>
          <th >StartDate</th>

            <th >RegistrationDeadline</th>
           
            
            <th >startLocation</th>
            <th >endLocation</th>
            <th >City</th>

            <th >carID</th>
            <th >divID</th>
            <th >seen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="card-body"  id="myTable">
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                        <td><?= $row['EventTitle'] ;?></td>
                                            <td><?= $row['StartDate'] ;?></td>           
                                           
                                            <td><?= $row['RegistrationDeadline'] ;?></td>
                                           
                                            <td><?= $row['startLocation']; ?></td>
                                            <td><?= $row['endLocation']; ?></td>
                                            <td><?= $row['City']; ?></td>
                                          
                                            <td><?= $row['carID']; ?></td>
                                            <td><?= $row['divID']; ?></td>
                                            <td><?= $row['seen']; ?></td>

                                            <td>
                                                <?php
                                                echo "<a href='eventread.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:black'></i></a>";
                                                echo "<a href='tripupdate.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                echo "<a href='eventdelete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                                <?php $id=$row['id']; ?>
                                                 <a href="../driveraccount/process.php?incity=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >in city</button>
                                                 <a href="../driveraccount/process.php?outcity=<?php echo $id;?>">   <button type="button"  class="btn btn-primary" name="<?php echo $id; ?>" >out city</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>                          
                            </table>
                    </div>
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
                <a href="addtrip.php" class="btn btn-success pull-left">Add New </a>
              
            </div>
        </div>
    </div>
        <!-- library js -->
    <!-- internal script -->

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
                "_": "እይታ  %d ገጽ ",
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
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-clipboard"></i>Copiar',
                    title:'Titulo de tabla copiada',
                    titleAttr: 'Copiar',
                    className: 'btn btn-app export barras',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                    }
                },

                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                    title:'Titulo de tabla en pdf',
                    titleAttr: 'PDF',
                    
                    className: 'btn btn-app export pdf',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
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
                        doc.content[1].margin = [ 5, 0, 5, 0 ]
                    }
                },

                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>Excel',
                    title:'Titulo de tabla en excel',
                    titleAttr: 'Excel',
                    className: 'btn btn-app export excel',
                    exportOptions: {
                        columns: [0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
                    },
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>CSV',
                    title:'Titulo de tabla en CSV',
                    titleAttr: 'CSV',
                    className: 'btn btn-app export csv',
                    exportOptions: {
                        columns: [0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
                    }
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>Imprimir',
                    title:'Titulo de tabla en impresion',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-app export imprimir',
                    exportOptions: {
                        columns: [ 0, 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15 ]
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
     
</body>
</html>