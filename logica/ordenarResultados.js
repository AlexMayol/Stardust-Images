function ordenar(desc)
{
	var padre= document.getElementById("resultadobusqueda");
	var contenedor1= new Array();
	var contenedor2=new Array();
	var aux;
	var n=document.getElementById("criterio").selectedIndex+1;
	
	

	
	
	contenedor1= padre.getElementsByTagName("ul");
	
	for(i=0;i<contenedor1.length;i++)
	{
		contenedor2[i]=contenedor1[i].getElementsByTagName("li")[n].innerHTML;
	}
	
	
	if(desc==false)
	{
		if(n!=2)
		{
			contenedor2.sort();
		}
		else
		{
			for(i=0;i<contenedor2.length;i++)
			{
				for(j=0;j<contenedor2.length;j++)
				{
					if(i!=j)
					{
						if(comparafechas(contenedor2[i],contenedor2[j])==-1)
						{
							aux=contenedor2[j];
							contenedor2[j]=contenedor2[i];
							contenedor2[i]=aux;
						}
					}
				}
			}
		}
	}
	else
	{
		if(n!=2)
		{
			contenedor2.reverse();
		}
		else
		{
			for(i=0;i<contenedor2.length;i++)
			{
				for(j=0;j<contenedor2.length;j++)
				{
					if(i!=j)
					{
						if(comparafechas(contenedor2[i],contenedor2[j])==1)
						{
							aux=contenedor2[i];
							contenedor2[i]=contenedor2[j];
							contenedor2[j]=aux;
						}
					}
				}
			}
		}		
	}
	
	for(i=0;i<contenedor2.length;i++)
	{
		for(j=0;j<contenedor1.length;j++)
		{
			aux=contenedor1[j].getElementsByTagName("li")[n].innerHTML;
			var aux2= contenedor2[i];
			if(aux2.localeCompare(aux)==0)
			{
				padre.insertBefore(contenedor1[j],contenedor1[i]);
			}
		}
	}
	
	return true;
	
}

function comparafechas(d1,d2)
{
	var f1=d1.split("/");
	var f2=d2.split("/");
	
	if(f1[2]>f2[2])
	{
		return 1;
	}
	else if(f1[2]<f2[2])
	{
		return -1;
	}
	else//año igual
	{
		if(f1[1]>f2[1])
		{
			return 1;
		}
		else if(f1[1]<f2[1])
		{
			return -1;
		}
		else //mes igual
		{
			if(f1[0]>f2[0])
			{
				return 1;
			}
			else if(f1[0]<f2[0])
			{
				return -1;
			}
		}
	}
	
}