/**************** Botonera ******************/
function Act(){
	document.envio_form.bus.disabled=true;
	document.envio_form.inc.disabled=true;
	document.envio_form.mod.disabled=true;
	document.envio_form.grab.disabled=false;
	document.envio_form.cancel.disabled=false;

	document.envio_form.inc.style.background = "#ccc";
	document.envio_form.inc.style.color = "#666666";
	document.envio_form.bus.style.background = "#ccc";
	document.envio_form.bus.style.color = "#666666";
	document.envio_form.mod.style.background = "#ccc";
	document.envio_form.mod.style.color = "#666666";
	document.envio_form.sta.style.background = "#ccc";
	document.envio_form.sta.style.color = "#666666";
	document.envio_form.grab.style.background = "#023859";
	document.envio_form.grab.style.color = "#fff";
	document.envio_form.cancel.style.background = "#023859";
	document.envio_form.cancel.style.color = "#fff";
}
function Can(){
	document.envio_form.inc.disabled=false;
	document.envio_form.bus.disabled=false;
	document.envio_form.grab.disabled=true;
	document.envio_form.cancel.disabled=true;
	document.envio_form.mod.disabled=true;
}
	
function Mod(){
	document.envio_form.modificar.value = "si"; //habilito el grabar para el modificar
	document.envio_form.inc.disabled=true;
	document.envio_form.bus.disabled=true;
	document.envio_form.mod.disabled=true;
	document.envio_form.cancel.disabled=false;
	document.envio_form.grab.disabled=false;
	document.envio_form.sta.disabled=true;

	document.envio_form.inc.style.background = "#ccc";
	document.envio_form.inc.style.color = "#666666";
	document.envio_form.bus.style.background = "#ccc";
	document.envio_form.bus.style.color = "#666666";
	document.envio_form.mod.style.background = "#ccc";
	document.envio_form.mod.style.color = "#666666";
	document.envio_form.sta.style.background = "#ccc";
	document.envio_form.sta.style.color = "#666666";
	document.envio_form.grab.style.background = "#023859";
	document.envio_form.grab.style.color = "#fff";
	document.envio_form.cancel.style.background = "#023859";
	document.envio_form.cancel.style.color = "#fff";
}

function Encontrado_si(){
	document.envio_form.inc.disabled=true;
	document.envio_form.bus.disabled=true;
	document.envio_form.mod.disabled=false;
	document.envio_form.cancel.disabled=false;
	document.envio_form.sta.disabled=false;

	document.envio_form.inc.style.background = "#ccc";
	document.envio_form.inc.style.color = "#666666";
	document.envio_form.bus.style.background = "#ccc";
	document.envio_form.bus.style.color = "#666666";
	document.envio_form.mod.style.background = "#023859";
	document.envio_form.mod.style.color = "#fff";
	document.envio_form.sta.style.background = "#023859";
	document.envio_form.sta.style.color = "#fff";
	document.envio_form.grab.style.background = "#ccc";
	document.envio_form.grab.style.color = "#666666";
	document.envio_form.cancel.style.background = "#023859";
	document.envio_form.cancel.style.color = "#fff";
}
function consultar(){
	document.envio_form.inc.disabled=true;
	document.envio_form.bus.disabled=false;
	document.envio_form.mod.disabled=true;
	document.envio_form.cancel.disabled=false;
	document.envio_form.sta.disabled=true;

	document.envio_form.inc.style.background = "#ccc";
	document.envio_form.inc.style.color = "#666666";
	document.envio_form.bus.style.background = "#023859";
	document.envio_form.bus.style.color = "#fff";
	document.envio_form.mod.style.background = "#ccc";
	document.envio_form.mod.style.color = "#666666";
	document.envio_form.sta.style.background = "#ccc";
	document.envio_form.sta.style.color = "#666666";
	document.envio_form.grab.style.background = "#ccc";
	document.envio_form.grab.style.color = "#666666";
	document.envio_form.cancel.style.background = "#023859";
	document.envio_form.cancel.style.color = "#fff";
}

function Inicio_Deafault(){
	document.envio_form.inc.disabled=false;
	document.envio_form.bus.disabled=false;
	document.envio_form.mod.disabled=true;
	document.envio_form.cancel.disabled=true;
	document.envio_form.sta.disabled=true;

	document.envio_form.inc.style.background = "#023859";
	document.envio_form.inc.style.color = "#fff";
	document.envio_form.bus.style.background = "#023859";
	document.envio_form.bus.style.color = "#fff";

	document.envio_form.mod.style.background = "#ccc";
	document.envio_form.mod.style.color = "#666666";
	document.envio_form.sta.style.background = "#ccc";
	document.envio_form.sta.style.color = "#666666";
	document.envio_form.grab.style.background = "#ccc";
	document.envio_form.grab.style.color = "#666666";
	document.envio_form.cancel.style.background = "#ccc";
	document.envio_form.cancel.style.color = "#666666";
	document.envio_form.cancel.style.background = "#ccc";
}