<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styleslogin.css">
</head>

<?php
    if(isset($logErrorText))
    echo '<span class="error" style="color:red">' . $logErrorText . '</span>';
?>

<form action="index.php?action=validateLogin" method="post">
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="margin-top:200px;">
			
			<div class="card-body">
				<form action="index.php?action=validateLogin" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-primary"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Nom d'utilisateur" name="logLogin">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-primary"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Mot de passe" name="logPassword">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Se rappeler de moi 
					</div>
					<div class="form-group">
						<input type="submit" value="Se connecter" class="btn btn-primary float-right login_btn-primary">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Pas encore de compte?<a href="index.php?action=inscription">Inscrivez-vous !</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Mot de passe oublié?(mettre un lien troll car on n'a pas la fonctionalité</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>