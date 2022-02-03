<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>sistema informático de supervision académica</title>
        <meta name="description" content="Common Buttons &amp; Icons" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="../../paquetes/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../paquetes/assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../../paquetes/assets/css/fonts.googleapis.com.css" />
        <link rel="stylesheet" href="../../paquetes/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="../../paquetes/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="../../paquetes/assets/css/ace-rtl.min.css" />
        <script src="../../paquetes/assets/js/ace-extra.min.js"></script>
        <style>
            .sizeheight {
                height: 100%;
            }
            .contenedor-sistema{
                margin-left:54px;
            }
            @media screen and (max-width: 990px){
                .contenedor-sistema{
                    margin-top:8px;
                    margin-left:8px;

                }
                #page-content-wrapper {
                    width: 100%;
                    padding: 0;
                    margin-top: 0;
                }
            }
            .ampliar_content{
                width: 100%;
                position: absolute;
                padding-left:145px;
            }
            .minimizar_content{
                width: 100%;
                position: absolute;
                padding-left:20px;
            }
            .minimizar_media_content{
                width: 100%;
                position: absolute;
                padding-left:60px;
            }


            .session{
                display: inline-block;
                opacity: 1;
                background: #42b72a;
                border-radius: 50%;
                height: 6px;
                vertical-align: middle;
                width: 6px;
            }
            .clearfix {
                *zoom: 1;
            }
            .clearfix:before,
            .clearfix:after {
                display: table;
                content: "";
            }
            .clearfix:after {
                clear: both;
            }
            .profile_pic{width:35%;float:left}
            .profile_info{padding:25px 10px 10px;width:65%;float:left}
            .logo{
                background-color: white;
                border-color: white;
                padding: 2px;
                font-size: 50px;
                color: white;
                width:380px;
                height:35px;
            }
            .scrollbar
            {
                background: #F5F5F5;
                overflow-y: scroll;
                margin-bottom: 25px;
            }
            .scrollbar_3::-webkit-scrollbar-track
            {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: #F5F5F5;
            }
            .scrollbar_3::-webkit-scrollbar
            {
                width: 6px;
                background-color: #F5F5F5;
            }
            .scrollbar_3::-webkit-scrollbar-thumb
            {
                background-color: #438EB9;
            }
            .tamanio{
                zoom: 80%;
            }
            html{
                /*zoom: 90%;*/
            }
        </style>
    </head>

    <body class="no-skin scrollbar scrollbar_3">
        <div id="validar_session"></div>
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!--                <div class="navbar-header pull-left">
                                    <a href="principal.php" class="navbar-brand">
                                        <small>
                                            <font style="font-family: Old English Text MT;font-size: 35px" >Castro</font> 
                                        </small>
                                    </a>
                                </div>-->
                <div class="navbar-header">

                    <small class="navbar-brand">
                        <font style="font-family: sans-serif;font-size: 15px" >sistema informático de supervision académica</font> 
                    </small>

                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="dropdown-modal">
                            <!--light-blue-->
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <!--menu izquierda-->

<!--<img class="img-circle imagen_foto"  style="width: 40px;height: 40px;border:1px solid white" />-->
   <!--<img class="nav-user-photo imagen_foto"  src="" alt="Doctor" />-->
                                <span class="user-info">
                                    <small>Bienvendo,</small>
                                    <span class="nombre_usuario">Admin</span>
                                    <!--                                    Doctor-->
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!--                                <li>
                                                                    <a href="#">
                                                                        <i class="ace-icon fa fa-cog"></i>
                                                                        Opciones
                                                                    </a>
                                                                </li>
                                
                                                                <li>
                                                                    <a href="profile.html">
                                                                        <i class="ace-icon fa fa-user"></i>
                                                                        Mi cuenta
                                                                    </a>
                                                                </li>-->
<!--                                <li rel="../cuenta/vista.php" class="evento_li_2">
                                    <a href="#" >
                                        <i class="ace-icon fa fa-user"></i>
                                        Mi cuenta
                                    </a>
                                    <b class="arrow"></b>
                                </li>-->
                                <li class="divider"></li>

                                <li>
                                    <a href="../../clases/logout.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div>
            <script type="text/javascript">
