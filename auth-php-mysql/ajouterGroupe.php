<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
  else {
    @$nom=$_REQUEST['Nom'];
    @$nbeleves=$_REQUEST['Nbeleves'];
    @$specialite=$_REQUEST['Specialite'];
    @$emailgrp=$_REQUEST['emailgrp'];
    $erreur="";
   @$valider=$_POST["valider"];
  if(isset($valider))
  {
   
        include("connexion.php");
           $sel=$pdo->prepare("select Nom from groupe where Nom=? limit 1");
           $sel->execute(array($nom));
           $tab=$sel->fetchAll();
           if(count($tab)>0)
              $erreur="groupe existe deja";// groupe existe déja
           else{
              $req="insert into groupe (Nbeleves,Specialite,emailgrp,Nom) values ('$nbeleves','$specialite','$emailgrp','$nom')";
              $reponse = $pdo->exec($req) or die("error");
              ;
           }  
           echo $erreur;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter Groupe</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap core JS-JQUERY -->
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="index.php">SCO-Enicar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="index.html"
              id="dropdown01"
              data-toggle="dropdown"
              aria-expanded="false"
              >Gestion des Groupes</a
            >
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="AfficherEtudiants.php"
                >Lister tous les étudiants</a
              >
              <a class="dropdown-item" href="afficherEtudiantsParClasse.php"
                >Etudiants par Groupe</a
              >
              <a class="dropdown-item" href="ajouterGroupe.php"
                >Ajouter Groupe</a
              >
              <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
              <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdown01"
              data-toggle="dropdown"
              aria-expanded="false"
              >Gestion des Etudiants</a
            >
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="AjouterEtudiant.php"
                >Ajouter Etudiant</a
              >
              <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
              <a class="dropdown-item" href="modifierEtudiant.php">Modifier Etudiant</a>
              <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdown01"
              data-toggle="dropdown"
              aria-expanded="false"
              >Gestion des Absences</a
            >
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="Absence.php"
                >Saisir Absence</a
              >
              <a class="dropdown-item" href="etatAbsence.php"
                >État des absences pour un groupe</a
              >
            </div>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="login.html"
              >Se Déconnecter <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="text"
            placeholder="Saisir un groupe"
            aria-label="Chercher un groupe"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Chercher Groupe
          </button>
        </form>
      </div>
    </nav>

    <main role="main">
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-4">Ajouter un groupe</h1>
          <p>Remplir le formulaire ci-dessous afin d'ajouter un groupe!</p>
        </div>
      </div>

      <div class="container">
        <form id="myform" method="POST" >
          <!--
                            TODO: Add form inputs
                            Prenom - required string with autofocus
                            Nom - required string
                            Email - required email address
                            CIN - 8 chiffres
                            Password - required password string, au moins 8 letters et chiffres
                            ConfirmPassword
                            Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                            Adresse - required string
                        -->
          <!--Nom-->
          <div class="form-group">
            <label for="nom">Nom du groupe :</label><br />
            <input
              type="text"
              id="Nom"
              name="Nom"
              class="form-control"
              required
              autofocus
            />
          </div>

          <!--num d'eleves-->
          <div class="form-group">
            <label for="number">Nombre d'élèves:</label><br />
            <input
              type="number"
              id="Nbre_eleves"
              name="Nbre_eleves"
              class="form-control"
              required
            />
          </div>
           <!--emaik de groupe-->
          <div class="form-group">
            <label for="email">Email de groupe:</label><br />
            <input
              type="email"
              id="emailgrp"
              name="emailgrp"
              class="form-control"
              required
            />
          </div>

          <div class="container">
            
              <div class="form-group">
                <label for="classe">Choisir la spécialié:</label><br />
                <!--
    <input list="classe">
    <datalist id="classe" name="classe">
        <option value="1-INFOA">1-INFOA</option>
        <option value="1-INFOB">1-INFOB</option>
        <option value="1-INFOC">1-INFOC</option>
        <option value="1-INFOD">1-INFOD</option>
        <option value="1-INFOE">1-INFOE</option>
    </datalist>
    -->
                <select
                  id="Specialité"
                  name="Specialité"
                  class="custom-select custom-select-sm custom-select-lg"
                >
                  <option value="Informatique">Informatique</option>
                  <option value="Génie industriel">Génie industriel</option>
                  <option value="Infotronique">Infotronique</option>
                  <option value="Mécatronique">Mécatronique</option>
                </select>
              </div>
            
          </div>

          <!--Bouton Ajouter-->
          <button type="submit" class="btn btn-primary btn-block" name="valider" >
            Ajouter
          </button>
        </form>
      </div>
    </main>

    <footer class="container">
      <p>&copy; ENICAR 2021-2022</p>
    </footer>
  </body>
</html>