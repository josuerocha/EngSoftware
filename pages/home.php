<?PHP
require_once("../util/checkSession.php");
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");


$pessoaControl = new PessoaController();
$pessoa = $pessoaControl->getByEmail($_SESSION["email"]);

$perfilControl = new PerfilController();
$perfil = $perfilControl->getByCode($pessoa->getFKPerfil());

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Home - <?PHP echo $perfil->getDescricao(); ?></title>
	<link rel="icon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/specific/home.css">
</head>

<body>
		<!--NAVBAR GENÈRICA !! -->
		<div id="container">
		<?PHP include "../util/GenericNavBar.php"; ?>

		<header id="head" class="secondary_aluno">
            <div class="container">
                <h1 id="texto_modulo">Módulo do <?PHP echo $perfil->getDescricao(); ?></h1>
            </div>
    	</header>
    
        <div id="div-body" class="container">
			<h3 class="academico">Geral</h3>
			<h3 class="financeiro">Acadêmico</h3>

			<img src="../users/pictures/<?PHP echo $pessoa->getFoto(); ?>" id="foto-user" alt="Vocẽ">
			<a id="alterar-dados" href="editar_dados.php">Alterar dados</a>

			<h3 style="color: #000000;" id="nome-user"> <b>Usuário:</b> &nbsp <?PHP echo $pessoa->getNome(); ?> </h3>

            <img src="assets/images/logout.jpg" class="icon-diarios" alt="Techro HTML5 diarios"><a id="diarios" href="../util/logout.php">Logout</a>

			<?PHP if($perfil->getStudy()){ ?>
			<img src="assets/images/boletim.png" class="icon-alterar-senha" alt="Techro HTML5 boletim"><a id="alterar-senha" href="aluno_boletim.html">&nbsp Boletim</a>



			<img src="assets/images/alterar-senha.png" class="icon-boletim"  alt="Techro HTML5 alterar-senha"><a id="boletim"  href="alterar_senha.php">Alterar senha</a>
			<img src="assets/images/mensalidade.jpg" class="icon-mensalidades" alt="Techro HTML5 mensalidades"><a id="mensalidades" href="aluno_diarios.html">Mensalidades</a>
			<img src="assets/images/materiais.jpg" class="icon-materiais" alt="Techro HTML5 materiais"><a id="materiais" href="aluno_boletim.html">Materiais</a>
			<img src="assets/images/pagamento-online.png" class="icon-pagamento-online" alt="Techro HTML5 pagamento-online"><a id="pagamento-online" href="aluno_alterar_senha.html">Pagamento online</a>
        
        	<?PHP } ?>
        </div>

        <!--FOOTER GENÈRICA !! -->
        <div id="div-footer">
			<?PHP include "../util/GenericFooter.php"; ?>
		</div>
		</div>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
