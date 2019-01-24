<?php

include("top.html"); 

?>

    <h2>Søk</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1" onSubmit="return bekreft()">
        
           <a style="color:black;">Søk:</a><input type="text" id="sook" name="sook"><br>
           <input type="submit" value="Søk" id="fortsett" name="fortsett" alt="fortsett">
           <input type="reset" value="Nullstill" id="nullstill" name="nullstill" alt="nullstill">
    
        
    </form>

    

<?php 

if (isset($_POST["fortsett"])){
    
    include ("db-connect.php"); //kobler til db 
    
    $sook = $_POST["sook"];
    
    $sqlSetning = "SELECT * FROM klasse WHERE klassekode OR klassenavn LIKE '%$sook%';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
    
    echo("<table>");
    
    echo("<tr><td><b>klassekode</b></td><td></td><td><b>klassenavn</b></td></tr>");
    
    while($rad=mySqli_fetch_array($sqlResultat)){
        
        echo("<tr><td> $rad[klassekode]</td><td></td> <td> $rad[klassenavn]</td></tr><br>");}
    
    echo("</table>");
    
    
    $sqlSetning2 = "SELECT * FROM student WHERE brukernavn LIKE '%$sook%' OR fornavn LIKE '%$sook%' OR etternavn LIKE '%$sook%' OR klassekode LIKE '%$sook%';";
    $sqlResultat2 = mysqli_query($db, $sqlSetning2) or die ("<b>Error:</b> Ikke mulig å koble til database");
    
    echo("<table>");
    
    echo("<tr><td><b>brukernavn</b></td><td></td><td><b>fornavn</b></td><td></td><td><b>etternavn</b></td><td></td><td><b>klassekode</b></td></tr>");
    
while($rad2=mySqli_fetch_array($sqlResultat2)){
    
    echo("<tr><td> $rad2[brukernavn]</td><td></td> <td> $rad2[fornavn]</td><td></td> <td> $rad2[etternavn]</td><td></td> <td> $rad2[klassekode]</td></tr>");
    
}
    echo("</table>");
    
}

include("bot.html"); ?>