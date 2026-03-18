<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	require "validacao.php";
	$validacao = validarFormulario();
}
?>
<?php
$con = new Mysqli("localhost", "root", "", "pc_builder");

if($con->connect_error != 0){
	echo "Ocorreu um erro de ligação à base de dados; " .$con->connect_error;
	exit;
	}

#INSERIR
if(isset($_POST["enviar"])){

	$stn = $con->prepare("INSERT INTO componentes VALUES (0,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$stn->bind_param("sssssssssssss",
			$_POST["nome"],
			$_POST["tipo"],
			$_POST["marca"],
			$_POST["modelo"],
			$_POST["preco"],
			$_POST["loja"],
			$_POST["stock"],
			$_POST["imagem"],
			$_POST["descricao"],
			$_POST["socket_cpu"],
			$_POST["tipo_ram"],
			$_POST["slots_ram"],
			$_POST["tipo_pcie_principal"]
		);

	$stn->execute();
	$stn->close();

	echo "Inscrição guardada!";
}

#PESQUISAR
if(isset($_POST["pesquisar"])){

	$id = $_POST["id_componente"];

	$stn = $con->prepare("SELECT * FROM componentes WHERE id_componente=?");
	$stn->bind_param("i", $id);
	$stn->execute();

	$resultado = $stn->get_result();

	if($resultado->num_rows > 0){
		$dados = $resultado->fetch_assoc();

		$_POST["nome"] = $dados["nome"];
		$_POST["tipo"] = $dados["tipo"];
		$_POST["marca"] = $dados["marca"];
		$_POST["modelo"] = $dados["modelo"];
		$_POST["preco"] = $dados["preco"];
		$_POST["loja"] = $dados["loja"];
		$_POST["stock"] = $dados["stock"];
		$_POST["imagem"] = $dados["imagem"];
		$_POST["descricao"] = $dados["descricao"];
		$_POST["socket_cpu"] = $dados["socket_cpu"];
		$_POST["tipo_ram"] = $dados["tipo_ram"];
		$_POST["slots_ram"] = $dados["slots_ram"];
		$_POST["tipo_pcie_principal"] = $dados["tipo_pcie_principal"];
		echo "Componente encontrado!";
	}else{
		echo "ID não encontrado.";
	}

	$stn->close();
}

