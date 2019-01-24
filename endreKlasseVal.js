/* javascript validering */

var fortsett = document.getElementById("endre");
var melding = document.getElementById("melding");
var klassekode = document.getElementById("endreKlassekode");
var klassenavn = document.getElementById("endreKlassenavn");

fortsett.onclick = function(event){
    if (!klassekode.value || !klassenavn.value){
        //event.preventDefault();
        melding.innerHTML="<h5 style='color:red;'>Alle feltene må fylles ut!</h5>";
        return false;
    }
    return true;
}
