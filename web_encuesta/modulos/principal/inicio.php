<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>inicio</title>
        <link href="../../paquetes/login/css/iconos.css" rel="stylesheet">
        <link rel="stylesheet" href="../../paquetes/login/css/materialize.min.css">
        <link rel="stylesheet" href="../../paquetes/login/css/autocomplete.css">
        <link rel="stylesheet" href="../../paquetes/login/css/material.min.css">
        <link rel="stylesheet" href="../../paquetes/login/css/dataTables.material.min.css">
        <link rel="stylesheet" href="../../paquetes/login/css/normalize.css">
        <link rel="stylesheet" href="../../paquetes/login/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="../../paquetes/login/css/style.css">
        <script type="text/javascript">
            function sacarDate() {
                ahora = new Date();//crea una fecha cogiendola del sistema
                hora = ahora.getHours(); //acumulando horas, minutos, segundos, dia, mes y año
                minuto = ahora.getMinutes();
                segundos = ahora.getSeconds();
                dia = ahora.getDate();
                año = ahora.getFullYear();

                var diad = new Array(7);
                diad[0] = "Domingo";
                diad[1] = "Lunes";
                diad[2] = "Martes";
                diad[3] = "Miercoles";
                diad[4] = "Jueves";
                diad[5] = "Viernes";
                diad[6] = "Sabado";

                var mes = new Array(12);
                mes[0] = "Enero";
                mes[1] = "Febrero";
                mes[2] = "Marzo";
                mes[3] = "Abril";
                mes[4] = "Mayo";
                mes[5] = "Junio";
                mes[6] = "Julio";
                mes[7] = "Agosto";
                mes[8] = "Septiembre";
                mes[9] = "Octubre";
                mes[10] = "Noviembre";
                mes[11] = "Diciembre";

                if (hora < 10) {
                    hora = "0" + hora;
                }
                if (minuto < 10) {
                    minuto = "0" + minuto;
                }
                if (segundos < 10) {
                    segundos = "0" + segundos;
                }

                var mostrarReloj = hora + " : " + minuto + " : " + segundos;
                var mostrarFecha = diad[ahora.getDay()] + "," + ' ' + dia + ' ' + "de" + ' ' + mes[ahora.getMonth()];
                var mostrarAño = año;

                document.tiempo.reloj.value = mostrarReloj;
                document.tiempo.fecha.value = mostrarFecha;
                document.tiempo.año.value = mostrarAño;

                setTimeout("sacarDate()", 1000);


            }
        </script>
        <style>
            .tiempo{
                margin-top: 20px;
            }

            .tiempo .time{
                color:#438EB9;
                font-weight: 800;
                font-size: 20px;
                border:0;
                background: none;
                font-family:Arial; 

            }

            .tiempo .fecha{
                color:#438EB9;
                font-weight: 800;
                font-size: 18px;
                border:0;
                background: none;
                font-family:Arial; 
            }

            .tiempo .año{
                color:#438EB9;
                font-weight: 800;
                font-size: 18px;
                border:0;
                background: none;
                font-family:Arial; 
            }
        </style>
    </head>

    <body onLoad="sacarDate()" >

        <form name="tiempo" class="tiempo">
            <input class="time text-right" type="button" name="reloj"><br>
            <input class="fecha text-right" type="button" name="fecha"><br>
            <input class="año text-right" type="button" name="año">
           
        </form>
<!--         <div style="margin-top: 5px;" class="right-align" >
                <button id="btn_notificacion"  type="button" class="btn-floating waves-effect waves-light btn red">
                    <i class="material-icons">info</i>
                    </button>
            </div>-->

        <br>
    <center>
        <!--<img class="center logo"  src="../../paquetes/imagenes/logo.jpg"  />-->
        <!--<font style="font-family: Old English Text MT;font-size: 55px;color:#438EB9" >Castro</font>--> 
    </center>
    <br>
    <article class="col s12 center">
         <h4>sistema informático de supervision académica</h4>
    </article>
    <br>
    <!--<center><img src="../../paquetes/imagenes/logo_castro.png" width="40%" height="40%"/></center>-->


    <script src="../../paquetes/login/js/jquery.3.2.1.min.js"></script>
    <script src="../../paquetes/login/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../paquetes/login/js/jquery.autocomplete.min.js" ></script>
    <script src="../../paquetes/login/js/jquery.dataTables.min.js"></script>
    <script src="../../paquetes/login/js/dataTables.material.min.js"></script>

    <script src="../../paquetes/sweet_alert/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../paquetes/sweet_alert/sweetalert.css">

    <script src="js/funciones_inicio.js"></script>

</body>
</html>