//$(document).ready(function () {
//    $('#example').DataTable({
//        "language": {
//            "sProcessing": "Procesando...",
//            "sLengthMenu": "Mostrar _MENU_ registros",
//            "sZeroRecords": "No se encontraron resultados",
//            "sEmptyTable": "Ningún dato disponible en esta tabla",
//            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
//            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
//            "sInfoPostFix": "",
//            "sSearch": "Buscar:",
//            "sUrl": "",
//            "sInfoThousands": ",",
//            "sLoadingRecords": "Cargando...",
//            "oPaginate": {
//                "sFirst": "Primero",
//                "sLast": "Último",
//                "sNext": "Siguiente",
//                "sPrevious": "Anterior"
//            },
//            "oAria": {
//                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
//                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
//            }
//        },
//        columnDefs: [
//            {
//                targets: [0, 1, 2],
//                className: 'mdl-data-table__cell--non-numeric'
//            }
//        ]
//    });
//    $("#tablas select").val('10'); //seleccionar valor por defecto del select
//    $('#tablas input').css({"height": "30px", "width": "200px"});
//    $('#tablas select').addClass("browser-default"); //agregar una clase de materializecss de esta forma ya no se pierde el select de numero de registros.
//    $('#tablas select').css({"height": "30px", "width": "50px", "display": "initial"});
//    $('#tablas select').material_select(); //inicializar el select de materialize
//});