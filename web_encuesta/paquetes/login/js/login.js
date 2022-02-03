var myVar;

function myFunction() {
    myVar = setTimeout(function () {
        $('#mensaje').hide();
    }, 2000);
}

function myStopFunction() {
    clearTimeout(myVar);
}
$(document).ready(function () {
    $(".mat-input").focus(function () {
        $(this).parents(".mat-div").find(".color").css({"color": "yellow"});
        $(".mat-input").focusout(function () {
            $(".color").css({"color": "white"});
            $(this).parents(".mat-div").find(".color").css({"color": "white"});
        });
    });
//    $("#i_usuario").attr('data-error', 'El usuario esta vacio');
    //logearse con el boton
    $('#mensaje').hide();
    $("#btn_logearse").click(function () {
        myStopFunction();
        myFunction();

//        var tiempo=setTimeout(function () {
//            $("#btn_logearse").show();
//            $('#mensaje').hide();
//        }, 5000);

        $("#btn_logearse").hide();
        $('#mensaje').show();
        mostrar_resultado("CARGANDO..", "orange");

        var login_username = $("#i_usuario").val();
        var login_userpass = $("#i_password").val();
        var contador = 0;
        if ($.trim(login_username) == "") {
            $("#i_usuario").addClass("invalid");
            $("#label_usuario").attr('data-error', 'El usuario esta vacio');
            contador++;

        }
        if ($.trim(login_userpass) == "") {
            $("#i_password").addClass("invalid");
            $("#label_password").attr('data-error', 'la contraseña esta vacia');
            contador++;
        }

        if (contador == 0) {
//            mostrar_resultado("HAY DATOS INCOMPLETOS", "red");
            entrar_logeo();

        } else {
            $("#btn_logearse").show();
            mostrar_resultado("HAY DATOS INCOMPLETOS", "red");

        }
//        $label.attr('data-error', 'The name field is required');
    });





//    var list = ['un texto'];//, 'otro texto', 'último texto']; // la lista de textos a mostrar
//    var txt = $('#mensaje');  // el ID del contenedor
//    var options = {
//        duration: 500, // el tiempo que el texto permanecerá visible
//        rearrangeDuration: 500, // ella duración del efecto
//        effect: 'slideLeft', // el efecto que puede ser fadeIn, slideLeft, slideTop o random
//        centered: true // si queremos que se centre
//    }
//    txt.textualizer(list, options); // enviamos los datos
//    txt.textualizer('start'); // y lo ejecutamos

});

function mostrar_resultado(texto, color) {
    $('#mensaje').hide();
    $('#mensaje').show();
    $('#mensaje').css({"color": color});
    var list = [texto];//, 'otro texto', 'último texto']; // la lista de textos a mostrar
    var txt = $('#mensaje');  // el ID del contenedor
    txt.textualizer('destroy');
    var options = {
        duration: 100, // el tiempo que el texto permanecerá visible
//        rearrangeDuration: 1000, // ella duración del efecto
        effect: 'slideLeft', // el efecto que puede ser fadeIn, slideLeft, slideTop o random
        centered: true // si queremos que se centre
    }
    txt.textualizer(list, options); // enviamos los datos
    txt.textualizer('start'); // y lo ejecutamos
//    .textualizer('pause') pausaria la animación
//.textualizer('stop') la detendría por completo
//.textualizer('destroy') la elimininaría
    //cerrarse despues de un tiempo
//    setTimeout(function () {
//        $("#btn_logearse").show();
//        $('#mensaje').hide();
//    }, 5000);
}

function entrar_logeo() {
    myStopFunction();
    myFunction();

    var login_username = $("#i_usuario").val();
    var login_userpass = $("#i_password").val();
//    alert(login_username);
//    alert(login_userpass);
    var timeSlide = 2000;
    setTimeout(function () {
        $.ajax({
            type: 'POST',
            url: 'paquetes/login/login/controlador_login.php',
            data: {login_username: login_username, login_userpass: login_userpass},
            success: function (msj) {
                var dato = $.trim(msj);
//                alert(dato);
                if (dato == "1") {
                    mostrar_resultado("BIENVENIDO", "green");
                    setTimeout(function () {
                        window.location.href = "modulos/principal/principal.php";
                    }, (timeSlide + 500));
                } else {
//                    alert(dato);
                    myStopFunction();
                    myFunction();
                    mostrar_resultado("LOS DATOS SON INCORRECTOS", "red");
                    $("#btn_logearse").show();
                    $("#i_usuario").addClass("invalid");
                    $("#label_usuario").attr('data-error', '');
                    $("#i_password").addClass("invalid");
                    $("#label_password").attr('data-error', '');
                }
            },
            error: function (resul) {
//                alert(resul);
                myStopFunction();
                myFunction();
                mostrar_resultado("ERROR", "red");
                $("#btn_logearse").show();
            }
        });
    }, timeSlide);

    return false;

//    });
}
