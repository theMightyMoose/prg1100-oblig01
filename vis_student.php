<?php

include("top.html");

?> <h2>Vis alle studenter</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1">
        
        
        
    </form>

<?php

include ("db-connect.php"); //kobler til db
    
$sqlSetning = "SELECT * FROM student ORDER BY brukernavn";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
$antallRader = mysqli_num_rows($sqlResultat);

echo("<table>");
    
    echo("<tr><td><b>brukernavn</b></td><td></td><td><b>fornavn</b></td><td></td><td><b>etternavn</b></td><td></td><td><b>klassekode</b></td></tr>");
    
while($rad=mySqli_fetch_array($sqlResultat)){
    
    echo("<tr><td> $rad[brukernavn]</td><td></td> <td> $rad[fornavn]</td><td></td> <td> $rad[etternavn]</td><td></td> <td> $rad[klassekode]</td></tr>");
    
}
    


echo("</table>");

include("bot.html");
    
?>