(function(){
 	"use strict";

 	var regalo = document.getElementById('regalo');
 	document.addEventListener('DOMContentLoaded',function(){
		//campos datos usuario
		var nombre = document.getElementById('nombre');
		var apellido = document.getElementById('apellido');
		var email = document.getElementById('email');
		//campos pases
		var pase_dia = document.getElementById('pase_dia');
		var pase_dosdias = document.getElementById('pase_dosdias');
		var pase_completo = document.getElementById('pase_completo');
		//botones y divs
		var calcular = document.getElementById('calcular');
		var errorDiv = document.getElementById('error');		
		var botonRegistro = document.getElementById('btnRegistro');
		var lista_productos = document.getElementById('lista-productos');
		var suma = document.getElementById('suma-total');
		var camisas = document.getElementById('camisa_evento');
		var etiquetas = document.getElementById('etiquetas');
		// hecho por alumno
		var mapa = document.getElementById('mapa');
		// hecho por alumno
		if(mapa != null){
			mapa.innerHTML = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39841.61698881327!2d-58.21799740780491!3d-34.77689893849062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a328c7a646b977%3A0x65b97d37a93c6040!2sCalle%20135%202544%2C%20B1884KYX%20Berazategui%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1586209304794!5m2!1ses-419!2sar" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
		}

		try {
			botonRegistro.disabled = true;
			//botonRegistro.className =  "make-background-grey";
			botonRegistro.type = "hidden";
			//extras
		} catch (e){

		}

		if(document.getElementById('calcular')){
			calcular.addEventListener('click',calcularMontos);
			pase_dia.addEventListener('blur', mostrarDias);
			pase_dosdias.addEventListener('blur', mostrarDias);
			pase_completo.addEventListener('blur', mostrarDias);

			var formulario_editar = document.getElementsByClassName('editar-registrado');
			if(formulario_editar.length > 0){
				if(pase_dia.value || pase_dosdias.value || pase_completo.value){
					mostrarDias();
				}
			}

			if(errorDiv != null){
				nombre.addEventListener('blur',validarCampos);
				apellido.addEventListener('blur',validarCampos);
				email.addEventListener('blur',validarCampos);
				email.addEventListener('blur',validarMail);
				function validarMail(){
					if(this.value.indexOf("@") > -1){
						errorDiv.style.display = 'none';
						this.style.border = '1px solid #cccccc';
					}else{
						errorDiv.style.display = 'block';//mostrar error en un bloque (caja)
						errorDiv.innerHTML = "debe tener al menos una @";//dentro del bloque va este texto
						this.style.border = '1px solid red';//caja del input
						errorDiv.style.border = '1px solid red';//estilo de caja del mensaje de error
					}
				}

				function validarCampos(){
					//si el valor introducido en el input de id 'nombre' esta sin valor
					if(this.value == ''){
						errorDiv.style.display = 'block';//mostrar error en un bloque (caja)
						errorDiv.innerHTML = "este campo es obligatorio";//dentro del bloque va este texto
						this.style.border = '1px solid red';//caja del input
						errorDiv.style.border = '1px solid red';//estilo de caja del mensaje de error
					}else{

						errorDiv.style.display = 'none';
						this.style.border = '1px solid #cccccc';
					}

				}
			}

			function calcularMontos(event){
				//cada vez que presionamos click sobre boton dado por id 'calcular' se desencadena lo siguiente
				event.preventDefault();
				if(regalo.value === ''){
					alert("Debes elegir un regalo");
					regalo.focus();
				}else{
					var boletosDia = parseInt(pase_dia.value,10) || 0, 
					boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
					boletoCompleto = parseInt(pase_completo.value, 10) || 0,
					cantCamisas = parseInt(camisas.value, 10) || 0,
					cantEtiquetas = parseInt(etiquetas.value, 10) || 0;
					var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + (boletoCompleto*50)+ ((cantCamisas * 10) * .93) + (cantEtiquetas*2);
					var listadoProductos = [];
					if(boletosDia >= 1){
						listadoProductos.push(boletosDia + ' Pases por día');
					} 
					if(boletos2Dias >= 1){
						listadoProductos.push(boletos2Dias + ' Pases por 2 días');
					}
					if(boletoCompleto >= 1){
						listadoProductos.push(boletoCompleto + ' Pase por 3 días');
					}
					if(cantCamisas >= 1){
						listadoProductos.push(cantCamisas + ' Camisas');
					}
					if(cantEtiquetas >= 1){
						listadoProductos.push(cantEtiquetas + ' Etiquetas');
					}
					lista_productos.style.display = "block";
					lista_productos.innerHTML = '';
					// var resultado;
					for(var i = 0 ; i < listadoProductos.length ; i++){
						//accedemos a la ubicacion en el html dada por el id: lista_productos en este caso es un div (ver registro.html)
						//y le añade los valores que guardamos en el array listadoProductos que en este caso son strings, separandolos con un br (line break)
						lista_productos.innerHTML += listadoProductos[i] + '<br/>';
					}
					suma.innerHTML = "$ " + totalPagar.toFixed(2); 
					try{
						botonRegistro.disabled = false;
						//botonRegistro.className = "button";
						botonRegistro.type = "submit";
					} catch (e){

					}
					document.getElementById('total_pedido').value = totalPagar.toFixed(2); //modificado x alumno (toFixed)
				}
			}

			// agregado por alumno
			// var diasElegidos = [];
			// agregado por alumno
			function mostrarDias(){
				var boletosDia = parseInt(pase_dia.value,10) || 0, 
				boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
				boletoCompleto = parseInt(pase_completo.value, 10) || 0;
				var diasElegidos = []; 
				if(boletosDia > 0){
					diasElegidos.push('viernes');
					// console.log(diasElegidos);
				}
				if(boletos2Dias > 0){
					diasElegidos.push('viernes','sabado');
					// console.log(diasElegidos);
				}
				if (boletoCompleto > 0){
					diasElegidos.push('viernes', 'sabado','domingo');
					// console.log(diasElegidos);
				}
				for (var i = 0; i < diasElegidos.length; i++){
					document.getElementById(diasElegidos[i]).style.display = 'block';
				}
			}
		}
	});//DOM CONTENT loaded
})();
