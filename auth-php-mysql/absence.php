<?php
include('connexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY --> 
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
 <!--les style.css-->
 <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="login.php">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifier_etudf.php">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="absence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
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
        <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
        <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
      </div>
    </div>

    <div class="container">
      <?php
        if (isset($_POST['ajouter'])) {
          $dateAbs = trim($_POST['deb']);
          $classe = trim($_POST['classe']);
          $module = trim($_POST['module']);
          $type = trim($_POST['type']);
          $nom= trim($_POST['nom']);
          $sql = "INSERT INTO absence (nomEtd, classe, module, dateAbs, typeAbs) values (:nomEtd, :classe, :module, :dateAbs, :typeAbs)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([
            ':dateAbs' => $dateAbs,
            ':classe' => $classe,
            ':module' => $module,
            ':typeAbs' => $type,
            ':nomEtd' => $nom,
          ]);
          $erreur = "Ajout effectué";
        }
      
      ?> 
      <div class="container">
        <form action="absence.php" method="POST" id="myForm">
          <div class="form-group">
            <label for="deb">Entrer la date d'absence:</label><br>
            <div class="container">
          <form method="POST"  action="absence.php">
          <input type="date" id="date" name="date"  class="form-control" required/></div>
          <div class="form-group">
          <label for="module">Entrer le module:</label><br>
          <div class="container">
          <form method="POST"  action="absence.php">
            <input type="text" id="module" name="module" class="form-control" required /></div>
   
         
           
            <label for="classe">Entrer la Classe:</label>
            <div class="container">
          <form method="POST"  action="absence.php">
            <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C"></div>
   
<label for="type">Entrer le type d'absence:</label><br>
<div class="container">
          <form method="POST"  action="absence.php">
          <input type="text" id="justification" name="justification"  class="form-control" required/></div>
              
            </select>
            <label for="nom">Entrer le nom de  l'étudiant:</label><br>
            <div class="container">
          <form method="POST"  action="absence.php">
          <input type="text" id="nom" name="nom"  class="form-control" required/></div>
            <!--<select id="nom" name="nom" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="Nom de l'étudiant">-->
            
            </select>


           <!-- <label for="type">Selectionner le type d'absence:</label><br>
            
           
    <select id="type" name="type"  class="custom-select custom-select-sm custom-select-lg">
               <option type="submit" id="justifiée"  value="Justifiée">Justifiée</option>
               <option type="submit" id="nonjustifiée" value="NoNJustifiée">Non Justifiée</option>
               
              </select>-->
          </div>
          <!--<button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Valider</button>-->
          <input type="submit" id="confirmation"  class="btn btn-primary btn-block" name="confirmation"></button>
          <?php 
                include "connexion2.php";
                  if(isset($_POST["confirmation"]))
                  {
                    
                    @$typeAbs1=$_POST['justification'];
                    @$nom1=$_POST['nom'];
                    @$date1=$_POST['date'];
                    @$module1=$_POST['module'];
                    @$classe1=$_POST['classe'];
                    $req="INSERT INTO `gererabsence`(`dateAbs`, `classe`, `module`, `typeAbs`, `nomEtd`) VALUES ('$date1','$classe1','$module1','$typeAbs1','$nom1')";
                    $resultat=mysqli_query($conn,$req);
                      
                  }





               
               ?>
        </form>
      </div>
    </div>
  </main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>