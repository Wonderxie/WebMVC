<head>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


</head>

<?php
    if(isset($logErrorText))
    echo '<span class="error" style="color:red">' . $logErrorText . '</span>';
?>

<form action="index.php?controller=user&action=validateEdition" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Hello <?php echo $_SESSION['userPseudo']?></h4>
    <p class="text-center">"Tu ne peux pas empêcher que tout change, pas plus qu'on ne peut empêcher les soleils de se coucher." </p>

    <form>

        <div class="form-group input-group">
        
        <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
            <input name="profilNom" class="form-control"  <?php echo("placeholder='Nom : ".$_SESSION['userNom']."'")?> type="text">
        </div>
        <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
            <input name="profilPrenom" class="form-control" <?php echo("placeholder='Prénom : ".$_SESSION['userPrenom']."'")?> type="text">
        </div> 
    
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-graduation-cap"></i> </span>
            </div>
            <input name="profilMatricule" class="form-control" <?php echo("placeholder='Matricule : ".$_SESSION['userMatricule']."'")?> type="number">
        </div>
        <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
            <input class="form-control" placeholder="Mot de passe" type="password" name="profilPassword1">
        </div> 
        <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
            <input class="form-control" placeholder="Répète le mot de passe" type="password" name="profilPassword2">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" <?php echo("placeholder='Pseudo : ".$_SESSION['userPseudo']."'")?> type="text" name="profilPseudo">
        </div> 

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Éditer le profil</button>
        </div>  
    </form>
</article> 