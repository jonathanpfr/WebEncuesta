<?php
//@session_start();
//$id_user = $_SESSION["id_user"];
//if (isset($id_user)) {
//   
//} else {
//    header("Location: ../../clases/logout.php");
//}
?>
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


        <script src="../../paquetes/jquery/jquery.min.js"></script>
        <script src="../../paquetes/jquery/jquery.numeric.min.js"></script>
        <script src="../../paquetes/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../paquetes/jquery/jquery.dataTables.min.js"></script>
        <script src="../../paquetes/bootstrap/js/dataTables.bootstrap.js" ></script>

        <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
        <script src="../../paquetes/general/js/general.js" ></script>
        <script src="js/funciones.js" ></script>

    </head>
    <body>

        <div class="contenedor">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span class="badge manito" id="btn_nuevo"><span class="glyphicon glyphicon-plus"></span> NUEVO</span>
                    &nbsp;&nbsp;&nbsp;
                    <strong class="titulo_panel">LISTADO DE USUARIOS </strong>
                </div>
                <div class="panel-body">
                    <table id="tbl_lista" class="table table-striped table-condensed table-hover table-bordered" >
                        <thead class="cabecera_tabla" >
                            <tr>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Nombre Completo</th>
<!--                                <th class="text-center">Apellido Paterno</th>
                                <th class="text-center">Apellido Materno</th>-->
                                <th class="text-center">Tipo de documento</th>
                                <th class="text-center">N° de documento</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Telefono</th>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Modal Registrar-->
        <div class="modal fade modalRegistrar" id="modalRegistrar" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header cabecera_modal">
                        <button type="button" class="close btn_cancelar_registrar" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel"><span class="fa fa-file"></span> REGISTRAR</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <!--<p class="statusMsg"></p>-->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Nombres</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="i_nombre" type="text" class="form-control input-sm nombre_apellido" placeholder="Nombres">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Apellido Paterno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="i_apellido_p" type="text" class="form-control input-sm nombre_apellido" placeholder="Apellido paterno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Apellido Materno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="i_apellido_m" type="text" class="form-control input-sm nombre_apellido" placeholder="Apellido materno">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Tipo documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-tag"></i></span>
                                        <select class="form-control input-sm" id="i_tipo_documento">
                                        </select>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Numero Documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-id-card"></i></span>
                                        <input id="i_numero_documento" type="text" class="form-control input-sm" placeholder="Numero Documento">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Correo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-envelope-o"></i></span>
                                        <input id="i_correo" type="text" class="form-control input-sm correo" placeholder="Correo">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Direccion</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                        <input id="i_direccion" type="text" class="form-control input-sm" placeholder="Direccion" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Telefono / Celular</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-mobile"></i></span>
                                        <input id="i_celular" type="text" class="form-control input-sm solo_numero_entero" placeholder="Telefono / Celular" maxlength="9"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none">
                            <div class="col-md-12">
                                <br>
                                <div class="col-md-5">
                                    <label class="">¿Desea generar un acceso?</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="radio_cambio" id="i_si" class="manito" value="1">&nbsp;SI
                                    &nbsp;
                                    <input type="radio" name="radio_cambio" id="i_no" class="manito" value="2">&nbsp;NO
                                </div>
                                <input type="hidden" id="i_tipo_usuario"/>
                            </div>
                        </div>
                       

                        <div class="row" id="i_div_usuario">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Perfil</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-user-secret"></i></span>
                                        <select id="i_perfil" class="form-control input-sm">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-user-circle"></i></span>
                                        <input id="i_usuario" type="text" class="form-control input-sm" placeholder="Usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-key"></i></span>
                                        <input id="i_clave" type="password" class="form-control input-sm" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="label_modal">Imagen</label>
                                    <div class="input-group i_sin_carga_foto">
                                        <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                        <input id="i_file" type="file" class="form-control input-sm cabecera_tabla">
                                    </div>

                                    <img src="" class="img-thumbnail imagen_modal i_con_carga_foto" id="i_imagen">
                                    <span class="fa fa-remove quitar_imagen_modal i_con_carga_foto" id="i_quitar_imagen"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn_cancelar_registrar" data-dismiss="modal"><span class="fa fa-remove"></span> Cancelar</button>
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw btn_carga_registrar"></i>
                        <!--<span class="sr-only">Cargando...</span>-->
                        <button type="button" class="btn btn-info btn_registrar" id="btn_registrar" ><span class="fa fa-check-circle"></span> Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Modificar-->
        <div class="modal fade modalModificar" id="modalModificar" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header cabecera_modal">
                        <button type="button" class="close btn_cancelar_modificar" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel"><span class="fa fa-file"></span> ACTUALIZAR</h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <input type="hidden" id="m_id" />
                        <input type="hidden" id="m_id_usuario" />
                        
                        <input type="hidden" id="back_imagen"/>
                        <input type="hidden" id="nombre_imagen"/>
                        <input type="hidden" id="m_cambio" value="0"/>
                        <!--<p class="statusMsg"></p>-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="m_nombre" type="text" class="form-control input-sm nombre_apellido" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Apellido Paterno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="m_apellido_p" type="text" class="form-control input-sm nombre_apellido" placeholder="Apellido Paterno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Apellido Materno</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="glyphicon glyphicon-pencil"></i></span>
                                        <input id="m_apellido_m" type="text" class="form-control input-sm nombre_apellido" placeholder="Apellido Materno">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Tipo documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-tag"></i></span>
                                        <select class="form-control input-sm" id="m_tipo_documento">
                                        </select>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Numero Documento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-id-card"></i></span>
                                        <input id="m_numero_documento" type="text" class="form-control input-sm" placeholder="Numero Documento">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Correo</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-envelope-o"></i></span>
                                        <input id="m_correo" type="text" class="form-control input-sm correo" placeholder="Correo">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Direccion</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-home"></i></span>
                                        <input id="m_direccion" type="text" class="form-control input-sm" placeholder="Direccion" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Telefono / Celular</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-mobile"></i></span>
                                        <input id="m_celular" type="text" class="form-control input-sm solo_numero_entero" placeholder="Telefono / Celular" maxlength="9"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Estado</label>
                                    <select class="form-control input-sm" id="m_estado">
                                        <option value='1'>Activo</option>
                                        <option value='2'>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none">
                            <div class="col-md-12">
                                <br>
                                <div class="col-md-5">
                                    <label class="">¿Desea generar un acceso?</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="radio_cambio" id="m_si" class="manito" value="1">&nbsp;SI
                                    &nbsp;
                                    <input type="radio" name="radio_cambio" id="m_no" class="manito" value="2">&nbsp;NO
                                </div>
                                <input type="hidden" id="m_tipo_usuario"/>
                            </div>
                        </div>
                       

                        <div class="row" id="m_div_usuario">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Perfil</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-user-secret"></i></span>
                                        <select id="m_perfil" class="form-control input-sm">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-addon label_modal"><i class="fa fa-user-circle"></i></span>
                                        <input id="m_usuario" type="text" class="form-control input-sm" placeholder="Usuario">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="m_contra_check">
                                            <input type="checkbox" class="tamanio_checkbox" id="m_check">
                                        </span>
                                        <span class="input-group-addon label_modal"><i class="fa fa-key"></i></span>
                                        <input id="m_clave" type="password" class="form-control input-sm" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>

                           <div class="col-md-4">
                                <div class="form-group">
                                    <label class="label_modal">Imagen</label>
                                    <div class="input-group m_sin_carga_foto">
                                        <span class="input-group-addon label_modal"><i class="fa fa-file"></i></span>
                                        <input id="m_file" type="file" class="form-control input-sm cabecera_tabla">
                                    </div>
                                    <img src="" class="img-thumbnail imagen_modal m_con_carga_foto" id="m_imagen">
                                    <span class="fa fa-remove quitar_imagen_modal m_con_carga_foto" id="m_quitar_imagen"></span>
                                </div>
                            </div>
                            
                        </div>

<!--                        <div class="row">
                            
                        </div>-->
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn_cancelar_modificar" data-dismiss="modal"><span class="fa fa-remove"></span> Cancelar</button>
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw btn_carga_modificar"></i>
                        <!--<span class="sr-only">Cargando...</span>-->
                        <button type="button" class="btn btn-info btn_modificar" id="btn_modificar" ><span class="fa fa-check-circle"></span> Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar-->
        <div class="modal fade modalEliminar" id="modalEliminar" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header cabecera_modal">
                        <button type="button" class="close btn_cancelar_eliminar" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel"><span class="fa fa-file"></span> ELIMINAR</h4>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <input type="hidden" id="e_id"/>
                        <center><strong>¿Desea eliminar este trabajador?</strong></center>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn_cancelar_eliminar" data-dismiss="modal"><span class="fa fa-remove"></span> Cancelar</button>
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw btn_carga_eliminar"></i>
                        <button type="button" class="btn btn-info btn_eliminar" id="btn_eliminar" ><span class="fa fa-check-circle"></span> Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
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