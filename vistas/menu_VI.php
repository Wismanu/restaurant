<?php
class menu_VI
{
    function __construct()
    {
    }

    function verMenu()
    {
        require_once "modelos/cliente_MO.php";
        require_once "modelos/usuario_MO.php";
        require_once "modelos/accesos_MO.php";
       // require_once "modelos/publicaciones_MO.php";
        // require_once "modelos/aplicaciones_MO.php";
        $conexion = new conexion('sel');
        $usuario_MO = new usuario_MO($conexion);
        $accesos_MO = new  accesos_MO($conexion);
        $id=$_SESSION['usua_id'];
        $id2 = $accesos_MO-> buscarDocumento($_SESSION['usua_id']);
        $arreglo = $usuario_MO->seleccionar($id2[0]->id_usuario);
        print_r($id);
        print_r($id2);
        $objeto_usuario = $arreglo[0];
        $usua_nombres = $objeto_usuario->nombre1_usuario;
        // $usua_id = $objeto_usuario->usua_id;
        $tius_id = $objeto_usuario->tius_id;
?>
        <!DOCTYPE html>
        <!--
        This is a starter template page. Use this page to start your new project from
        scratch. This page gets rid of all links and provides the needed markup only.
        -->
        <html lang="es">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Restaurante</title>

            <!-- Datetables -->
            <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome Icons -->
            <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
            <!-- toastr -->
            <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="dist/css/adminlte.min.css">

            <link rel="stylesheet" href="dist/css/css.css">
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">

                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index3.html" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" onclick="salir();" class="nav-link">Salir</a>
                        </li>
                    </ul>
 

                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <!-- .' '.ucwords(strtolower($usua_nombres)) -->
                                <a href="#" class="d-block"><?php echo ucwords(strtolower($usua_nombres)); ?></a>
                            </div>
                        </div>


                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                                <!-- <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Starter Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inactive Page</p>
                            </a>
                        </li>
                        </ul>
                    </li> -->

                                <?php
                                if ($tius_id == 1) {
                                ?>

                                    <li class="nav-item">
                                        <a href="#" onclick="verMenu('usuario_VI/agregar')" class="nav-link">
                                            <i class="fas fa-graduation-cap"></i>
                                            <p>Usuario</p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="#" onclick="verMenu('perfil_VI/agregar')" class="nav-link">
                                            <i class="fas fa-graduation-cap"></i>
                                            <p>Perfil De Usuario</p>
                                        </a>
                                    </li>

                                    
                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('categorias_VI/agregar')" class="nav-link">
                                        <i class="fas fa-book" style="margin-right: 5px;"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('tipo_publicacion_VI/agregar')" class="nav-link">
                                        <i class="fas fa-clipboard" style="margin-right: 5px;"></i>
                                        <p>Tipo de Publicaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('publicaciones_VI/agregar')" class="nav-link">
                                        <i class="fas fa-calculator" style="margin-right: 5px;"></i>
                                        <p>Publicaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('aplicaciones_VI/agregar')" class="nav-link">
                                        <i class="fas fa-calculator" style="margin-right: 5px;"></i>
                                        <p>Aplicaciones</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('accesos_VI/agregar')" class="nav-link">
                                        <i class="fas fa-calculator" style="margin-right: 5px;"></i>
                                        <p>Accesos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" onclick="verMenu('tipo_usuario_VI/agregar')" class="nav-link">
                                        <i class="fas fa-calculator" style="margin-right: 5px;"></i>
                                        <p>Tipos de Usuario</p>
                                    </a>
                                </li>

                                <?php

                                } 
                                elseif ($tius_id == 2) {

                                ?>

                                    <li class="nav-item">
                                        <a href="#" onclick="verMenu('perfil_VI/agregar')" class="nav-link">
                                            <i class="fas fa-graduation-cap"></i>
                                            <p>Perfil De Usuario</p>
                                        </a>
                                    </li>

                                <?php

                                }
                                else{

                                
                                ?>

                                <?php 

                                if($tius_id==1){

                               
                                ?>
                             
                                <?php 
                                    }
                                    else{

                                    }
                                }

                                ?>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Pagina de inicio</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                        <li class="breadcrumb-item ">Pagina de inicio</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="content">
                        <div class="container-fluid">

                            <div id="contenido">

                                <?php

                               /* 
                                $aplicaciones_MO = new aplicaciones_MO($conexion);
                                print_r($arreglo2);
                                foreach ($arreglo2 as $objeto_publicaciones) {
                                    $apli_id_s=$objeto_publicaciones->apli_id;
                                    $publ_titulo=$objeto_publicaciones->publ_titulo;
                                    $publ_contenido=$objeto_publicaciones->publ_contenido;
                                    $publ_imagen=$objeto_publicaciones->publ_imagen;
                                    $publ_link_video_youtube=$objeto_publicaciones->publ_link_video_youtube;
                                    
                                    if(NULL==$apli_id_s){
                                        print_r($apli_id_s);
                                     }else{
                                        $arreglo3 = $aplicaciones_MO->seleccionar($apli_id_s);
                                        $arreglo34= $arreglo3[0];
                                        $apli_nombre=$arreglo34->apli_nombre;
                                        $apli_link_descarga=$arreglo34->apli_link_descarga;
                                     }
                                ?>

                                    <div class="card mb-3 prueba" style="max-width: 800px; left:10%;" aling="center">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?php echo strtolower($publ_imagen); ?>" class="img-fluid rounded-start" alt="Img_<?php echo strtolower($publ_titulo); ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo ucwords(strtolower($publ_titulo)); ?></h5>
                                                    <p class="card-text"><?php echo ucwords(strtolower($publ_contenido)); ?></p>
                                                    <?php
                                                    $date = date_create($objeto_publicaciones->publ_fecha_creacion);
                                                    $date2 = date_format($date, "d/m/Y");
                                                    ?>
                                                    <p class="card-text"><small class="text-muted">Actualizado el <?php echo $date2; ?></small></p>
                                                    <?php 
                                                        if(is_null($apli_id_s)){
                                                    ?>
                                                            <a name="" id="" class="btn btn-lg btn-primary" href="<?php echo ucwords(strtolower($publ_link_video_youtube)); ?>" role="button">Leer Mas.. </a>
                                                    <?php
                                                        }
                                                        else{
                                                            ?>
                                                             <a name="" id="" class="btn btn-lg btn-primary" href="<?php echo ucwords(strtolower($apli_link_descarga));?>" role="button">Descargar <?php echo ucwords(strtolower($apli_nombre)); ?></a>
                                                            
                                                            <?php 
                                                        }
                                                    ?>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }

                                */
                                ?>


                                <!-- 
                </div>
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <img src="..." class="card-img-bottom" alt="...">
                </div> -->


                            </div>

                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                    <div class="p-3">
                        <h5>Title</h5>
                        <p>Sidebar content</p>
                    </div>
                </aside>
                <!-- /.control-sidebar -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="float-right d-none d-sm-inline">
                        Anything you want
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
                </footer>

                <!-- Modal -->
                <div class="modal fade" id="ventana_modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="ventana_modal_contenido">
                                ...
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ./wrapper -->

            <!-- REQUIRED SCRIPTS -->

            <!-- jQuery -->
            <script src="plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>
            <!-- toastr -->
            <script src="plugins/toastr/toastr.min.js"></script>
            <!-- datatables -->
            <script src="plugins/jquery.dataTables.min.js"></script>
            <script>
                function verMenu(ruta) {
                    $.post(ruta, function(respuesta) {
                        $('#contenido').html(respuesta);
                    });
                }

                function salir() {
                    $.post('accesos_CO/salir', function() {
                        location.href = "index.php";
                    });
                }
            </script>
        </body>

        </html>
<?php
    }
}
?>