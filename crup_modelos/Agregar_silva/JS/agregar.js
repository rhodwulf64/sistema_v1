//contador de campos agragado
var A=0;
function agregar(){
	var tem1 = document.getElementById("tem1").value;
	var tem2 = document.getElementById("tem2").value;
	var contenedor=document.getElementById("agregar");
	var newElement=document.createElement('div');
	var campos="<input type='text' name='newCamp0-"+A+"' value="+tem1+" ><input type='text' value="+tem2+" name='newCamp1-"+A+"'>";
	var botones="<input type='button' value='eliminar' onclick='eliminar(this)'><input type='button' value='modificar'>";
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