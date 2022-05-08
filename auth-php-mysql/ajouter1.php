<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$nbeleves=$_REQUEST['nbeleves'];
$nom=$_REQUEST['nom'];
$emailgrp=$_REQUEST['emailgrp'];
$specialite=$_REQUEST['specialite'];


$classe=$_REQUEST['classe'];


include("connexion.php");
         $sel=$pdo->prepare("select nom from groupe where nom=? limit 1");
         $sel->execute(array($nom));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";// groupe existe déja
         else{
            $req="insert into groupe values ('$nbeleves','$nom','$emailgrp','$specialite')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>