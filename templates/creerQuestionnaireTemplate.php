<head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
 

</head>



<?php
    if(isset($questErrorText))
    echo '<span class="error" style="color:red">' . $questErrorText . '</span>';
?>
<form action="index.php?controller=questionnaire&action=validateQuestionnaire" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Création d'un Questionnaire</h4>
	<p class="text-center">En espérant que les étudiants aient une chance de s'en sortir..</p>
	<form>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-newspaper"></i> </span>
            </div>
            <input name="questTitre" class="form-control" placeholder="Titre" type="text">
        </div> 
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-info"></i> </span>
            </div>
            <textarea name="questDescription" class="form-control input-lg"  placeholder="Description" type="text"></textarea>
        </div> 
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-calendar"></i> </span>
            </div>
            <input placeholder="Date d'ouverture" type="text" onfocus="(this.type='date')"  id="date" name="questDateouv" class="form-control">
        </div> 
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-calendar-check"></i> </span>
            </div>
            <input placeholder="Date de fermeture" type="text" onfocus="(this.type='date')"  id="date" name="questDateferm" class="form-control">
        </div> 
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-key"></i> </span>
            </div>
            <select class="form-control" name="questModeacces" >
                <option selected="">Mode d'accès</option>
                <option value="lien unique">Lien unique</option>
                <option value="connecté">Connecté</option>
            </select>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question-circle"></i> </span>
            </div>
            <input name="questId" class="form-control" placeholder="ID questionnaire (unique)" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="questMail" class="form-control" placeholder="Votre adresse mail" type="email">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question-circle"></i> </span>
            </div>
            <input name="questNbquest" class="form-control" placeholder="Nombre de questions" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-reply"></i> </span>
            </div>
            <select class="form-control" name="questRetourarriere" >
                <option selected="">Possibilité de revenir en arrière</option>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
            </select>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
            </div>
            <input name="questTag" class="form-control" placeholder="Tag du questionnaire" type="text">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-unlock-alt"></i> </span>
            </div>
            <select class="form-control" name="questType">
                <option selected="">Type du questionnaire</option>
                <option value="public">Public</option>
                <option value="prive">Privé</option>
            </select>
        </div>
                                          
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Création du questionnaire </button>
        </div>     
    </form>
</article>
