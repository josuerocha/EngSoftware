<?PHP
	require_once "../util/checkSession.php";
	require_once "../util/StandardHeader.php";
	require_once "../util/autoload.php";
	spl_autoload_register("LoadClass");
?>
<!DOCTYPE html>
<html>
<head>
<html lang="pt-br">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Relatório de contas a pagar</title>
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">

<?include "../util/StandardHeader.php" ?>
<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
<link rel="stylesheet" href="assets/css/style.css">

</head>

<?PHP
	$pessoaControl = new PessoaController();
	$perfilControl = new PerfilController();
	$perfil = $perfilControl->getByDescricao("Professor");
	$professores = $pessoaControl->ListByPerfil($perfil->getCode());
	$codeProfessor = 0;
?>

<body>

<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>


	<!-- /.Nome da pagina -->
	<header id="head" class="secondary_aluno">
        <div class="container">
            <h1 id="texto_modulo">Contas à receber</h1>
        </div>
	</header>

<div id="divTabela">
	<form id="formProfessor" action="relatorio_faltasprofessor.php" method="POST">
		<select id="sltProfessor" name="sltProfessor" >
			<?PHP
				while ($professor = array_pop($professores)){
					if(isset($_POST['sltProfessor']) && $_POST['sltProfessor'] == $professor->getCode()){
						echo "<option value='{$professor->getCode()}' selected> {$professor->getNome()} </option>";

					} 
					else{
						echo "<option value='{$professor->getCode()}'> {$professor->getNome()} </option>";
					}
				}
			?>
		</select>
	</form>
</div>

<?PHP

if(isset($_POST['sltProfessor'])){
	$codeProfessor = $_POST['sltProfessor'];
}
?>


<div id = "result">
<table id="tabela" class="display nowrap" cellspacing="0" width="100%">

<thead>
		<tr> 
            <th> Data</th>
            <th> Presença</th>
        </tr>
</thead>
<tfoot>
	<tr> 
        <th> Data</th>
        <th> Presença</th>	
    </tr>
</tfoot>
    <tbody>    	
    	<?PHP
    		$presencaControl = new PresencaController();
    		$presencas = $presencaControl->ListByPessoa($codeProfessor);
    		while ($presenca = array_pop($presencas)) { 
    			echo "<tr>
    					  <td align=\"center\">{$presenca->getData()}</td>";
    					  if($presenca->getSituacao()){
    					  	echo "<td align=\"center\"><img src=\"assets/images/checkmark.png\" alt=\"Presente\" ></td>";

    					  }
    					  else{
    					  	echo "<td align=\"center\"><img src=\"assets/images/xmark.png\" alt=\"Ausente\" ></td>";

    					  }
    					  

    			echo "</tr>";
    		}
		?>
		
    </tbody>
</table>
</div>

		<div class="footer2_aluno"> <!-- alterar css -->
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

</body>


</body>

<script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.print.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.flash.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/specific/relatorio_presencaprofessor.js"></script>

</html>
