<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
$req="SELECT * FROM groupe";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["groupes"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $groupe = array();
        $groupe["nbeleves"] = $row["nbeleves"];
        $groupe["nom"] = $row["nom"];
        $groupe["specialite"] = $row["specialite"];
        
        $groupe["emailgrp"] = $row["emailgrp"];
       
         array_push($outputs["groupes"], $groupe);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas de groupes";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>