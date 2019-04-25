<html>
        <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <title>Menu</title>
    </head>


<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a style="color:white;" class="navbar-brand" href="#"><?php echo($_SESSION['userId'])?></a>
    </li>
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="index.php?controller=user&action=defaultAction">ACCUEIL</a>
    </li>
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="index.php?controller=questionnaire&action=listeQuestionnaires">MES QUESTIONNAIRES</a>
    </li>
    <li class="nav-item">
      <a style="color:white;" class="nav-link" href="index.php?controller=user&action=profil">PROFIL</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li><a href="index.php?controller=user&action=deconnexion"  style="color:white;"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter</a></li>
  </ul>
</nav>