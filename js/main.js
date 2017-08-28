var NumeroFactura = 0;

function confirmar()
{

		var Usuario=$('#Usuario').val();
		var Contrasena=$('#Contrasena').val();

		$.ajax({
			type: "POST",
			dataType: 'json',
			url: "includes/clases/cl_abm.php",
			data: 'Usuario='+Usuario+'&Contrasena='+Contrasena+"&boton=ingresar"
		}).done(function(resp){
			if(resp){
				location.href='main.php';
			}else {
				alert('Usuario o Contraseña incrorrecto');
			}
		});
}

function cerrar()
{
	$.ajax({
			url:'includes/clases/cl_abm.php',
			type:'POST',
			data:"boton=cerrar"
		}).done(function(resp){
			window.location.href = "index.php";
		});
}

function limpiar()
{
	$("#formulario [type='text']").val("")//limpiar formulario (todos los  type="text")
	$("#formulario select").val(0)//loimpiar select de los formulario

}

function agregar()
{
	var id_prod= $('#id_prod').val();
	var Cantidad = $('#Cantidad').val();
	var num_factura =  $('#num_factura').val();

	$.ajax({
		url:'includes/clases/cl_abm.php',
		type:'POST',
		data: 'id_prod='+id_prod+'&Cantidad='+Cantidad+'&num_factura='+num_factura+"&boton=agregar"
	}).done(function(resp){
			alert(resp);
	});

}

function factura_venta()
{
	var id_prod= $('#id_prod').val();
	var Cantidad = $('#Cantidad').val();
	var fecha = $('#fecha').val();
	var cliente = $('#cliente').val();
	var dir = $('#dir').val();
	var formapago = $('#formapago').val();
	var num_factura = $('#num_factura').val();
	var tipo_factura = $('#tipo_factura').val();
	var Descuento = $('#Descuento').val();

	$.ajax({
		url:'includes/clases/cl_abm.php',
		type:'POST',
		data: 'Descuento='+Descuento+'&id_prod='+id_prod+'&Cantidad='+Cantidad+'&fecha='+fecha+'&cliente='+cliente+'&dir='+dir+'&formapago='+formapago+'&num_factura='+num_factura+'&tipo_factura='+tipo_factura+"&boton=factura"
	}).done(function(resp){
		if(resp == 9){
			//location.href='factura.php';
			mostrar_factura();
		}else {
			//
			alert(resp);
		}
	});
}

function mostrar_factura()
{
	$.ajax({
		url:'includes/clases/cl_abm.php',
		type:'POST',
		data: "boton=factura_ya"
	}).done(function(resp){
		data = eval(resp);
		//alert(data[0].tipo);
		var listado = "";

		listado += '<tr>'
		listado += '<td  style="width:50%" valign="top">EMPRESA: '
		listado += '<br>'
		listado += '<p align="center"> Pizeria Lo Vago SA</p>'
		listado += '</td>'
		listado += '<td style="width:50%">TIPO FACTURA: '+data[0].tipo+' <br>'
		listado += 'NUMERO: '+data[0].numero+' <br> FECHA: '+data[0].fecha+' <br> CUIT: MICUIT  <br>'
		listado += '</td>'
		listado += '</tr>'
		$("#numero1").html( listado );
		var listado = "";
		listado += 'cliente <b>NOMBRE CLIENTE:'+data[0].nombre_persona+'  </b>'
		listado += '<br>domicilio: '+data[0].direccion+'  '
		listado += '<br>LUGAR de EMISION:'+data[0].forma_pago+' '
		$("#numero2").html(listado);
	});
}



function getNumeroFactura()
{ //busco el numero de la nueva factura
	$.ajax({
	type: "POST",
	url: 'includes/clases/cl_abm.php',
	data: "boton=num_factura"
}).done(function( ulti ) {
			$("#formulario [name='num_factura']").val(ulti)
			NumeroFactura = ulti;
			alert(NumeroFactura);
	});
}

function buscar(){

	var Buscar=$('#Buscar').val();

	$.ajax({
		type: "POST",
		url: 'includes/clases/cl_abm.php',
		data: 'Buscar='+Buscar+'&boton=buscar'
	}).done(function(data){
		if(data){
			data_busqueda = eval(data);
			$("#busqueda [name='idprod']").val(data_busqueda[0].id);
			$("#busqueda [name='nombreproducto']").val(data_busqueda[0].ProdNombre);
		}else {
			alert("No Disponible");
		}

	});
}
