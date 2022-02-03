<!DOCTYPE html>
<html>
    <head>
        <title>Gestor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../paquetes/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../paquetes/bootstrap/css/dataTables.bootstrap.css" />
        <link rel="stylesheet" href="../../paquetes/bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../paquetes/icono/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../paquetes/general/css/general.css">
        <link rel="stylesheet" type="text/css" href="../../paquetes/sweet_alert/sweetalert.css">
        <link rel="stylesheet" href="../../paquetes/jquery/jquery-ui.css">


        <script src="../../paquetes/jquery/jquery.min.js"></script>
        <script src="../../paquetes/jquery/jquery.numeric.min.js"></script>
        <script src="../../paquetes/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../paquetes/jquery/jquery.dataTables.min.js"></script>
        <script src="../../paquetes/bootstrap/js/dataTables.bootstrap.js" ></script>

        <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="../../paquetes/jquery/jquery-ui.js"></script>

<!--        <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
        <link rel="stylesheet" href="../../paquetes/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../paquetes/bootstrap/css/dataTables.bootstrap.css" />
        <link rel="stylesheet" href="../../paquetes/bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="../../paquetes/icono/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../paquetes/general/css/general.css">
        <link rel="stylesheet" type="text/css" href="../../paquetes/sweet_alert/sweetalert.css">


        <script src="../../paquetes/jquery/jquery.min.js"></script>
        <script src="../../paquetes/jquery/jquery.numeric.min.js"></script>
        <script src="../../paquetes/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../paquetes/jquery/jquery.dataTables.min.js"></script>
        <script src="../../paquetes/bootstrap/js/dataTables.bootstrap.js" ></script>-->

        <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
        <script src="../../paquetes/general/js/general.js" ></script>
        <script src="js/funciones_modificar.js" ></script>

    </head>
    <body>
        <input type="hidden" id="get_id"/>
        
        <input type="hidden" id="back_imagen_1"/>
        <input type="hidden" id="m_cambio_1" value="0"/>
        
        <input type="hidden" id="back_imagen_2"/>
        <input type="hidden" id="m_cambio_2" value="0"/>
        
        <input type="hidden" id="back_imagen_3"/>
        <input type="hidden" id="m_cambio_3" value="0"/>
        
        <!--<input type="hidden" id="get_nombre_instituto"/>-->
        <div class="contenedor">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="badge manito red" id="btn_atras"><span class="fa fa-arrow-left"></span> ATRAS</span>
                    <!--                    &nbsp;&nbsp;&nbsp;
                                        <span class="badge manito" id="btn_nuevo"><span class="fa fa-plus"></span> NUEVO</span>-->
                    &nbsp;&nbsp;&nbsp;
                    <strong class="titulo_panel">REGISTRO DE DATOS PERSONALES </strong>
                    &nbsp;&nbsp;&nbsp;

