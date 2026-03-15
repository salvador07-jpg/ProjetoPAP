<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"])){

		$con = new Mysqli("localhost", "root", "", "pc_builder");

		if ($con->connect_error) {
			die("Erro na ligação à base de dados: " . $con->connect_error);
		}

		$stn = $con->prepare("INSERT INTO componentes 
			(id, nome, tipo, marca, modelo, preco, loja, stock, imagem, descricao, socket_cpu, tipo_ram, slots_ram, tipo_pcie_principal) 
			VALUES (0,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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
		$con->close();
	}
?>
<!DOCTYPE html>
<html lang = "pt">
	<head>
		<meta charset = "UTF-8">
			<title>Trabalho Site</title>
			<link rel = "stylesheet" href = "..\FolhaEstiloProjetoPAP.css">
			<link rel = "stylesheet" href = "..\FeMenuLateral.css">
			<link rel = "stylesheet" href = "..\FeSearch.css">

			<!-- Botões -->
			<link rel = "stylesheet" href = "..\FeBtAparenciaBotoes.css">
			<link rel = "stylesheet" href = "..\FeBtMenu.css">
			<link rel = "stylesheet" href = "..\FeBtUtilizador.css">
			<link rel = "stylesheet" href = "..\FeBtTemaSite.css">
			<link rel = "stylesheet" href = "..\FeBtAddBD.css">

			<!-- Ficheiro responsivo é por último para conseguir se sobrepor aos estilos base -->
			<link rel = "stylesheet" href = "..\FeLayoutResponsivo.css">
	</head>
    <main>
	    <header>
			<!-- Botão menu lateral -->
			<div class = "LeftMenu-Skin">
				<button id = "LeftMenu-ButtonJS" class = "BtLeftMenu"> 
					<img style = "width: 20px; height: 20px;" src = "..\imagens/menu.png">
				</button>
				<div id = "BtLeftMShow" class = "leftMenu-Items">	
					<div class = "CloseMenu">
						<button id = "BtLeftMenu-CloseJS" class = "BtCloseMenu"> 
							<img style = "width: 20px; height: 20px;" src = "..\imagens/close.png">
						</button>
					</div>
					<a href = "####">opcao1</a>
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
					<img style = "width: 20px; height: 20px;" src = "..\imagens/tema.png">
				</button>
				<div id = "BtThemeMShow" class = "ThemeMenu-Items">	
					<div class = "CloseMenu">
						<button id = "BtTheme-CloseJS" class = "BtCloseMenu"> 
							<img style = "width: 20px; height: 20px;" src = "..\imagens/close.png">
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
					<img style = "width: 24px; height: 24px;" src = "..\imagens/add_user.png">
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
					<p><a href = "####">opcao1</a></p>
					<p><a href = "####">opcao2</a></p>
				</ul>
			</nav>
			<article class = "MainArticle">
				<article class = "ArticleContent">
					<?php
						$con = new Mysqli("localhost", "root", "", "pc_builder");
						if ($con->connect_error) {
							die("Erro na ligação à base de dados: " . $con->connect_error);
						}
						$sql = "SELECT id_componente, imagem, nome, tipo, marca, modelo, preco FROM componentes";
						$result = $con->query($sql);
					?>
					<div class = "ComponentList">
						<table class="ComponentTabela">
        					<tr>
								<th>Imagem</th>
								<th>ID</th>
								<th>Nome</th>
								<th>Tipo</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Preço</th>
							</tr>
							<?php
							if ($result && $result->num_rows > 0) {
								while ($row = $result->fetch_assoc()){
									echo "<tr>";
									echo "<td><img src = '" . $row["imagem"] . "' width = '30' height = '30'></td>";									echo "<td>" . $row["id_componente"] . "</td>";
									echo "<td>" . $row["nome"] . "</td>";
									echo "<td>" . $row["tipo"] . "</td>";
									echo "<td>" . $row["marca"] . "</td>";
									echo "<td>" . $row["modelo"] . "</td>";
									echo "<td>" . $row["preco"] . "</td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><td> Sem componentes </td></tr>";
							}
							$con->close();
							?>
						</table>
					</div>
				</article>
				<div class = "BD-Options">

					<div class = "BtAddStyle">
						<button id = "BtAddComponentJS" type = "Submit" class = "BtAddComponent">
							<img style = "width: 85px; height: 85px;" src = "..\imagens/add_componente.png">							
						</button>
					</div>

					<div class = "BtChangeStyle">
						<button id = "BtChangeComponentJS" class = "BtChangeComponent">
							<img style = "width: 85px; height: 85px;" src = "..\imagens/change_componente.png">							
						</button>
					</div>

					<div class = "BtDeleteStyle">
						<button id = "BtDeleteComponentJS" type = "Delete" class = "BtDeleteComponent">
							<img style = "width: 85px; height: 85px;" src = "..\imagens/delete_componente.png">							
						</button>
					</div>
				</div>
			</article>
		</div>
		<footer>
			<p>Projeto PAP</p>
		</footer>
	</main>
	<script src = "..\ScriptsProjeto.js"></script>
</html>