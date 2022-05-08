<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifierEtudiant</title>
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
                <a class="dropdown-item" href="ajoutergroupe.php">Ajouter Groupe</a>
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
                <a class="dropdown-item" href="absence.php">Saisir Absence</a>
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
<main role="main">
<div class="jumbotron">
            <div class="container">
            <h1 class="display-4">Modifier un étudiant</h1>
              <p>Entrer le cin de l'étudiant pour modifier ses données!</p>
            </div>
          </div>
          <div class="container">
         
          <form method="POST"  action="modifieretudiant.php">
          <label for="cin">CIN :  </label> <br>
          <input type="text" id="cin" name="cin"  class="form-control" />
          <label for="nom">CIN :  </label> <br>
    
    <input type="text" id="nom" name="nom" class="form-control"required>
    <label for="prenom">Prénom :  </label> <br>
    <input type="text" id="prenom" name="prenom" class="form-control" required>
    <label for="classe">Nouvelle classe :  </label> <br>
    <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
     <label for="adresse">Nouvelle adresse :  </label> <br>
    <input type="text" id="adresse" name="adresse" class="form-control" required>
    <label for="email">Nouveau email :  </label> <br>
    <input type="text" id="email" name="email" class="form-control" required><br>
    <input type="submit" id="confirmation"  class="btn btn-primary btn-block" name="confirmation"></button>
    </form>
    <!--<form class="form-inline my-2 my-lg-0">
      <button id ="modifier" class="btn btn-outline-success my-2 my-sm-0" type="submit" name="modifier">Modifier</button>
      
    </form>-->
   
    
          </div>
    
          </body>
<?php  
include "connexion2.php";
if(isset($_POST["confirmation"]))
{
  
  @$cinam=$_POST['cin'];
  @$nom1=$_POST['nom'];
  @$prenom1=$_POST['prenom'];
  @$adresse1=$_POST['adresse'];
  @$classe1=$_POST['classe'];
  $req="UPDATE  `etudiant` SET nom='$nom1',prenom='$prenom1',adresse='$adresse1',classe='$classe1' WHERE cin ='$cinam'";
  $resultat=mysqli_query($conn,$req);
    if ($resultat){
        echo "<font color='green'> modification effectuee";
    }
    else{
        echo " <font color='red'>une erreur est survenue";
    }
}

  ?>
  
  </html>