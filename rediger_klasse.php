<?php

include("top.html"); 

include ("db-connect.php"); //kobler til db
?>



    <h2>Rediger klasse</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1">
        
           <a style="color:black;">Klassekode:</a><select id="klassekode" name="klassekode">
        
        <?php
        
        $sqlSetning = "SELECT klassekode FROM klasse;";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
        
        while($rad=mySqli_fetch_array($sqlResultat)){
        
        echo("<option value='$rad[klassekode]'>$rad[klassekode]</option>");
            
        }
        
        ?>
        
        </select><br>
           <input type="submit" value="Fortsett" id="fortsett" name="fortsett" alt="fortsett">
           <input type="reset" value="Nullstill" id="nullstill" name="nullstill" alt="nullstill">
    
        
    </form>



    

<?php 

if (isset($_POST["fortsett"])){
    
    $valgtKlasse = $_POST["klassekode"];
    
    $finnKlassenavn = "SELECT klassenavn FROM klasse WHERE klassekode='$valgtKlasse';";
    $sqlKlassenavn = mysqli_query($db, $finnKlassenavn) or die ("<b>Error:</b> Ikke mulig å koble til database");
    
    $klassenavn = mySqli_fetch_array($sqlKlassenavn);
    
    echo("
    <br>
    <form method='post' action='' id='endreKlasse' name='endreKlasse'>
    Klassekode: <input type='text' id='endreKlassekode' name='endreKlassekode' value='$valgtKlasse' readonly required><br>
    Klassenavn: <input type='text' id='endreKlassenavn' name='endreKlassenavn' value='$klassenavn[klassenavn]'><br>
    <input type='submit' value='Endre' id='endre' name='endre' alt='endre'>
    <input type='reset' value='Nullstill' id='nullstill' name='nullstill' alt='nullstill'>
    </form>
    
    <div id='melding'></div>
    
    <script src='endreKlasseVal.js'></script>
    ");
    
    }

    if (isset($_POST["endre"])){

    $klassekode=$_POST["endreKlassekode"];
    $klassenavn=$_POST["endreKlassenavn"];

    if (!$klassekode or !$klassenavn){
    echo("Begge feltene må fylles ut!");}

    else{   
        
    $klassekode = $_POST["endreKlassekode"];
    $nyttKlassenavn = $_POST["endreKlassenavn"];
        
    $sqlUpdate = "UPDATE klasse SET klassenavn='$nyttKlassenavn' WHERE klassekode='$klassekode';";
    mysqli_query($db, $sqlUpdate) or die ("<b>Error:</b> Ikke mulig å endre klassenavn");
    
    echo("Klassenavn endret til $nyttKlassenavn");
        
    }}
    


include("bot.html"); ?>