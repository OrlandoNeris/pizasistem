

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
	id_editar = 0;
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

	$.ajax({
		url:'includes/clases/cl_abm.php',
		type:'POST',

		data: 'id_prod='+id_prod+'&Cantidad='+Cantidad+'&fecha='+fecha+'&cliente='+cliente+'&dir='+dir+'&formapago='+formapago+'&num_factura='+num_factura+'&tipo_factura='+tipo_factura+"&boton=factura"
	}).done(function(resp){
		alert(resp);
		//window.location.href = "factura.php";
	});
}

function getNumeroFactura()
{ //busco el numero de la nueva factura
	$.ajax({
	type: "POST",
	url: 'includes/clases/cl_abm.php',
	data: "boton=num_factura"
}).done(function( ulti ) {
			//alert("algo"+ulti);
			$("#formulario [name='num_factura']").val(ulti)
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
			alert("No Hay existencias ");
		}

	});
}
