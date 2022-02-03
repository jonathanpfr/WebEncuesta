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

        <script src="../../paquetes/jquery/jquery-ui.js"></script>

        <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
        <script src="../../paquetes/general/js/general.js" ></script>
        <script src="js/funciones.js" ></script>

    </head>
    <body>
<!--        <input type="hidden" id="get_id_instituto"/>
        <input type="hidden" id="get_nombre_instituto"/>-->
        <div class="contenedor">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <!--<span class="badge manito red" id="btn_atras"><span class="fa fa-arrow-left"></span> ATRAS</span>-->
                    &nbsp;&nbsp;&nbsp;
                    <span class="badge manito" id="btn_nuevo"><span class="fa fa-plus"></span> NUEVO</span>
                    &nbsp;&nbsp;&nbsp;
                    <strong class="titulo_panel">LISTADO DE PERSONAL </strong>
                    &nbsp;&nbsp;&nbsp;

<!--                    <stnong class="titulo_panel_red">INSTITUTO:</stnong>
                    <stnong class="titulo_panel_red" id="span_nombre"></stnong>-->
                </div>
                <div class="panel-body">
                    <table id="tbl_lista" class="table table-striped table-condensed table-hover table-bordered" style="width: 100%;">
                        <thead class="cabecera_tabla" >
                            <tr>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Especialidad</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Apellidos y nombres</th>
                                <th class="text-center">Dni</th>
                                <th class="text-center">Reporte</th>
                                <th class="text-center">Descargar CV</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                        <center><strong>¿Desea eliminar este personal?</strong></center>
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