<?PHP 
		require_once("../util/checkSession.php");
		require_once (__DIR__."/../util/autoload.php");
		spl_autoload_register("LoadClass");
		$contaPagar = new ContaPagar();
		$control = new ContaPagarController();
		if(isset($_POST["codeEdit"])){
			$contaPagar = $control->ListById($_POST["codeEdit"]);
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Cadastro de contas a pagar</title>
	
	<?include "../util/StandardHeader.php" ?>
	<link rel="stylesheet" media="screen" href="assets/css/fonts-google.css">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">

	<link rel="stylesheet" type="text/css" href="assets/css/datatables/dataTablesCss.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables/buttons.dataTables.min.css">
</head>

<body>
	
	<!--NAVBAR GENÈRICA !! -->
	<?PHP include "../util/GenericNavBar.php"; ?>

	<header id="head" class="secondary_login">
            <div class="container">
                    <h1>Cadastro contas a pagar</h1>
                </div>
    </header>

    
    <div class="container">
			<div id="coluna_esquerda">&nbsp;
				
<form action="../helper/ContaPagarHelper.php?action=save" method="POST">
				<input type="hidden" id="codeHidden" name="codeHidden"/>
				<h3>Tipo: &nbsp <select id="tipo_conta" name="tipo_conta">
								<?php
								$tipoContaControl = new TipoContaController();
								$tipos = $tipoContaControl->ListAll();
								while($tipo=array_pop($tipos)){                                                 
								echo "<option value='{$tipo->getCode()}'>{$tipo->getTipo()}</option>";
								}
					?>
								</select>
				</h3>
		
				<h3>Valor: &nbsp <input type="number" id="valor" name="valor" size="10" min="1" max="500"><h3>
					
				<h3>Data de Vencimento: &nbsp <input type="date" id="Dt_venc" name="Dt_venc"></h3>
				<h3>Data de Pagamento: &nbsp <input type="date" id="Dt_pag" name="Dt_pag"></h3>
				<h3>Situação: &nbsp 
					<input type="radio" id="Situacao1" name="Situacao" value="quitado"> Quitado &nbsp 
					<input type="radio" id="Situacao2" name="Situacao" value="pendente"> Pendente
				</h3>

				<input type="submit" class="btn-primario" name="Salvar" value="Salvar">
				<input type="button" class="btn-danger" name="Cancelar" value="Cancelar" onclick="Novo();">
			</form>
			</div>

			<br/>
			<br/>

			<div id="coluna_esquerda">&nbsp;


				
				<br/>
			<div id="table_area">
				<table id="table_contas">
					
					<thead>
						<tr>
							<th> Tipo</th>
							<th> Valor</th>
							<th> Data de vencimento</th>
							<th> Data de Pagamento</th>
							<th> Situacao</th>
							<th> Ação </th>
						</tr>
					</thead>


					<tfoot>
						<tr>
							<th> Tipo</th>
							<th> Valor</th>
							<th> Data de vencimento</th>
							<th> Data de Pagamento</th>
							<th> Situacao</th>
							<th> Ação </th>
						</tr>
					</tfoot>

					<tbody>
					<?PHP
					$controller = new ContaPagarController();
					$contasPagar = $controller->ListAll();
					while($contaPagar = array_pop($contasPagar)){
						echo "
						<tr>
							<td id='gridtipo'>{$contaPagar->getTipo()}</th>
							<td id='gridVl'>{$contaPagar->getValor()}</th>
							<td id='gridDt_venc'>{$contaPagar->getDtVencimento()}</th>
							<td id='gridDt_Pg'>{$contaPagar->getDtPagamento()}</th>
							<td id='gridSituacao'>{$contaPagar->getSituacao()}</th>
							<td>
								<form class=\"button-inline\" action=\"../helper/ContaPagarHelper.php?action=delete&code={$contaPagar->getCode()}\" method=\"post\">
									<input type=\"submit\" class=\"button-delete\" value=\"\">
								</form>

								<form class=\"form_edit\" action=\"../helper/ContaPagarHelper.php?action=edit\"  method=\"post\">
									<input type=\"hidden\" name=\"codeEdit\" id=\"codeEdit\" value={$contaPagar->getCode()}>
									<input type=\"submit\" class=\"button-edit\" value=\"\">
								</form>
							</td>
						</tr>
						";
					}
					?>
					</tbody>
					</table>
				</div>
			</div>

	<!--FOOTER GENÉRICA -->
	<?PHP include "../util/GenericFooter.php" ?>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
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
	<script type="text/javascript" src="assets/js/specific/contas_pagar.js"></script>
</body>
</html>
