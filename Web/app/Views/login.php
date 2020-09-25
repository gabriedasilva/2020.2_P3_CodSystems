<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>iClass</title>
	<meta name="description" content="Sua escola em casa!">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">



</head>

<body style="background-color: #2196F3">
	<div class="d-flex flex-column" style="height: 100vh">
		<div class="d-flex align-items-center flex-column">
			<img src="http://localhost/2020.2_P3_CodSystems/Web/assets/imgs/logoshapewhite.png" width="100" height="100" class="d-inline-block align-top" alt="" loading="lazy">
			<div class="p-3" style="background-color: #212121; border-radius: 10px; min-height: 200px">
				<form id="formLogin" class="form-signin" style="color: #fff;" action="<?php echo base_url('Login/login') ?>" method="POST">
					<label for="inputEmail" class="sr-only">Endereço de E-mail</label>
					<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" autofocus>
					<label for="inputPassword" class="sr-only">Senha</label>
					<input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha">
					<button id="login" class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
					<div class="text-center">
						<strong >Bem Vindo!</strong>
					</div>
					<!-- <label>Problemas com login?<a href="#">clique aqui!</a><label> -->
				</form>
			</div>
		</div>
	</div>
	<?php if (isset($resultLogin)) : ?>
		<script language='javascript' type='text/javascript'>
			alert('<?php echo $resultLogin ?>');
		</script>
	<?php endif ?>

	<!-- SCRIPTS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<!-- -->

</body>

</html>