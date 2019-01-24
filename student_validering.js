/* javascript validering */

var fortsett = document.getElementById("fortsett");
var melding = document.getElementById("melding");
var brukernavn = document.getElementById("brukernavn");
var fornavn = document.getElementById("fornavn");
var etternavn = document.getElementById("etternavn");
var klassekode = document.getElementById("klassekode");

fortsett.onclick = function(event){
    if (!brukernavn.value || !fornavn.value || !etternavn.value || !klassekode.value){
        event.preventDefault();
        melding.innerHTML="<h5 style='color:red;'>Alle feltene må fylles ut!</h5>";
    }
}
