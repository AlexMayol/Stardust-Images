function log(){
	var nom=document.forms["login"]["usuario"].value;
	var pass=document.forms["login"]["contrasenya"].value;
	var alerta="Debes rellenar los siguientes campos: \n"
	var ok=true;
	

	if(nom.charAt(0)==' ' || nom== ""){
		alerta+="-Campo del nombre (no puede tener espacios ni estar vacio).\n";
		ok=false;
	}
	if(pass.charAt(0)==' ' || pass== ""){ 
		alerta+="-Campo de la contraseña (no puede tener espacios ni estar vacio).\n";
		ok=false;
		ok=false;
	}
	if(ok==false){
		alert(alerta);
	}
	return ok;
}

function registro()
{
	var nom=document.forms["registro"]["nombre"].value;
	var pass=document.forms["registro"]["Contrasena"].value;
	var repitepass=document.forms["registro"]["Repitecontrasena"].value;
	var mail=document.forms["registro"]["email"].value;
	var fnac=document.forms["registro"]["bday"].value;
	var alerta="Fallo:\n";
	var ok=true;
	var fallo=false;//variable auxiliar para no tener que recorrer toda la cadena y nos ayudará a salir del bucle cuando encuentre el primer error
	
	/*Validación del nombre*/
	if(nom.length<3 || nom.length>15)
	{
		alerta+="-El nombre debe tener de 6 a 15 caracteres.\n"; 
		ok=false;
	}
	else
	{
		for(i=0;i<nom.length && fallo==false;i++)
		{
			if((nom.charAt(i)<'0' || nom.charAt(i)>'9') && (nom.charAt(i)<'a' || nom.charAt(i)>'z') && (nom.charAt(i)<'A' || nom.charAt(i)>'Z'))
			{
				fallo=true;
				alerta+="-El nombre contiene caracteres no válidos.\n"; 
				ok=false;
			}
		}
		fallo=false;//la variable vuelve a su valor original para comprobar futuros errores comprobados en un bucle		
	}
	/*Validacion del genero*/
	if(document.getElementById("maleGender").checked==false && document.getElementById("femaleGender").checked==false ) {
		alerta+="-Debes seleccionar un sexo.\n";
		ok=false;
	}
	
	/*Validacion de la pass*/
	if(pass.length < 6 || pass.length > 15)
	{
		alerta+="-La contraseña debe tener de 6 a 15 caracteres.\n";
		ok=false;
	}
	else
	{
		for(i=0;i<pass.length && fallo==false;i++)
		{
			if((pass.charAt(i)<'0' || pass.charAt(i)>'9') && (pass.charAt(i)<'a' || pass.charAt(i)>'z') && (pass.charAt(i)<'A' || pass.charAt(i)>'Z') && (pass.charAt(i)<'_' || pass.charAt(i)>'_') )
			{
				fallo=true;
				alerta+="-La contraseña contiene caracteres no válidos.\n"; 
				ok=false;
			}
		}
		fallo=false;
		
		//se comprueba si la pass contiene mayúsculas o no
		if(tieneMayus(pass)==0)//no tiene mayus
		{
			alerta+="-La contraseña debe contener al menos una mayúscula.\n";
		}
		
		if(tieneMinus(pass)==0)//no tiene mayus
		{
			alerta+="-La contraseña debe contener al menos una minúscula.\n";
		}
		
		if(tieneNum(pass)==0)//no tiene mayus
		{
			alerta+="-La contraseña debe contener al menos un número.\n";
		}
		
	}
	
	/*Comprobar que las pass son iguales*/
	if(pass!=repitepass)
	{
		alerta+="-Las contraseñas no coinciden.\n";
		ok=false;
	}
	if(validateEmail(mail)==false)
	{
		alerta+="-Email no valido.\n";
		ok=false;
	}
	if(checkFecha(fnac)==false){
		alerta+="-Fecha de nacimiento no valida.\n";
		ok=false;
	}
	if(ok==false)
	{
		alert(alerta);
	}
	return ok;
}

function checkFecha(fnac){
	entra=true;
	for(i=0;i<fnac.length && entra==true; i++)
	{
		if(fnac.charAt(i)!='/')
		{
			if(fnac.charAt(i)<'0' || fnac.charAt(i)>'9')
				entra=false;
		}
	}
	if(entra==true){
		comp=fnac.split("/");
		if(fnac.length>0 && comp.length==3){
			if(parseInt(comp[0])<1 || parseInt(comp[0])>31 || parseInt(comp[1])<1 || parseInt(comp[1])>12 || parseInt(comp[2])>2014 || parseInt(comp[2])<1914)
			{
				return false;
			}
			return true;
		}else
			return false;
	} else
		return false;
}
	
function validateEmail(mail) 
{
    var atpos = mail.indexOf("@");
    var dotpos = mail.lastIndexOf(".");
    if (atpos< 1 || (mail.length-1)-dotpos<2 || (mail.length-1)-dotpos>4) {
        return false;
    }
}
function tieneMayus(texto)
{
	var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
   	for(i=0; i<texto.length; i++)
	{
		if(letras_mayusculas.indexOf(texto.charAt(i),0)!=-1)
		{
        	return 1;
      	}
   	}
   	return 0;
}

function tieneMinus(texto)
{
	var letras_minusculas="abcdefghyjklmnñopqrstuvwxyz";
	
   	for(i=0; i<texto.length; i++)
	{
		if(letras_minusculas.indexOf(texto.charAt(i),0)!=-1)
		{
        	return 1;
      	}
   	}
   	return 0;
}

function tieneNum(texto)
{
	var numeros="0123456789";
	
   	for(i=0; i<texto.length; i++)
	{
		if(numeros.indexOf(texto.charAt(i),0)!=-1)
		{
        	return 1;
      	}
   	}
   	return 0;
}