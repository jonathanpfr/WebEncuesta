$(document).ready(function(){    




                      $("#btn_agregar").click(function() {

                        cadena = "<tr>";
						cadena = cadena + "<td></td>";
						cadena = cadena + "<td><input name='tip_pollo[]' class='form-control has-orange' id='tip_pollo[]' type='text' value='"+ $("#n_tipo_pollo   option:selected").val() +"'  OnFocus='this.blur()'/></td>";
						
                        cadena = cadena + "<td><input name='n_javas_array[]' class='n_javas_array form-control has-orange' id='n_javas_array[]' type='text' value='"+ $("#n_javas").val() +"' onkeyup='calcular_total_array();'  /></td>";
						
						cadena = cadena + "<td><input name='n_nro_java[]' class='n_nro_java form-control has-orange' id='n_nro_java[]' type='text' value='"+ $("#cant_javas").val() +"' onkeyup='calcular_total_array();'  /></td>";
						
                        cadena = cadena + "<td><input name='n_pollos_array' class='n_pollos_array form-control has-orange' id='n_pollos_array[]' type='text' value='"+ $("#peso").val() +"'  onkeyup='calcular_total_array();' /></td>";
						
						
						cadena = cadena + "<td><input name='n_nro_x_tara_array' class='n_nro_x_tara_array form-control has-orange' id='n_nro_x_tara_array[]' type='text' value='7'  onkeyup='calcular_total_array();sumar();'  /></td>";
						cadena = cadena + "<td><input name='n_tara_array[]' class='n_tara_array form-control has-orange' id='n_tara_array[]' type='text' value=''  onkeyup='calcular_total_array();sumar();' /></td>";
						
						cadena = cadena + "<td><input name='n_av_array[]' class='n_av_array form-control has-orange' id='n_av_array[]' type='text' value=''  onkeyup='calcular_total_array();sumar();' /></td>";
						
                        cadena = cadena + "<td><a class='elimina'><img src='img/delete.png' /></a></td></tr>";
                        $("#grilla tbody").append(cadena);
                        $('#cabecera input[type="text"]').val('');
                        $("#valor_ide").focus();
						fn_dar_eliminar();
						calcular_total_array();
						$("#cant_javas").val(8);
                      });
				
				
				
                    function fn_dar_eliminar(){
                    $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    $(this).parents("tr").fadeOut("normal", function(){
                    $(this).remove();
					sumar();
					calcular_total_array()

                           });
                    
                     });	
			        };				
				
				
				
				
				

     });           






$(document).ready(function(){ 
/* input numericos */
$("#n_javas").numeric();

$("#n_javas").numeric();
$("#peso").numeric();
$("#total_javas").numeric();
$("#p_t_av").numeric();
$("#p_bruto").numeric();
$("#p_t_tara").numeric();
$("#p_dev_av_pollo").numeric();
$("#p_dev").numeric();
$("#p_precio").numeric();
$("#p_importe").numeric();
/* */



var inputs = $(':input').keypress(function (e) {
             if (e.which == 13) {
                 e.preventDefault();
                 var nextInput = inputs.get(inputs.index(this) + 1);
                 if (nextInput) {
                     nextInput.focus();
                 }
             }
         });
 
              

   
$(".date-picker").datepicker();

$(".date-picker").on("change", function () {
    var id = $(this).attr("id");
    var val = $("label[for='" + id + "']").text();
    $("#msg").text(val + " changed");
});
});


$( "#target" ).scroll(function() {
 
});
/*  suma de array     */
function calcular_total_array() {
	importe_total = 0
	javas = 0
	bruto=0
	tara=0
	av=0
	
	sumar();
	$(".n_javas_array").each(
		function(index, value) {
			javas = javas + eval($(this).val());
		}
	);
	
	$(".n_pollos_array").each(
	
		function(index, value) {
			bruto = bruto + eval($(this).val());
		}
	);
/*
	$(".n_tara_array").each(
		function(index, value) {
			tara = tara + eval($(this).val());
		}
	);

*/

	$('.n_tara_array').each(function () {
    tara += parseFloat(this.value);
    });
	
	$('.n_av_array').each(function () {
    av += parseFloat(this.value);
    });
	
	$("#total_javas").val(javas);
	$("#p_bruto").val(bruto);
	$("#p_t_tara").val(tara);
	$("#p_t_av").val(av);
	
	
	var cant=$("#cant_java" ).val();

	
	

}

/* fin suma array */
/* calculamos la suma de los array detalles */

function sumar(){
		
		var a_tara = [], a_cant_tara = [], a_importe  = [];
		
		$('.n_javas_array').each( function () {		 
			 a_tara.push($(this));
		  } );
		$('.n_nro_x_tara_array').each( function () {		 
			 a_cant_tara.push($(this));
		  } );
		$('.n_tara_array').each( function () {		 
			 a_importe.push($(this));
		  } );  
		  
		for(var i =0 ; i < a_cant_tara.length ; i++){
			
			a_importe[i][0]['value'] = a_tara[i][0]['value'] * a_cant_tara[i][0]['value'];
			
		}
		
		
		
		var a_av = [], a_cant_av = [], a_importe_av  = [];
		
		$('.n_javas_array').each( function () {		 
			 a_av.push($(this));
		  } );
		$('.n_nro_java').each( function () {		 
			 a_cant_av.push($(this));
		  } );
		$('.n_av_array').each( function () {		 
			 a_importe_av.push($(this));
		  } );  
		  
		for(var i =0 ; i < a_cant_av.length ; i++){
			
			a_importe_av[i][0]['value'] = a_av[i][0]['value'] * a_cant_av[i][0]['value'];
			
		}
		
		
		 
		  
		console.log(a_tara);		
		console.log(a_cant_tara);
		console.log(a_importe);
	}
	sumar();

/* fin de calculo suma array detalle*/
