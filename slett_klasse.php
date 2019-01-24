<?php

include("top.html"); 

include ("db-connect.php"); //kobler til db 

?>

<script src="funksjon.js"></script>


    <h2>Slett klasse</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1" onSubmit="return bekreft()">
        
           <a style="color:black;">Klassekode:</a><select id="klassekode" name="klassekode">
        
        <?php
        
        $sqlSetning = "SELECT klassekode FROM klasse;";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
        
        while($rad=mySqli_fetch_array($sqlResultat)){
        
        echo("<option value='$rad[klassekode]'>$rad[klassekode]</option>");
            
        }
        
        ?>
        
        </select><br>
           <input type="submit" value="Slett" id="fortsett" name="fortsett" alt="fortsett">
           <input type="reset" value="Nullstill" id="nullstill" name="nullstill" alt="nullstill">
    
        
    </form>

    

<?php 

if (isset($_POST["fortsett"])){
    
    $valgtKlassekode = $_POST["klassekode"];
    
    $slettFraDB = "DELETE FROM klasse WHERE klassekode='$valgtKlassekode';";
    mysqli_query($db, $slettFraDB) or die ("<b>Error:</b> Klasse inneholder fortsatt studenter. Kan ikke slette.");
    
    echo("$valgtKlassekode ble slettet");
    }
      

include("bot.html"); ?>