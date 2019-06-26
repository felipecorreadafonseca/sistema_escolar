<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
</head>
	<body>
		<div class="tabcontent">
			<div class="tabarea">
				<div class="tabitem activetab">Funcionario</div>
				<div class="tabitem">Aluno</div>
			</div>
			<div class="tabbody" style="display:block">
				<form action="<?php echo BASE_URL; ?>login/index_user"  method="POST">			
					<div class="form-group">
    					<label for="exampleInputEmail1">Endereço de email</label>
						<input type="email" class="form-control" name="email" placeholder="Digite seu e-email" />
						<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pass" placeholder="Digite sua senha" />
					</div>

					<input type="submit" class="btn btn-primary" value="Entrar"/>

					<?php if(isset($error) && !empty($error)):?>
						<div class="warning" ><?php echo $error; ?></div>
					<?php endif; ?>
				</form>
			</div>
				<div class="tabbody">
					<form action="<?php echo BASE_URL; ?>login/index_aluno"  method="POST">
							
					<div class="form-group">
    					<label for="exampleInputEmail1">Endereço de email</label>
						<input type="email" class="form-control" name="email" placeholder="Digite seu e-email" />
						<small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pass" placeholder="Digite sua senha" />
					</div>

					<input type="submit" class="btn btn-primary" value="Entrar"/>

							<?php if(isset($error) && !empty($error)):?>
								<div class="warning" ><?php echo $error; ?></div>
							<?php endif; ?>
					</form>
				</div>
			</div>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>