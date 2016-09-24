function fechaBusqueda()
{
	var correcto=true;
	var msgError="Hay fallo(s):\n";
	var f1=document.getElementById("fechaInicial").value;
	var f2=document.getElementById("fechaFinal").value;
	if(f1==null || f2==null || validateDate(f1)==false || validateDate(f2)==false)
	{
		msgError+="-Fechas no validas.\n";
		correcto=false;
	}
	
	if(correcto==false){
		alert(msgError);
	}
	return correcto;
}

function validateDate(fnac)
{
	var expreg= /(?!10|28|29)[12][089][0-9][0-9]\-(?!1[3-9]|00)[01][0-9]\-(?!3[2-9]|00|02-3[01]|04-31|06-31|09-31|11-31)[0-3][0-9]/ /* only valid dates from 1800 to 2099. Año bisiesto no va */
	if(expreg.test(fnac))
		return true;
	else
		return false;
}