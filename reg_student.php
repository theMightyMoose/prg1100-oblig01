<?php

include("top.html"); 

include ("db-connect.php"); //kobler til db

?>


    <h2>Registering av student</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1">
        
           <a style="color:black;">Brukernavn:</a><input type="text" id="brukernavn" name="brukernavn" required><br>
           <a style="color:black;">Fornavn:</a><input type="text" id="fornavn" name="fornavn" required><br>
           <a style="color:black;">Etternavn:</a><input type="text" id="etternavn" name="etternavn" required><br>
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

    <div id="melding"></div>

    <script src="student_validering.js"></script>
    
<?php

if (isset($_POST["fortsett"])){

$brukernavn=$_POST["brukernavn"];
$fornavn=$_POST["fornavn"];
$etternavn=$_POST["etternavn"];
$klassekode=$_POST["klassekode"];

if (!$brukernavn or !$fornavn or !$etternavn or !$klassekode){
    echo("Alle feltene må fylles ut!");}

else{   
    
    $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
    $antallRader = mysqli_num_rows($sqlResultat);
    
    if ($antallRader!=0){ //sjekk om faget er registert fra før
        echo("Student er allerede registrert");
    }
    
    else {
        $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
        mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> ikke mulig å registere data i databasen");
        
        echo("$brukernavn, $fornavn, $etternavn, $klassekode er registert");
    }
}
}
include("bot.html");
        
?>