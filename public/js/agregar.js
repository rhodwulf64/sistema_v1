//contador de campos agragado
var A=0;
function agregar(){
	var saber = Array();
	var cont = 0;
	var contenedor=document.getElementById("agregar");
	var newElement=document.createElement('div');
	var capture1 = document.envio_form.car.value;
	var capture2 = document.envio_form.dep.value;

	if(capture1=="1"){
		capture1="jefe";
	}else if(capture1=="2"){
		capture1="administrador";
	}else if(capture1=="3"){
		capture1="coordinador";
	}
	if(capture2=="1"){
		capture2="operaciones";
	}else if(capture2=="2"){
		capture2="asuntos administrativos";
	}else if(capture2=="3"){
		capture2="droga";
	}

	var campos="<input type='text' value="+capture1+" name='newCamp0-"+A+"' size='18' readonly='readonly'><input type='text' size='18' value="+capture2+" readonly='readonly' name='newCamp1-"+A+"'>";
	var botones="<input type='button' value='X' onclick='eliminar(this)'>";
	newElement.innerHTML=campos+botones;
	newElement.id="Registro"+A;	
	contenedor.appendChild(newElement);
	A++;
}

function eliminar(oldElement){
	var divContenedor=oldElement.parentNode;
	divContenedor.parentNode.removeChild(divContenedor);
	gestionDeRegistros();
	A--;
}

function gestionDeRegistros(){
	var Registro;
	var Campo;
	for(var x=0;x<A;x++){
		if(!document.getElementById("Registro"+x)){
			if(document.getElementById("Registro"+parseInt(x+1))){
				Registro=document.getElementById("Registro"+parseInt(x+1));
				Registro.id="Registro"+x;
				Campo=Registro.firstChild;
				for(var y=0;y<Registro.childNodes.length-2;y++){
					if(y!=0){
						Campo=Campo.nextSibling;
					}
					Campo.name="newCamp"+y+"-"+x;
					Campo.id="newCamp"+y+"-"+x;
				}
			}
		}
	}
}