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
<form action="index.php?controller=user&action=editerProfil" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Hello <?php echo $_SESSION['userPseudo']?></h4>
    <p class="text-center">"Tu ne peux pas empêcher que tout change, pas plus qu'on ne peut empêcher les soleils de se coucher." </p>

    <form>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Pseudo</th>
                    <td><?php echo $_SESSION['userPseudo']?></td>
                </tr>
                <tr>
                    <th scope="row">Nom</th>
                    <td><?php echo $_SESSION['userNom']?></td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td><?php echo $_SESSION['userPrenom']?></td>
                </tr>
                <tr>
                    <th scope="row">Type</th>
                    <td><?php echo $_SESSION['userType']?></td>
                </tr>
                <tr>
                    <th scope="row">Adresse Mail</th>
                    <td><?php echo $_SESSION['userMail']?></td>
                </tr>
                <tr>
                    <th scope="row">Matricule</th>
                    <td><?php echo $_SESSION['userMatricule']?></td>
                </tr>
                <tr>
                    <th scope="row">Promotion</th>
                    <td><?php echo $_SESSION['userPromo']?></td>
                </tr>
                <tr>
                    <th scope="row">Matière</th>
                    <td><?php echo $_SESSION['userMatiere']?></td>
                </tr>
                <!-- <button class="btn btn-lg btn-primary btn-block" onclick="window.location.href = '/~alejandra.acevedo/index.php?idq=10&controller=Questionnaire&action=showQuiz';">
                    <span class="fa fa-search"></span>Détail
                </button> -->
            </tbody>
        </table>

        <div class="form-group">
            <button href="index.php?controller=user&action=editerProfil" class="btn btn-primary btn-block"> Éditer votre profil</button>
        </div>                                                                   
    </form>
</article>
