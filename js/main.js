var id_producto = 0;

function confirmar(){

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

function limpiar(){
	$("#formulario [type='text']").val("")//limpiar formulario (todos los  type="text")
	$("#formulario select").val(0)//loimpiar select de los formulario
	id_editar = 0;
}

function factura()
{
	$.ajax({
		url:'includes/clases/cl_abm.php',
		type:'POST',
		data:"boton=factura"
	}).done(function(resp){
		window.location.href = "factura.php";
	});
}

function getNumeroFactura(){ //busco el numero de la nueva factura
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
			//alert(data_busqueda[0].ProdNombre);
			//alert(data_busqueda[0].id);
		}else {
			alert("No Hay existencias ");
		}

	});
}
