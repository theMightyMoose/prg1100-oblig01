/* javascript validering */

var fortsett = document.getElementById("endre");
var melding = document.getElementById("melding");
var brukernavn = document.getElementById("endreBrukernavn");
var fornavn = document.getElementById("endreFornavn");
var etternavn = document.getElementById("endreEtternavn");
var klassekode = document.getElementById("endreKlassekode");

fortsett.onclick = function(event){
    if (!brukernavn.value || !fornavn.value || !etternavn.value || !klassekode.value){
        //event.preventDefault();
        melding.innerHTML="<h5 style='color:red;'>Alle feltene må fylles ut!</h5>";
        return false;
    }
    return true;
}