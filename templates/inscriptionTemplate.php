
<head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
 <link rel="stylesheet" type="text/css" href="styleRegister.css" media="all" />

</head>



<?php
    if(isset($inscErrorText))
        echo '<span class="error" style="color:red">' . $inscErrorText . '</span>';
?>


<form action="index.php?action=validateInscription" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Création d'un compte étudiant</h4>
	<p class="text-center">Entre les renseignements ci dessous jeune padawan</p>
	<form>
        <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
        </div>
        <select class="form-control" name="inscType">
            <option selected=""> Je suis un</option>
            <option value="Enseignant">Enseignant</option>
            <option value="Etudiant">Étudiant</option>
			<option value="Enseignant">Jedi</option>
            <option value="Etudiant">Padawan</option>
        </select>
    </div>
		<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="inscNom" class="form-control" placeholder="Nom" type="text">
    </div> 
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="inscPrenom" class="form-control" placeholder="Prénom" type="text">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="inscMail" class="form-control" placeholder="Adresse mail (login)" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
		 </div>
        <input name="inscPromo" class="form-control" placeholder="Promotion (si étudiant)" type="e">
    </div>
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
         </div>
        <input name="inscMatricule" class="form-control" placeholder="Matricule" type="e">
    </div>
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
        <input name="inscMatiere" class="form-control" placeholder="Matière (si enseignant)" type="text">
    </div> 
    
     <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Mot de passe" type="password" name="inscPassword1">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Répéte le mot de passe" type="password" name="inscPassword2">
    </div>
       <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input class="form-control" placeholder="Pseudo" type="text" name="inscPseudo">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
    	
        <button type="submit" class="btn btn-primary btn-block"> Crée enfin ton compte  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Tu as déjà un compte? <a href="index.php?action=login">Connecte-toi</a> </p>                                                                 
</form>
</article>