//                try {
//                    ace.settings.loadState('main-container')
//                } catch (e) {
//                }
            </script>

            <div id="page-content-wrapper" style="height:100%;">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn" style="display: none">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box" >
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Elija Color</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> Navegador Fijo</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> Barra fija</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>
                        </div>
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenú en Hover</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact">Barra lateral compacta</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Elemento activo</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container -->

                <div class="contenedor-sistema sizeheight ">    
                    <div class="sizeheight">
                        <div  class=" sizeheight ">
                            <div class="sizeheight " id="cargar_iframe" style="height:100%;">
                                <iframe class="embed-responsive-item" width="100%" height="100%" frameborder="0" scrolling="yes" id="iframe" src="inicio.php">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div id="sidebar" class="sidebar responsive ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar');
                    } catch (e) {
                    }
                </script>
                <style>
                    .profile_pic{width:35%;float:left}.img-circle.profile_img{width:70%;background:#fff;margin-left:15%;z-index:1000;position:inherit;margin-top:20px;border:1px solid rgba(52,73,94,.44);padding:4px}.profile_info{padding:25px 10px 10px;width:65%;float:left}.profile_info span{font-size:13px;line-height:30px;color:#BAB8B8}.profile_info h2{font-size:14px;color:#ECF0F1;margin:0;font-weight:300}.profile.img_2{text-align:center}.profile.img_2 .profile_pic{width:100%}.profile.img_2 .profile_pic .img-circle.profile_img{width:50%;margin:10px 0 0}.profile.img_2 .profile_info{padding:15px 10px 0;width:100%;margin-bottom:10px;float:left}
                </style>
                <input type="hidden" id="i_menu" value="1">
                <br>
                <div id="i_cambiar_user" >
                    <div class="row" style="margin: 1px;">
                        <div class="col-sm-6">
                            <img class="img-circle imagen_foto" src="../../paquetes/imagenes/usuario.jpg" style="width: 85px;height: 85px;border:2px solid white" />
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <a> Bienvenido,</a>
                            <span class="session"></span> <a class="nombre_usuario">Admin</a>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <b><a><center><span style="font-family: cursive" class="menu-text nombre_cargo"></span></center></a></b>
                        <br>
                    </div>
                </div>

                <!-- admin -->
                <!--                <ul class="nav nav-list menu_tipo_usuario" id="menu_admin" style="font-family: sans-serif">
                                    <li rel="inicio.php" class="evento_li_1 active">
                                        <a href="#">
                                            <i class="menu-icon fa fa-home"></i>
                                            <span class="menu-text"> INICIO </span>
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                
                                    <li  class="evento_li_1 menu_tipo_usuario menu_admin">
                                        <a href="#" class="dropdown-toggle">
                                            <i class="menu-icon fa fa-user"></i>
                                            <span class="menu-text"> USUARIO </span>
                                            <b class="arrow fa fa-angle-down"></b>
                                        </a>
                                        <b class="arrow"></b>
                                        <ul class="submenu">
                                            <li rel="../administrador/vista.php" class="evento_li_2">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-caret-right"></i>
                                                    Usuario
                                                </a>
                                                <b class="arrow"></b>
                                            </li>
                
                                            <li rel="../cliente/vista.php" class="evento_li_2">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-caret-right"></i>
                                                    Cliente
                                                </a>
                                                <b class="arrow"></b>
                                            </li>
                
                                        </ul>
                                    </li>
                                </ul>-->
                <!-- admin -->
                <ul class="nav nav-list" style="font-family: sans-serif">
                    <li rel="inicio.php" class="evento_li_1 active">
                        <a href="#">
                            <i class="menu-icon fa fa-home"></i>
                            <span class="menu-text"> INICIO </span>
                        </a>
                        <b class="arrow"></b>
                    </li>

                    <!-- admin -->
                    <li  class="evento_li_1 menu_tipo_usuario menu_admin">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> MODULOS </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <li rel="../trabajador/vista.php" class="evento_li_2">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Usuario
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li rel="../personal/vista.php" class="evento_li_2">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Personal
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <!-- admin -->
                    <li  class="evento_li_1 menu_tipo_usuario menu_usuario">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> MODULOS </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            
                            <li rel="../personal_usuario/vista.php" class="evento_li_2">
                                <a href="#">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Personal
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>



                </ul>


                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
        </div>


        <!-- Modal Registrar-->
        <div class="modal fade modalRegistrar" id="modalRegistrar" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header cabecera_modal">
                        <!--                        <button type="button" class="close btn_cancelar_registrar" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                    <span class="sr-only">Close</span>
                                                </button>-->
                        <h4 class="modal-title text-center" id="myModalLabel">ATENCION POR MOTIVOS DE SEGURIDAD NECESITAMOS QUE CAMBIE LA CONTRASEÑA</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!--<p class="statusMsg"></p>-->
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label_modal">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-key"></i></span>
                                        <input id="i_clave" type="password" class="form-control input-sm" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label_modal">Vuelva a escribir la contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-key"></i></span>
                                        <input id="i_clave_dos" type="password" class="form-control input-sm" placeholder="Vuelva a escribir la contraseña">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-default btn_cancelar_registrar" data-dismiss="modal"><span class="fa fa-remove"></span> Cancelar</button>-->
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw btn_carga_registrar"></i>
                        <!--<span class="sr-only">Cargando...</span>-->
                        <button type="button" class="btn btn-info btn_registrar" id="btn_registrar" ><span class="fa fa-check-circle"></span> Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../paquetes/assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="../../paquetes/assets/js/bootstrap.min.js"></script>
        <script src="../../paquetes/assets/js/ace-elements.min.js"></script>
        <script src="../../paquetes/assets/js/ace.min.js"></script>

        <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../paquetes/sweet_alert/sweetalert.css">
        <script src="js/funciones_principal.js"></script>
        <script type="text/javascript">
                    jQuery(function ($) {
                        $('#loading-btn').on(ace.click_event, function () {
                            var btn = $(this);
                            btn.button('loading')
                            setTimeout(function () {
                                btn.button('reset')
                            }, 2000)
                        });

                        $('#id-button-borders').attr('checked', 'checked').on('click', function () {
                            $('#default-buttons .btn').toggleClass('no-border');
                        });
                    })
        </script>
    </body>
</html>