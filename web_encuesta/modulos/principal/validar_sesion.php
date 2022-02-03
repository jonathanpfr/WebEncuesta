<?php 
@session_start();
if (isset($_SESSION['id_user']))
{
    //echo "correcto";
//    echo "1";
}
else
{
//    echo "0";
echo "
<script>

                swal({
                title: 'Atención',
                text: 'NO SE DETECTO SU SESSION',
                type: 'error',
                showCancelButton: false,
                confirmButtonText: 'Ok',
                closeOnConfirm: false
            },
                    function () {
                    location.href='../../clases/logout.php';
                        
                    });
</script>";
}
//alert('NO SE DETECTO SU SESSION, VUELVA A LOGUEARCE');
 //alertify.alert('', variable, function () {
  //                 location.href='salir.php'
   //             });
//window.location.href = '../../vista_enfermera.php';
// alertify.alert('', 'NO SE DETECTO SU SESSION, VUELVA A LOGUEARCE', function () {
//                   location.href='salir.php'
//               });
?>