<head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
 

</head>



<?php
    if(isset($questionErrorText))
    echo '<span class="error" style="color:red">' . $questionErrorText . '</span>';
?>
<form action="index.php?controller=question&action=validateQuestion" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Création d'une Question</h4>
	<p class="text-center">"Quand je ne serai plus, le dernier des jedi tu seras. Luke, La force est très puissante dans ta famille, transmets ce que tu as appris."</p>
	<form>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question"></i> </span>
            </div>
            <select class="form-control" name="questionType" >
                <option selected="">Type de question</option>
                <option value="QCM">QCM</option>
                <option value="QCU">QCU</option>
            </select>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question-circle"></i> </span>
            </div>
            <input name="questionnaireId" class="form-control" placeholder="Ajouter au questionnaire" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
            </div>
            <input name="questionTag" class="form-control" placeholder="Tag de la question" type="text">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
            </div>
            <textarea name="questionContenu" class="form-control input-lg"  placeholder="Contenu" type="text"></textarea>
        </div> 
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-check"></i> </span>
            </div>
            <input name="questionBaremebon" class="form-control" placeholder="Point(s) bonne réponse" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-minus"></i> </span>
            </div>
            <input name="questionBaremefaux" class="form-control" placeholder="Point(s) mauvaise réponse" type="number">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-clock"></i> </span>
            </div>
            <input placeholder="Temps maximum pour répondre" type="text" onfocus="(this.type='time')"  id="time" name="tempsMax" class="form-control">
        </div>
                                     
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Création de la question </button>
        </div>     
    </form>
</article>
