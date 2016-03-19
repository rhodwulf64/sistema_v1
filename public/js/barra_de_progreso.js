var maxprogress = 100;
var actualprogress = -1;
var itv = 0;
function prog()
{
  if(actualprogress >= maxprogress) 
  {
    clearInterval(itv);       
    return;
  }    
  var progressnum = document.getElementById("progressnum");
  var indicador = document.getElementById("indicador");
  actualprogress += 1;    
  indicador.style.width=actualprogress + "px";
  progressnum.innerHTML = (actualprogress++) + "%";
}