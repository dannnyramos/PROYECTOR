<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="gif">
        <meta name="generator" content="CI4">
        <title>Teñido</title>
        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        
        <!-- Favicons -->
        <script src="https://kit.fontawesome.com/dd4396edd6.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/script.js'); ?>"></script>
        <script src="<?php echo base_url('js/welcome-message.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- <link href="<?=base_url('css/') ?>dashboard.css" rel="stylesheet"> -->
        <link rel="icon" href="<?= base_url('img/') ?>favicon.png" type="image/png" width="5px">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QA3m9dBOgdXOgSh3bzfQh86+o+cxnLms/evgIiIoHu38fcz5hVJj7lNZZ4vNUfBxlCNCtOuVSh3X9eN2Uj2Mug==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Welcome Message Pop-up</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
        <style>
            .panel-heading{
                background:transparent;
                font-size:1.5em;
                margin:20px;
                color:#13a2b8;
                border-left:10px solid #13a2b8;
            }

            .gc-grid-container ,.panel ,.panel-default ,.card{
                border:0px;
                position: star;
            }

            .gc-datagrid, .gc-container{
                border:2000px;
                background:transparent;
            }

            .gc-grid-container {
              margin: 0px ; /* Ajusta la posición de la tabla */
              position: relative; /* Posiciona la tabla relativamente */
              right: 5px; /* Mueve la tabla a la derecha */
          }
          .btn-group-vertical {
            width: 2000px; /* Ancho del grupo de botones verticales */
        }
        
        .navbar-toggler {
            width: 70px; /* Ancho del botón de alternancia de navegación */
            height: 40px; /* Altura del botón de alternancia de navegación */
            /* Puedes ajustar otros estilos según sea necesario */
        }

        .navbar-nav .dropdown-menu .dropdown-item:hover {
          background-color: #f1f1f1;
      }

      .navbar-nav .dropdown-menu .dropdown-item.active {
          background-color: #ddd;
      }

      .badge {
          color: white;
          background-color: red;
          font-size: 12px;
          position: absolute;
          top: 5px;
          right: 10px;
          padding: 5px 10px;
          border-radius: 50%;
      }        
      th{
        height:15px;

    }
    #welcome-message {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #fff;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  z-index: 1000;
  display: none;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
}


    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }

        @media print {
            .noprint {
                visibility: hidden;
            }

            .sidebar{
                width:10px;
            }

            .col-print-1 {width:8%;  float:left;}
            .col-print-2 {width:16%; float:left;}
            .col-print-3 {width:25%; float:left;}
            .col-print-4 {width:33%; float:left;}
            .col-print-5 {width:42%; float:left;}
            .col-print-6 {width:50%; float:left;}
            .col-print-7 {width:58%; float:left;}
            .col-print-8 {width:66%; float:left;}
            .col-print-9 {width:75%; float:left;}
            .col-print-10{width:83%; float:left;}
            .col-print-11{width:92%; float:left;}
            .col-print-12{width:100%; float:left;}
            .table th {
                background-color: #a3a3a3 !important;
            }
        }
    }
</style>
</head>
<body>



<div class="modal fade" id="welcome-message" tabindex="-1" role="dialog" aria-labelledby="welcomeMessageLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeMessageLabel">Bienvenido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if (isset($this->session->get_userdata(0)['Nombre'])) : ?>
          <h1>¡Bienvenido, <?php echo $this->session->get_userdata(0)['Nombre']; ?>!</h1>
        <?php else : ?>
          <h1>¡Bienvenido al Sistema de Teñido!</h1>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>




    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark text-white noprint col-print-1">
        <a class="navbar-brand" href="#"><img src="<?=base_url('/uploader/image/logoketer.png')?>" height="50px" alt="Logo"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="welcome-message" style="display: none;">
    </div>



  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark text-white noprint col-print-1">
  </nav>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa-solid fa-users-line"></i> RRHH 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('index.php/Empleado') ?>"><i class="fa-solid fa-user"></i></i> Empleados</a>
                            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Permisos') ?>"> <i class="fa-solid fa-lock"></i> Permisos</a>
                        </div>  -->
                    </li> 

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-handshake"></i> Socios estratégicos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('index.php/Cliente') ?>"> <i class="fa-solid fa-handshake"></i> Clientes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Proveedorinterno') ?>"> <i class="fa-solid fa-truck-front"></i> Proveedores internos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Proveedorexterno') ?>"> <i class="fa-solid fa-truck"></i> Proveedores externos</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-swatchbook"></i> Pantone
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="<?=base_url('index.php/Tono') ?>"> <i class="fa-solid fa-palette"></i> Tonos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Autorizaciontono') ?>"><i class="fa-solid fa-circle-check"></i> Autorización de tonos</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-calendar-check"></i> Especificaciones de telas 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('index.php/Hilo') ?>"><i class="fa-solid fa-circle-dot"></i> Hilos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Lote') ?>"> <i class="fa-solid fa-warehouse"></i> Lotes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Tela') ?>"> <i class="fa-solid fa-calendar-days"></i> Telas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Rollo') ?>"> <i class="fa-solid fa-tape"></i> Rollos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Medidas') ?>"> <i class="fa-solid fa-pen-ruler"></i> Medidas de telas</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-book"></i> Ordenes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('index.php/Pedido') ?>"> <i class="fa-solid fa-pen"></i> Pedidos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=base_url('index.php/Partida') ?>"> <i class="fa-solid fa-sheet-plastic"></i> Partidas</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-calendar-days"></i> Programación de ordenes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?=base_url('index.php/Ordenes') ?>"> <i class="fa-solid fa-dolly"></i>  Orden de teñido</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <!-- Nav Item - Alerts -->
                    

                    <li class="nav-item dropdown">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn dropdown-toggle text-white"><i class="fa-solid fa-user"></i> <?php echo isset($this->session->get_userdata(0)['Nombre']) ? $this->session->get_userdata(0)['Nombre'] : 'Iniciar sesión'; ?>  <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <br>
                        <!--    <li class="nav-item dropdown">
                                <div class="form-group ml-3">
                                    <i class="fa-solid fa-id-card-clip"></i> <a class="text-dark" href="<?=base_url('index.php/estados')?>">Estados de producción </a>
                                </div>
                            </li>

                            <div class="dropdown-divider"></div>  -->
                            <li class="nav-item dropdown">
                                <div class="form-group ml-3">
                                    <a href="<?=base_url('index.php/login/salir')?>" class="text-dark"> <i class="fa-solid fa-person-walking-dashed-line-arrow-right"></i> Cerrar sessión</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
    </nav>
</body>
</html>



