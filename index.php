<?php 
	require_once 'classes/usuarios.php';
	$u = new usuario;
?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<style>
		body{
			background-color: #006A7A; 
			background-image: url(ima/logo2.png);
			padding-top: 150px;
			background-position-x: 0;
			background-position-y: 0;
			background-repeat: no-repeat;
		}

		h1{
			color:white;
		}

	</style>

<div class="btn-group btn-group-lg btn-group-justified">
		<a href="index.php" class="btn btn-info">
		  <span class="glyphicon glyphicon-user"></span> Login
		</a>
		<a href="cadastrar.php" class="btn btn-info">
		  <span class="glyphicon glyphicon-user"></span> Cadastrar
		</a>
		</div>
		<br><br><br>


</head>
<body>
	<div id="corpo-form">
	<h1>Entrar</h1>
	<form method="post">
		<input type="email" placeholder="Email" name="email">
		<br>
		<input type="password" placeholder="senha" name="senha">
		<br>
		<input type="submit" value="Acessar">
		<br>
		<a href="cadastrar.php" style="color: white;">Ainda não é inscrito?<b>Cadastrar</b></a>
	</form>
</div>
<?php

if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	if(!empty($email) && !empty($senha))
	{
		$u->conectar("people55_dombosco","localhost","people55_alunos","i^.l*([=T~lV");
		if($u->msgErro == "")
		{
		if($u->logar($email,$senha))
		{
			header("location: areaprivada.php");
		}
		else
		{
			?>
			<div class="msg-erro">
			Email e/ou senha estão incorretos!
			</div>
			
			<?php
		}
	}
		else
		{
			?>
			<div class="msg-erro">
			<?php echo "Erro: ".$u->msgErro; ?>
			</div>
			
			<?php
			
		}
	}else
	{
		?>
			<div class="msg-erro">
			Preencha todos os campos!
			</div>
			
			<?php
		
	}
}

?>
</body>
</html>