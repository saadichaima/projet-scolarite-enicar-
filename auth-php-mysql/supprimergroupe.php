<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimerGroupe</title>
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
</head>


<style>
    body {
  margin: 0;
  background-color: #f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  background-color: #333;
  position: fixed;
  top: -50px;
  width: 100%;
  display: block;
  transition: top 0.3s;
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 15px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}
</style>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"><img class ="new_logo"src="../assets/enicar.jpg" alt=""width =" 80px" height =" 40px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficheretudiantsparclasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="#">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifiergroupe.php">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimergroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercheretudiant.php">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifieretudiant.php">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimeretudiant.php">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="Absence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.html">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
          </form>
        </div>
      </nav>

      <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Supprimer un groupe</h1>
              <p>Remplir le formulaire ci-dessous afin de supprimer un groupe</p>
            </div>
          </div>
          <div class="container">
         
   
    <form method="POST"  action="supprimergroupe.php">
      
    <label for="classe">Nom du groupe à supprimer :  </label> <br>
    <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
     <br>
    <input type="submit"  class="btn btn-primary btn-block" name="confirmation"></button>
    </form>
    <div class="container"> </div>
          </div>
    
</body>
<?php 
include "connexion2.php";

if (isset($_POST["confirmation"]))
{
    $nom=$_POST['classe'];
    $req2="SELECT * from etudiant where classe='$nom'";
    $req3="SELECT * from groupe where nom='$nom'";
    $res1=mysqli_query($conn,$req2);
    $res3=mysqli_query($conn,$req3);
    if (mysqli_num_rows($res1)==0){
        echo " groupe not found";
    }
    else{
        $req="DELETE from etudiant where classe='$nom'";
   
        $resultat=mysqli_query($conn,$req);
        if ($resultat){
            echo "<font color='green'> suppression du groupe reussite";
        }
        else{
            echo " <font color='red'> un erreur est survenu";
        }
    }

    if (mysqli_num_rows($res3)==0){
      echo " groupe not found";
  }
  else{
      $req1="DELETE from groupe where nom='$nom'";
 
      $resultat1=mysqli_query($conn,$req1);
      if ($resultat1){
          echo "<font color='green'> suppression du groupe reussite";
      }
      else{
          echo " <font color='red'> un erreur est survenu";
      }
  }
   
    
}

?>
</html>