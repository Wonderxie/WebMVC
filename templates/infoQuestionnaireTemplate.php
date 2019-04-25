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

<form action="index.php?controller=user&action=afficherInfoQuestionnaire" method="post">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <h4 class="card-title mt-3 text-center">Aperçu actuel du questionnaire</h4>

    <form>
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Titre</th>
                    <td><?php echo $_SESSION['questTitre'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td><?php echo $_SESSION['questDescription'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Date d'ouverture</th>
                    <td><?php echo $_SESSION['questDateouv'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Date de fermeture</th>
                    <td><?php echo $_SESSION['questDateferm'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Mode d'accès</th>
                    <td><?php echo $_SESSION['questModeacces'] ?></td>
                </tr>
                <tr>
                    <th scope="row">ID questionnaire</th>
                    <td><?php echo $_SESSION['questId'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Adresse mail de createur</th>
                    <td><?php echo $_SESSION['questMail'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Nombre de questions</th>
                    <td><?php echo $_SESSION['questNbquest'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Possibilité de revenir en arrière</th>
                    <td><?php ($_SESSION['questRetourarriere'] == 0) ? print_r('Non') : print_r('Oui') ?></td>
                </tr>
                <tr>
                    <th scope="row">Tag du questionnaire</th>
                    <td><?php echo $_SESSION['questTag'] ?></td>
                </tr>
                <tr>
                    <th scope="row">Type du questionnaire</th>
                    <td><?php ($_SESSION['questType'] == 0) ? print_r('Public') : print_r('Privé') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
</article>