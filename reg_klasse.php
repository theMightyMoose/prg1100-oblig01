<?php

include("top.html"); ?>

<h2>Registering av klasser</h2>

<script src="klasse_valid.js"></script>
    
    <form method="post" action="" id="innlev1" name="innlev1">
        
           <a style="color:black;">Klassekode:</a><input type="text" id="klassekode" name="klassekode" required><br>
           <a style="color:black;">Klassenavn:</a><input type="text" id="klassenavn" name="klassenavn" required><br>
           <input type="submit" value="Fortsett" id="fortsett" name="fortsett" alt="fortsett">
           <input type="reset" value="Nullstill" id="nullstill" name="nullstill" alt="nullstill">
        
    </form>

<div id="melding"></div>

    <script src="klasse_validering.js"></script>



<?php

if (isset($_POST["fortsett"])){
    
$lovligKlassekode = true;

$klassekode=$_POST["klassekode"];
$klassenavn=$_POST["klassenavn"];
    
$klassekode=strtoupper($klassekode);

if (!$klassekode or !$klassenavn){
    echo("Begge feltene må fylles ut!");}
    
if(strlen($klassekode) <3){
    $lovligKlassekode=false;
    echo("Klassekode må bestå av minst 3 tegn!<br>");
}

if(strlen($klassekode) >15){
    $lovligKlassekode=false;
    echo("Klassekode kan kun bestå av maks 15 tegn!<br>");
}
    
for($i=0; $i< strlen($klassekode) -1; $i++){
    if(is_numeric(substr($klassekode,$i,1))){
        $lovligKlassekode=false;
        echo("Klassekode kan kun ha tall som siste tegn!<br>");
        break;
    }
}
    
if(!is_numeric(substr($klassekode,-1))){
    $lovligKlassekode=false;
    echo("Klassekode må slutte med et tall!<br>");
}
    
if($lovligKlassekode){   
    
    include ("db-connect.php"); //kobler til db
    
    $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
    $antallRader = mysqli_num_rows($sqlResultat);
    
    if ($antallRader!=0){ //sjekk om faget er registert fra før
        echo("Faget er allerede registrert");
    }
    
    else {
        $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn) VALUES ('$klassekode','$klassenavn');";
        mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> ikke mulig å registere data i databasen");
        
        echo("$klassenavn, $klassekode er registert");
    }
}
}

include("bot.html");
        
?>