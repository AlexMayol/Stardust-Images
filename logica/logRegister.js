function log()
{
	var nom=document.getElementById("usuario").value;
	var pass=document.getElementById("contrasenya").value;
	var alerta="Debes rellenar los siguientes campos: \n"
	var ok=true;
	
	if(nom.charAt(0)==' ' || nom== ""){
		alerta+="-Campo del nombre (no puede tener espacios ni estar vacio).\n";
		ok=false;
	}
	if(pass.charAt(0)==' ' || pass== ""){ 
		alerta+="-Campo de la contraseña (no puede tener espacios ni estar vacio).\n";
		ok=false;
	}
	if(ok==false){
		alert(alerta);
	}
	return ok;
}
function registro()
{
	var correcto=true;
	var msgError="Hay fallo(s):\n";
	var name=document.getElementById("nameReg").value;
	var pass=document.getElementById("passReg").value;
	var repitepass=document.getElementById("repeatReg").value;
	var fnac=document.getElementById("fnacReg").value;
	var email=document.getElementById("emailReg").value;
	
	/*Validación del nombre*/
	if(name==null || validateName(name)==false)
	{
		msgError+="-El nombre debe tener de 3 a 15 caracteres (mayúsculas o minúsculas).\n"
		correcto=false;
	}
	/*Validación de la contraseña*/
	if(pass==null ||validatePass(pass)==false)
	{
		msgError+="-La contraseña ha de 6 a 15 caracteres y puede haber _. Debe haber, como mínimo, una mayúscula, minúscula y un número.\n"
		correcto=false;
	}
	/*Comprobar que las pass son iguales*/
	if(pass!=repitepass)
	{
		msgError+="-Las contraseñas no coinciden.\n";
		correcto=false;
	}
	/*Validacion del genero*/
	if(document.getElementById("maleGender").checked==false && document.getElementById("femaleGender").checked==false ) {
		msgError+="-Debes seleccionar un sexo.\n";
		correcto=false;
	}
	/*Validación de la fecha de nacimiento*/
	if(fnac=null || validateDate(fnac)==false)
	{
		msgError+="-Fecha de nacimiento no valida.\n";
		correcto=false;
	}
	/*Validacion del email*/
	if(email==null || validateEmail(email)==false)
	{
		msgError+="-Formato de email erroneo.\n";
		correcto=false;
	}
	
	/*Validacion de todo*/
	if (correcto==true)
	{
		return true;
	}else
		alert(msgError);
		
	return correcto;
}
function validateName(name)
{
	var expreg= /[A-Za-z0-9]{3,15}$/
	if(expreg.test(name))
		return true;
	else
		return false;
}
function validatePass(pass)
{

var expreg= /(?!^[0-9]*$)(?!^[a-z]*$)(?!^[A-Z]*$)^([\w]{6,15})$/
if(expreg.test(pass))
		return true;
	else
		return false;
}
function validateDate(fnac)
{
	var expreg= /(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]\/(?!1[3-9]|00)[01][0-9]\/(?!10|28|29)[12][089][0-9][0-9]/ /* only valid dates from 1800 to 2099. Año bisiesto no va */
	if(expreg.test(fnac))
		return true;
	else
		return false;
}
function validateEmail(mail) 
{
    var expreg = /^\s*[a-z\d_]{1,255}@[a-z\d\-]{1,255}\.[a-z]{2,4}\s*$/
    if(expreg.test(mail))
		return true;
	else
		return false;
}