#ATUALIZAR
if(isset($_POST["mudar"])){

	$id = $_POST["id_componente"];

	$stn = $con->prepare("UPDATE componentes SET 
		nome=?, 
		tipo=?, 
		marca=?, 
		modelo=?, 
		preco=?, 
		loja=?, 
		stock=?, 
		imagem=?, 
		descricao=?, 
		socket_cpu=?,
		tipo_ram=?, 
		slots_ram=?, 
		tipo_pcie_principal=?

		WHERE id_componente=?");

	$stn->bind_param("sssssssssssssi", 
	$_POST["nome"],
	$_POST["tipo"],
	$_POST["marca"],
	$_POST["modelo"],
	$_POST["preco"],
	$_POST["loja"],
	$_POST["stock"],
	$_POST["imagem"],
	$_POST["descricao"],
	$_POST["socket_cpu"],
	$_POST["tipo_ram"],
	$_POST["slots_ram"],
	$_POST["tipo_pcie_principal"],
	$id
	);

	$stn->execute();

	echo "Inscrição atualizada.";

	$stn->close();
}

#ELIMINAR
if(isset($_POST["apagar"])){

	$id = $_POST["id_componente"];

	$stn = $con->prepare("DELETE FROM componentes WHERE id_componente=?");
	$stn->bind_param("i", $id);
	$stn->execute();

	echo "Componente eliminado!";
	$stn->close();
}

$con->close();
?>

<!DOCTYPE html>
<html lang = "pt">
	<head>
		<meta charset = "UTF-8">
			<title>Trabalho Site</title>
			<link rel = "stylesheet" href = "..\..\Ppap2\FolhaEstiloProjetoPAP.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeMenuLateral.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeSearch.css">

			<!-- Botões -->
			<link rel = "stylesheet" href = "..\..\Ppap2\FeBtAparenciaBotoes.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeBtMenu.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeBtUtilizador.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeBtTemaSite.css">
			<link rel = "stylesheet" href = "..\..\Ppap2\FeBtAddBD.css">

			<link rel = "stylesheet" href = "..\ProjetoPap_CSS\FeAddBd.css">

			<!-- Ficheiro responsivo é por último para conseguir se sobrepor aos estilos base -->
			<link rel = "stylesheet" href = "..\..\Ppap2\FeLayoutResponsivo.css">
	</head>
    <main>
		<body>
	    <header>
			<!-- Botão menu lateral -->
			<div class = "LeftMenu-Skin">
				<button id = "LeftMenu-ButtonJS" class = "BtLeftMenu"> 
					<img style = "width: 20px; height: 20px;" src = "..\..\Projeto_PAP\imagens\menu.png">
				</button>
				<div id = "BtLeftMShow" class = "leftMenu-Items">	
					<div class = "CloseMenu">
						<button id = "BtLeftMenu-CloseJS" class = "BtCloseMenu"> 
							<img style = "width: 20px; height: 20px;" src = "..\..\Projeto_PAP\imagens\close.png">
						</button>
					</div>
					<a href = "MenuInicial.php">Voltar</a>
					<a href = "####">opcao2</a>
					<div class = "UserMenu-Options">
						<button id = "BtLogInJS" class = "BtLogIn">LogIn</button>
						<button id = "BtSignInJS" class = "BtSignIn">SignIn</button>
					</div>
				</div>
			</div>
	        <form class = "search">				
				<input type = "text" placeholder = "Pesquisar...">
				<!--<button type = "submit">Pesquisar</button>-->
			</form>
			<!-- Botão para mudar o tema do site-->
			<div class = "ThemeMenu-Skin">
				<button id = "ThemeMenu-ButtonJS" class = "BtThemeMenu"> 
					<img style = "width: 20px; height: 20px;" src = "..\..\Projeto_PAP\imagens\tema.png">
				</button>
				<div id = "BtThemeMShow" class = "ThemeMenu-Items">	
					<div class = "CloseMenu">
						<button id = "BtTheme-CloseJS" class = "BtCloseMenu"> 
							<img style = "width: 20px; height: 20px;" src = "..\..\Projeto_PAP\imagens\close.png">
						</button>
					</div>
					<div class = "ThemeMenu-Options">
						<button class = "LightTheme">Light Theme</button>
						<button class = "DarkTheme">Dark Theme</button>
						<button class = "BlueTheme">Blue Theme</button>
						<button class = "GreenTheme">Green Theme</button>
						<button class = "PurpleTheme">Purple Theme</button>
					</div>
				</div>	
			</div>
			<!-- Menu do utilizador-->
			<div class = "UserMenu-Skin">
				<button id = "DPmenuUser-ButtonJS" class = "BtUserMenu"> 
					<img style = "width: 24px; height: 24px;" src = "..\..\Projeto_PAP\imagens\add_user.png">
				</button>

				<div id = "BtUserMShow" class = "UserMenu-Items">	
					<nav class = "UserMenu-List">
						<a href = "####">opcao1</a>
						<a href = "####">opcao2</a>
					</nav>

					<div class = "UserMenu-Options">
						<button id = "BtLogInJS" class = "BtLogIn">LogIn</button>
						<button id = "BtSignInJS" class = "BtSignIn">SignIn</button>
					</div>
				</div>	
			</div>
		</header>

		<div class = "ContentSite">
			<nav class = "menu-lateral">
				<ul class = "MenuList">
					<p><a href = "MenuInicial.php">Voltar</a></p>
					<p><a href = "####">opcao2</a></p>
				</ul>
			</nav>
			<article class = "MainArticle">
				<article class = "ArticleContent">
					<div class = "ComponentList">
						<table class="ComponentTabela">
							<tr>
								<form style = "color: White" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
									<fieldset>
										<legend>Dados pessoais</legend>
										<table>
	 										<tbody>
												<tr>
													<td><label>Tipo*: </label></td>
													<td>                    
														<select name = "tipo">
															<option value = "Motherboard">Motherboard</option>
															<option value = "GPU">GPU</option>
															<option value = "CPU">CPU</option>
															<option value = "RAM">RAM</option>
															<option value = "PSU">PSU</option>
														</select>

														<?php if($_POST && in_array("nome", $validacao))
															{
																echo "<span class =\"erro\"> (preenchimento obrigatório)</span>";							
															} ?>
													</td>
												</tr>

												<tr>
													<td><label>Nome*: </label></td>
													<td>
														<input name = "nome" size = "45" type = "text" value = "<?php
															if($_POST && !empty($_POST["nome"]))
																{
																	echo $_POST["nome"];
																}						
														?>" />
														<?php if($_POST && in_array("nome", $validacao))
															{
																echo "<span class =\"erro\"> (preenchimento obrigatório)</span>";							
															} ?>
													</td>
												</tr>

												<tr>
													<td><label>Marca*: </label></td>
													<td>
														<input name = "marca" size = "45" type = "text" value = "<?php
															if($_POST && !empty($_POST["marca"]))
																{
																	echo $_POST["marca"];
																}
														?>" />
														<?php if($_POST && in_array("nome", $validacao))
															{
																echo "<span class =\"erro\"> (preenchimento obrigatório)</span>";							
															} ?>
													</td>
												</tr>

												<tr>
													<td><label>Modelo*: </label></td>
													<td>
														<input name = "modelo" size = "45" type = "text" value = "<?php
															if($_POST && !empty($_POST["modelo"]))
																{
																	echo $_POST["modelo"];
																}
														?>" />
														<?php if($_POST && in_array("nome", $validacao))
															{
																echo "<span class =\"erro\"> (preenchimento obrigatório)</span>";							
															} ?>
													</td>
												</tr>

												<tr>
													<td><label>Preço: </label></td>
													<td>
														<input name = "preco" size = "45" type = "text" value = "<?php
															if($_POST && !empty($_POST["preco"]))
																{
																	echo $_POST["preco"];
																}
														?>" />
													</td>
												</tr>

												<tr>
													<td><label>Descrição: </label></td>
													<td>
														<input name = "descricao" size = "45" type = "text" value = "<?php
															if($_POST && !empty($_POST["descricao"]))
																{
																	echo $_POST["descricao"];
																}
														?>" />
													</td>
												</tr>
											</tbody>
										</table>
									<fieldset>

									<fieldset>
									<legend>Habilitações académicas</legend>
										<table>
											<tbody>
												<tr>
													<td><label>Tipo de RAM</label></td>
													<td>
														<select name = "tipo_ram">
															<option value = "N/A">N/A</option>
															<option value = "DDR3">DDR3</option>
															<option value = "DDR4">DDR4</option>
															<option value = "DDR5">DDR5</option>
														</select>
													</td>
													<td><label>Quantidade de slots de RAM na Motherboard</label></td>
													<td>
														<select name = "slots_ram">
															<option value = "N/A">N/A</option>
															<option value = "2">2</option>
															<option value = "2">4</option>
														</select>
													</td>
													<td><label>Tipo de Socket da Motherboard ou CPU</label></td>
													<td>
														<select name = "socket_cpu">
															<option value = "N/A">N/A</option>
															<option value = "2">2</option>
															<option value = "2">4</option>
														</select>
													</td>
													<!--<td><label>Tipo de pcie</label></td>
													<td>
														<select name = "tipo_pcie_principal">
															<option value = "2">2</option>
															<option value = "2">4</option>
														</select>
													</td>-->

												</tr>
											</tbody>		
										</table>
									</fieldset>

									<p><input name = "enviar" type = "submit" value = "Inserir"/> </p>
									<p><input name = "mudar" type = "submit" value = "Alterar"/> </p>
									<p><input name = "apagar" type = "submit" value = "Eliminar"/> </p>
								</form>
							</tr>
						</table>
					</div>
				</article>
				<!--<div class = "BD-Options">

					<div class = "BtAddStyle">
						<button id = "BtAddComponentJS" type = "Submit" class = "BtAddComponent">
							<img style = "width: 85px; height: 85px;" src = "imagens/add_componente.png">							
						</button>
					</div>

					<div class = "BtChangeStyle">
						<button id = "BtChangeComponentJS" class = "BtChangeComponent">
							<img style = "width: 85px; height: 85px;" src = "imagens/change_componente.png">							
						</button>
					</div>

					<div class = "BtDeleteStyle">
						<button id = "BtDeleteComponentJS" type = "Delete" class = "BtDeleteComponent">
							<img style = "width: 85px; height: 85px;" src = "imagens/delete_componente.png">							
						</button>
					</div>
				</div>-->
			</article>
		</div>
		<footer>
			<p>Projeto PAP</p>
		</footer>
	</main>
	<body>
	<script src = "..\..\Ppap2\ScriptsProjeto.js"></script>
</html>