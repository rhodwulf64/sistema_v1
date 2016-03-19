function seleccion(){
	var valor = document.getElementById("checked").checked;
	if(valor){
		//alert("el valor a sido destildado");
		document.getElementById("checked").checked = false;
	}else{
		document.getElementById("checked").checked = true;
		//alert("el valor a sido tildado");
	}
}