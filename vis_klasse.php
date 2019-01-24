<?php

include("top.html"); ?>


    <h2>Vis alle klassser</h2>
    
    <form method="post" action="" id="innlev1" name="innlev1">
        
           
    
        
    </form>

<?php

include ("db-connect.php"); //kobler til db
    
$sqlSetning = "SELECT * FROM klasse ORDER BY klassekode";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("<b>Error:</b> Ikke mulig å koble til database");
$antallRader = mysqli_num_rows($sqlResultat);

echo("<table>");
    
    echo("<tr><td><b>klassekode</b></td><td></td><td><b>klassenavn</b></td></tr>");
    
while($rad=mySqli_fetch_array($sqlResultat)){
    
    echo("<tr><td> $rad[klassekode]</td><td></td> <td> $rad[klassenavn]</td></tr>");
    
}
    


echo("</table>");

include("bot.html");
    
?>