<!--                    <stnong class="titulo_panel_red">INSTITUTO:</stnong>
                    <stnong class="titulo_panel_red" id="span_nombre"></stnong>-->
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">GRADO/CATEG:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_grado_categoria">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">ESPECIALIDAD:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <select class="form-control input-sm" id="i_especialidad">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">NRO.CIP.:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-table"></i></span>
                                    <input id="i_nro_cip" type="text" class="form-control input-sm" placeholder="NRO.CIP.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">DNI:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-id-card"></i></span>
                                    <input id="i_dni" type="text" class="form-control input-sm" maxlength="8" placeholder="DNI">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">GRUPO SANGUINEO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_grupo_sanguineo">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">APELLIDO PATERNO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_apellido_paterno" type="text" class="form-control input-sm" placeholder="APELLIDO PATERNO">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">APELLIDO MATERNO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_apellido_materno" type="text" class="form-control input-sm" placeholder="APELLIDO MATERNO">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">NOMBRES:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_nombres" type="text" class="form-control input-sm" placeholder="NOMBRES">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">FOTO:</label>
                                <div class="input-group i_sin_carga_foto_1">
                                    <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                    <input id="i_file_1" type="file" class="form-control input-sm cabecera_tabla">
                                </div>

                                <img class="img-thumbnail imagen_formulario i_con_carga_foto_1" id="i_imagen_1">
                                <span class="fa fa-remove quitar_imagen_modal i_con_carga_foto_1" id="i_quitar_imagen_1"></span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">FECHA NACIMIENTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-calendar"></i></span>
                                    <input id="i_fecha_nacimiento" type="text" readonly="readonly" class="form-control input-sm fecha" placeholder="FECHA NACIMIENTO">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">DISTRITO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_distrito_nacimiento">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">PROVINCIA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_provincia_nacimiento">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">DEPARTAMENTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_departamento_nacimiento">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">GRADO INSTRUCCION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <select class="form-control input-sm" id="i_grado_instruccion">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--                    </div>
                                            <div class="row">-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">UNIVERSIDAD / INSTITUTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-university"></i></span>
                                    <input id="i_universidad_instituto" type="text" class="form-control input-sm" placeholder="UNIVERSIDAD / INSTITUTO">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">DOMICILIO ACTUAL</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CALLE / AV / JR:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-street-view"></i></span>
                                    <input id="i_calle_av_jr_domicilio" type="text" class="form-control input-sm" placeholder="CALLE / AV / JR">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">URBANIZACION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_urbanizacion" type="text" class="form-control input-sm" placeholder="URBANIZACION">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">DISTRITO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_distrito_domicilio" type="text" class="form-control input-sm" placeholder="DISTRITO">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CROQUIS:</label>
                                <div class="input-group i_sin_carga_foto_2">
                                    <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                    <input id="i_file_2" type="file" class="form-control input-sm cabecera_tabla">
                                </div>

                                <img class="img-thumbnail imagen_formulario i_con_carga_foto_2" id="i_imagen_2">
                                <span class="fa fa-remove quitar_imagen_modal i_con_carga_foto_2" id="i_quitar_imagen_2"></span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">ESTADO CIVIL:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-users"></i></span>
                                    <select class="form-control input-sm" id="i_estado_civil">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">IDIOMAS QUE DOMINA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-navicon"></i></span>
                                    <input id="i_idiomas_domina" type="text" class="form-control input-sm" placeholder="IDIOMAS QUE DOMINA">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">RELIGION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_religion">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="i_div_denominacion_religion">
                            <div class="form-group">
                                <label class="label_modal">DENOMINACION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_denominacion_religion" type="text" class="form-control input-sm" placeholder="DENOMINACION">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">TELEFONO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_telefono" type="text" class="form-control input-sm" placeholder="TELEFONO">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group">
                                <label class="label_modal">EMAIL@:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-envelope-o"></i></span>
                                    <input id="i_mail" type="text" class="form-control input-sm" placeholder="EMAIL@">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">FECHA DE INGRESO A LA MARINA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-calendar"></i></span>
                                    <input id="i_fecha_ingreso_marina" readonly="readonly" type="text" class="form-control input-sm fecha" placeholder="FECHA DE INGRESO A LA MARINA"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">FECHA DEL ULTIMO ASCENSO DEL GRADO ACTUAL:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-calendar"></i></span>
                                    <input id="i_fecha_ultimo_ascenso_grado_actual" readonly="readonly" type="text" class="form-control input-sm fecha" placeholder="FECHA DEL ULTIMO ASCENSO DEL GRADO ACTUAL"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">TIPO VIVIENDA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_tipo_vivienda">
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">NRO.BREVETE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-table"></i></span>
                                    <input id="i_nro_brevete" type="text" class="form-control input-sm" placeholder="NRO.BREVETE"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MODELO / VEHICULO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_modelo_vehiculo" type="text" class="form-control input-sm" placeholder="MODELO/VEHICULO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">PLACA NRO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_placa_nro" type="text" class="form-control input-sm" placeholder="PLACA NRO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">NRO.LIC.ARMA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_nro_lic_arma" type="text" class="form-control input-sm" placeholder="NRO.LIC.ARMA"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MODELO DEL ARMA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_modelo_arma" type="text" class="form-control input-sm" placeholder="MODELO DEL ARMA"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">TIPO DEL ARMA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_tipo_arma" type="text" class="form-control input-sm" placeholder="TIPO DEL ARMA"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MARCA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_marca_arma" type="text" class="form-control input-sm" placeholder="MARCA"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">CALIBRE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_calibre_arma" type="text" class="form-control input-sm" placeholder="CALIBRE"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">CONDICION QUE LLEGA AL INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO NAVAL CITEN</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CONDICION QUE LLEGA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_condicion_llega">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CURSO QUE VA A SEGUIR Y/O DICTAR EN EL IESTPN-CITEN:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_curso_seguir_dictar" type="text" class="form-control input-sm" placeholder="CURSO QUE VA A SEGUIR Y/O DICTAR EN EL IESTPN-CITEN"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">DEPENDENCIA DE ORIGEN AL DESTAQUE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_dependencia_origen_destaque" type="text" class="form-control input-sm" placeholder="DEPENDENCIA DE ORIGEN AL DESTAQUE"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">NRO.DE CARTA REFERENCIA DEL DESTAQUE O TRASLADO AL CITEN:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_nro_carta_referencia" type="text" class="form-control input-sm" placeholder="NRO.DE CARTA REFERENCIA DEL DESTAQUE O TRASLADO AL CITEN"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CARGO QUE OCUPABA EN SU DEPENDENCIA ANTERIOR:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_cargo_ocupaba_dependencia" type="text" class="form-control input-sm" placeholder="CARGO QUE OCUPABA EN SU DEPENDENCIA ANTERIOR"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">CUENTA CON LAS SIGUIENTES LIBRETAS</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_modal">LIPER:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_liper">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_modal">LISAN:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_lisan">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_modal">TIN:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_tin">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">ESPECIALIDAD EN MOVILIZACION DE EMERGENCIA</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">PROFESIÓN (EJEMPLO CHOFER):</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_chofer_emergencia" type="text" class="form-control input-sm" placeholder="PROFESIÓN (EJEMPLO CHOFER)"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">BREVETE MILITAR:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_brevete_militar_emergencia" type="text" class="form-control input-sm" placeholder="BREVETE MILITAR"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">PUESTO DE ZAFARRANCHO (EJEMPLO HOMBRE EXTINTOR):</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_puesto_zafarrancho_emergencia" type="text" class="form-control input-sm" placeholder="PROFESIÓN (EJEMPLO CHOFER)"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">EMERGENCIA:</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">EN CASO DE EMERGENCIA LLAMAR A:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_emergencia_llamar_a" type="text" class="form-control input-sm" placeholder="EN CASO DE EMERGENCIA LLAMAR A"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">PARENTESCO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-users"></i></span>
                                    <input id="i_emergencia_parentesco" type="text" class="form-control input-sm" placeholder="PARENTESCO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">TELEFONO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_emergencia_parentesco_telefono" type="text" class="form-control input-sm" placeholder="TELEFONO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">CENTRO TRABAJO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_emergencia_parentesco_centro_trabajo" type="text" class="form-control input-sm" placeholder="CENTRO TRABAJO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">DOMICILIO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_emergencia_parentesco_domicilio" type="text" class="form-control input-sm" placeholder="DOMICILIO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">PADRES:</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">PADRE VIVE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_vive_padre">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">NOMBRE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_nombre_padre" type="text" class="form-control input-sm" placeholder="NOMBRE"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">OCUPACION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <input id="i_ocupacion_padre" type="text" class="form-control input-sm" placeholder="OCUPACION"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="label_modal">DOMICILIO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_domicilio_padre" type="text" class="form-control input-sm" placeholder="DOMICILIO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">TELEFONO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_telefono_padre" type="text" class="form-control input-sm" placeholder="TELEFONO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MADRE VIVE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_vive_madre">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">NOMBRE:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_nombre_madre" type="text" class="form-control input-sm" placeholder="NOMBRE"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">OCUPACION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <input id="i_ocupacion_madre" type="text" class="form-control input-sm" placeholder="OCUPACION"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="label_modal">DOMICILIO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_domicilio_madre" type="text" class="form-control input-sm" placeholder="DOMICILIO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">TELEFONO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_telefono_madre" type="text" class="form-control input-sm" placeholder="TELEFONO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">COMPROMISO ESPOSA(O):</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_tipo_compromiso_esposa">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">NACIONALIDAD:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_nacionalidad_esposa" type="text" class="form-control input-sm" placeholder="NACIONALIDAD"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MATRIMONIO CIVIL:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_matrimonio_civil_esposa">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">MATRIMONIO RELIGIOSO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-chevron-down"></i></span>
                                    <select class="form-control input-sm" id="i_matrimonio_religioso_esposa">
                                        <option value="0">--SELECCIONE--</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">NOMBRES Y APELLIDOS:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="i_nombres_apellidos_esposa" type="text" class="form-control input-sm" placeholder="NOMBRES Y APELLIDOS"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">FECHA DE NACIMIENTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-calendar"></i></span>
                                    <input id="i_fecha_nacimiento_esposa" readonly="readonly" type="text" class="form-control input-sm fecha" placeholder="FECHA DE NACIMIENTO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">DPTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-pencil"></i></span>
                                    <input id="i_dpto_esposa"  type="text" class="form-control input-sm" placeholder="DPTO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">CENTRO LABORES:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_centro_labores_esposa"  type="text" class="form-control input-sm" placeholder="CENTRO LABORES"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">CARGO/GRADO/PROFESION:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <input id="i_cargo_grado_profesion_esposa"  type="text" class="form-control input-sm" placeholder="CARGO/GRADO/PROFESION"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">DOMICILIO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                    <input id="i_domicilio_esposa"  type="text" class="form-control input-sm" placeholder="DOMICILIO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_modal">TELEFONO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-phone"></i></span>
                                    <input id="i_telefono_esposa" type="text" class="form-control input-sm" placeholder="TELEFONO"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">CURRICULUM:</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="label_modal">SUBIR CV:</label>
                                <div class="input-group i_sin_carga_foto_3">
                                    <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                    <input id="i_file_3" type="file"  class="form-control input-sm cabecera_tabla">
                                </div>


                                <div class="input-group i_con_carga_foto_3">
                                    <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                    <input id="i_nombre_cv" disabled="true" type="text" class="form-control input-sm" placeholder="CV"/>
                                    <span class="input-group-addon label_modal">
                                        <!--<i class="fa fa-phone"></i>-->
                                        <i class="fa fa-remove quitar_imagen_modal" id="i_quitar_imagen_3"></i>
                                    </span>

                                </div>

                                <!--<img class="img-thumbnail imagen_modal i_con_carga_foto_3" id="i_imagen_3" style="display: none;">-->


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong class="titulo_panel">HIJOS:</strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">CANT:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-table"></i></span>
                                    <input id="a_cant" type="text" class="form-control input-sm" placeholder="CANT"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_modal">NOMBRES Y APELLIDOS:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-user"></i></span>
                                    <input id="a_nombre_apellidos" type="text" class="form-control input-sm" placeholder="NOMBRES Y APELLIDOS"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">FECHA NACIMIENTO:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-calendar"></i></span>
                                    <input id="a_fecha_nacimiento" readonly="readonly" type="text" class="form-control input-sm fecha" placeholder=FECHA NACIMIENTO"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="label_modal">OCUPACION ACTUAL:</label>
                                <div class="input-group">
                                    <span class="input-group-addon label_modal"><i class="fa fa-graduation-cap"></i></span>
                                    <input id="a_ocupacion" type="text" class="form-control input-sm" placeholder="OCUPACION ACTUAL"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button class="btn btn-success" id="a_btn_agregar"><span class="fa fa-plus"></span> Agregar</button>
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="a_span_btn_agregar"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tbl_lista_agregar" class="table table-striped table-condensed table-hover table-bordered" >
                                <thead class="cabecera_tabla" >
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Cant</th>
                                        <th class="text-center">Nombres y apellidos</th>
                                        <th class="text-center">Fecha Nacimiento</th>
                                        <th class="text-center">Ocupacion actual</th>
                                        <th class="text-center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center' colspan='6'>Ningun hijo agregado</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <button type="button" class="btn btn-default btn_cancelar_registrar" id="btn_cancelar" data-dismiss="modal"><span class="fa fa-remove"></span> Cancelar</button>
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw btn_carga_registrar"></i>
                        <!--<span class="sr-only">Cargando...</span>-->
                        <button type="button" class="btn btn-info btn_registrar" id="btn_registrar" ><span class="fa fa-check-circle"></span> Guardar</button>                    
                    </center>
                </div>

            </div>
        </div>
        
         <table id="tb_eliminar_detalle">
            <tbody>
            </tbody>
        </table>
        
    </body>
</html>

<!--<fieldset class="group-border">
                <legend class="group-border">Info</legend>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.NumDoc, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.NumDoc, new { @class = "form-control input-sm", placeholder = "Nº Documento", disabled = "disabled" })
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.ProcessNum, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.ProcessNum, new { @class = "form-control input-sm", placeholder = "Nº Processo", disabled = "disabled" })
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.State, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.State, new { @class = "form-control input-sm", placeholder = "Estado", disabled = "disabled" })
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.Name, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.Name, new { @class = "form-control input-sm", placeholder = "Nome Documento", disabled = "disabled" })
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @Html.LabelFor(doc => doc.IsArchived, new { @class = "control-label" })
                        @Html.CheckBoxFor(doc => doc.IsArchived, new { @class = "input-sm", disabled = "disabled" })
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.Description, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.Description, new { @class = "form-control input-sm", placeholder = "Descrição", disabled = "disabled" })
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            @Html.LabelFor(doc => doc.Date, new { @class = "control-label" })
                            @Html.TextBoxFor(doc => doc.Date, new { @class = "form-control input-sm", placeholder = "dd/MM/yyyy", disabled = "disabled" })
                        </div>
                    </div>
                </div>

            </fieldset>-->