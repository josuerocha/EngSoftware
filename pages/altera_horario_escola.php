<?PHP
require_once("../util/checkSession.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Alteração do horário da escola</title>
	
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1 id="altera_horario_escola">Alteração do Horário de funcionamento da Escola</h1>
                </div>
    </header>

    
    <div class="container">
	<form action="../helper/HorarioHelper.php?action=save" method = "post">
		<h3 id="text_horario_inicial">Horário inicial:</h3><span id="inicio-span-horario">*</span>&nbsp <input id="input_horario_inicial" type="time" name="tempoinicial" required/>
		<h3 id="text_horario_final">Horário final: </h3><span id="fim-span-horario">*</span>&nbsp <input id="input_horario_final" type="time" name="tempofinal" required/>
			<input id="btn_reset" type="reset" />&nbsp 	
			<input id="btn_salvar_temp" type="submit" name="salvar_temp" value="Salvar" />&nbsp 
			<input id="btn_cancelar_temp" type="button" name="cancelar_temp" value="Cancelar" />
	</form>
	</div>

	<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div id="fo_altera-hora-aula" class="footer2_login">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div id="panel-hora-aula" class="panel-body">
							<p class="simplenav">
								<a href="home_coordenador.php">Home</a>| 
								<a href="altera_horario_escola.php">Horário da Escola</a>|
								<a href="contas.php">Contas</a>|
                				<a href="montagem_grade.php">Grade de Horário</a>|
                				<a href="alterar_hora_aula.php">Hora/Aula</a>|
                				<a href="visualizar_receita.php">Receita</a>|
                				<a href="alterar_senha.php">Alterar Senha</a>|
                				<a href="../util/logout.php">Logout</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. 
								Site by <a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
