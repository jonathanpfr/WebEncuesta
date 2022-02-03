<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <!-- CORE CSS-->
        <link href="paquetes/login/css/iconos.css" rel="stylesheet">
        <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <link rel="stylesheet" href="paquetes/login/css/materialize.min.css">
        <!--<link rel="stylesheet" href="paquetes/css/materialize.min_dos.css">-->
        <link rel="stylesheet" href="paquetes/login/css/login.css">

        <script type="text/javascript" src="paquetes/login/js/jquery.3.2.1.min.js"></script>
        <script src="paquetes/login/js/textualizer.js"></script> 
                <!--<script src="http://code.jquery.com/jquery.min.js"></script>--> 
        <!--<script src="modulos/principal/textualizer-master/textualizer.js"></script>--> 
        <!--<script src="modulos/principal/textualizer-master/textualizer.js"></script>--> 
    </head>
    <body class="ala" >


        <div id="login-page" class="row">
            <div class="col s12 z-depth-6 card-panel background-form">
                <form class="login-form ">
                    <div class="row">
                        <div class="input-field col s12 center">
                            <font style="font-family: monospace;font-size: 35px" >LOGIN</font>
                            
                            <!--<img class="center logo"  src="paquetes/imagenes/logo.jpg" style="width: 150px;height: 59px;"  />-->
                            <p class="center login-form-text">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Inicia sesión con tu cuenta
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </p>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12 mat-div">
                            <i class="material-icons prefix color">account_circle</i>
                            <input data-success="right"   class="validate mat-input" id="i_usuario" type="text">
                            <label id="label_usuario"  class="mat-label" for="i_usuario"  >Usuario</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12 mat-div">
                            <i class="material-icons prefix color">vpn_key</i>
                            <input   class="validate mat-input" data-success="right" id="i_password" type="password">
                            <label  id="label_password" class="mat-label" for="i_password">Contraseña</label>
                        </div>
                    </div>
                    <div class="row" style="display: none;">          
                        <div class="input-field col s12 m12 l12  login-text">
                            <input type="checkbox" id="remember-me" />
                            <!--<label for="remember-me">Recordar</label>-->
                            <label   for="remember-me" style="color: white">Recuerdame</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <a  href="index.php" class="waves-effect waves-light btn col s12 red">Atras</a>    
                        </div>
                        <div class="input-field col s6">
                            <button id="btn_logearse" type="button" id="btn_guardar_modal" class="waves-effect waves-light btn col s12">Ingresar</button>
                        </div>
                    </div>
                    <div id="mensaje" style="display: none">
                    </div> 
                </form>
            </div>
        </div>
        <!--materialize js-->
        <script src="paquetes/login/js/materialize.min.js"></script>
        <script src="paquetes/login/js/login.js"></script>
    </body>
</html>