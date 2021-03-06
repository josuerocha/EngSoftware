<?PHP
session_start();
if(isset($_SESSION["email"]))
{
	header("Location: home.php");
}
else
{

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="icon" href="assets/images/favicon.png">
	<?include "../util/StandardHeader.php" ?>

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
				<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li ><a href="inicio.html">Home</a></li>
					<li><a href="about.html">Sobre</a></li>
					<li><a href="courses.html">Cursos</a></li>
                    <li><a href="courses.html">Estude no CCAA</a></li>
                    <li><a href="courses.html">Unidades</a></li>
					<li><a href="price.html">Preços</a></li>
                    <li><a href="courses.html">Convênios</a></li>
                    <li><a href="courses.html">Contato</a></li>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<header id="head" class="secondary_login">
            <div class="container">
                <h1 class="texto_login">Login</h1>
            </div>
    	</header>
        <div class="container">
			<form action="../helper/LoginHelper.php?action=validate" id="loginForm" method="post">
				<h4 id="usuario">Email:</h4><input type="email" name="email" id="inputUsuario" />
				<h4 id="textoSenha">Senha:</h4><input type="password" name="senha" id="inputSenhaUsuario"/>
				<input id="enviarEmail" type="submit" name="btnEnviar" value="Fazer Login">
			</form>
			<div id="result"></div>
		
            <a class="recuperar" href="recuperar_senha.php">Esqueceu a senha?</a>
        </div>
		<div id="login_id" class="footer2_login"> <!-- alterar css -->
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="inicio.html">Home</a>
								<a href="sobre.html">Sobre</a>
								<a href="cursos.html">Cursos</a>
          						<a href="estude.html">Estude no CCAA</a>
          						<a href="unidades.html">Unidades</a>
								<a href="precos.html">Preços</a>
          						<a href="convenios.html">Convênios</a>
          						<a href="contato.html">Contato</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2016. Template by<a href="http://Jess&Josh&Nick.com/" rel="develop">Jess&Josh&Nick.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/specific/login.js"></script>

    </script>
</body>
</html>
