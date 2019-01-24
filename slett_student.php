<?php

include("top.html"); 

include ("db-connect.php"); //kobler til db 

?>

<script src="funksjon.js"></script>


    <h2>Slett student</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1" onSubmit="return bekreft()">
        
           <a style="color:black;">Student:</a><select id="brukernavn" name="brukernavn">
        
        <?php
        
        $sqlSetning = "SELECT brukernavn FROM student;";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
        
        while($rad=mySqli_fetch_array($sqlResultat)){
        
        echo("<option value='$rad[brukernavn]'>$rad[brukernavn]</option>");
            
        }
        
        ?>
        
        </select><br>
           <input type="submit" value="Slett" id="fortsett" name="fortsett" alt="fortsett">
           <input type="reset" value="Nullstill" id="nullstill" name="nullstill" alt="nullstill">
    
        
    </form>

    

<?php 

if (isset($_POST["fortsett"])){
    
    $valgtBrukernavn = $_POST["brukernavn"];
    
    $slettFraDB = "DELETE FROM student WHERE brukernavn='$valgtBrukernavn';";
    mysqli_query($db, $slettFraDB) or die ("<b>Error:</b> Kan ikke slette.");
    
    echo("$valgtBrukernavn ble slettet");
    }
      

include("bot.html"); ?>