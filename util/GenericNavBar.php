<?PHP
require_once ("../util/autoload.php");
spl_autoload_register("LoadClass");

$pessoaControl = new PessoaController();
$pessoa = $pessoaControl->getByEmail($_SESSION["email"]);

$perfilControl = new PerfilController();
$perfil = $perfilControl->getByCode($pessoa->getFKPerfil());

$picture = "../users/pictures/" . $pessoa->getFoto();

$url = $_SERVER['REQUEST_URI'];
?>
<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="inicio.html">
					<img src="assets/images/logo.png" alt="CCAA"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">

					<li <?PHP if (strpos($url, 'home') !== false) {echo  "class=\"active\"";} ?>><a href="home.php">Home</a></li>
					


                    <!-- Exibindo cadastros somente para quem pode vê-los -->
                    <?PHP
                    if($perfil->getRegistration()){

                    ?>
					<li <?PHP if (strpos($url, 'cadastro') !== false) {echo  "class=\"dropdown active\"";} else{ echo  "class=\"dropdown\""; }?>   >
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="cadastro_pessoa.php">Pessoas</a></li>
                            <li><a href="cadastro_contasreceber.php">Contas a receber</a></li>
                            <li><a href="cadastro_contaspagar.php">Contas a pagar</a></li>
                            <li><a href="cadastro_sala.php">Sala</a></li>
                            <li><a href="cadastro_turma.php">Turma</a></li>

                        <?PHP
                            if($perfil->getComplexRegistration()){
                        ?>    
                                <li><a href="cadastro_idioma.php">Idiomas</a></li>
                                <li><a href="cadastro_perfil.php">Perfis</a></li>
                                <li><a href="cadastro_tipoconta.php">Tipo de conta</a></li>
                        <?PHP
                            }
                        ?>
                        </ul>
                    </li>

                    <?PHP
                        }
                    ?>


                    <!-- Exibindo relatórios somente para quem pode vê-los -->
                    <?PHP
                    if($perfil->getReport()){

                    ?>
					<li <?PHP if (strpos($url, 'relatorio') !== false) {echo  "class=\"dropdown active\"";} else{ echo  "class=\"dropdown\""; }?>>
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="relatorio_contasreceber.php">Contas à receber</a></li>
                            <li><a href="relatorio_contaspagar.php">Contas a pagar</a></li>

                            <?PHP
                                if($perfil->getComplexReport()){
                            ?>

                            <li><a href="relatorio_faltasprofessor.php">Faltas do professor</a></li>
                            <li><a href="relatorio_receita.php">Receita</a></li>

                             <?PHP
                                }
                            ?>
                        </ul>
                    </li>
                    <?PHP
                    }
                    ?>

                    <?PHP
                    if($perfil->getStudy()){
                    ?>
                    <li <?PHP if (strpos($url, 'boletim') !== false) {echo  "class=\"active\"";} ?>><a href="boletim.php">Boletim</a></li>
                    <li <?PHP if (strpos($url, 'pagamento') !== false) {echo  "class=\"active\"";} ?>><a href="pagamento.php">Pagamento</a></li>
					
                    <?PHP
                    }

                    if($perfil->getTeach()){
                    ?>
                    <li <?PHP if (strpos($url, 'diario') !== false) {echo  "class=\"active\"";} ?>><a href="entrada_diario.php">Lançamento de diário</a></li>

                    <?PHP
                    }
                    ?>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?PHP echo $picture;?>" alt="User" height="20" width="20"> <?PHP echo $pessoa->getNome(); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="alterar_senha.php">Alterar senha</a></li>
                            <li><a href="editar_dados.php">Editar dados</a></li>
                            <li><a href="../util/logout.php">Logout</a></li>
                        </ul>
                    </li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->


<?PHP



?>