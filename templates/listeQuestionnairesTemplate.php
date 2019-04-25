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


<div class="container-fluid">
    
<h2 style="text-align:center;margin-bottom:50px;margin-top:50px"> Votre Questionnaires </h2>


<div class="list-group" style="margin:0px 100px 100px 100px">
  <a style="margin-bottom:25px" href="index.php?controller=questionnaire&action=afficherInfoQuestionnaire" class="list-group-item list-group-item-action" class="list-group-item d-flex justify-content-between align-items-center">
    Question 1 : #C
  </a>
  <a style="margin-bottom:25px" href="index.php?controller=questionnaire&action=afficherInfoQuestionnaire" class="list-group-item list-group-item-action" >
    Question 2 : #Pharo
  </a>
  <a style="margin-bottom:25px" href="index.php?controller=questionnaire&action=afficherInfoQuestionnaire" class="list-group-item list-group-item-action">
    Question 3 : #Python
  </a>
  <a style="margin-bottom:25px" href="index.php?controller=questionnaire&action=afficherInfoQuestionnaire" class="list-group-item list-group-item-action">
    Question 4 : #PHP
  </a>
  <a style="margin-bottom:25px" href="index.php?controller=questionnaire&action=afficherInfoQuestionnaire" class="list-group-item list-group-item-action">
    Question 5 : #C++
  </a> 
</div>
