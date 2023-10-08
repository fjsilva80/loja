<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> 
<title>HOME</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="_imagens/logopagina.png">
<style>
body{
background-color: #dbae84;
}
</style>
</head>


<body class="fadeIn">



<article id="tela1">

 <img id="imagemSlide3" src="_imagens/fotoB.jpg"/>

<header class="codrops-header">
				<h1>Afinal, todo mundo ama!</h1>
			</header> 

</article>



<footer id="rodape">
   <p id="empresaProm"> Receba nossas ofertas!</p>

      <form id="promocoes" method="post" action= "paginaHome.php">
                     <p id="iNomeProm"><label for="cNomeProm">Seu nome:</label></p> <input type="text" name="tNomeProm" id="cNomeProm" /></p> 
                     <p id="iMailProm"><label for="cMailProm">Seu e-mail:</label></p><input type="email" name="tMailProm" id="cMailProm" /></p>  
                 </textarea>
				          
					<input type="submit" id="botaoProm" name="tEnviar" />
				     
      </form> 

   </footer>

<?php
include_once("conexao.php");

  $nomePromo = filter_input (INPUT_POST, 'tNomeProm', FILTER_SANITIZE_STRING);
  $emailPromo  = filter_input (INPUT_POST, 'tMailProm', FILTER_SANITIZE_EMAIL);


  IF ((empty ($nomePromo)) OR (empty ($emailPromo)))  {
  echo "";}
  ELSE {
  echo "<div id='dados_contato2'>LEGAL! Você receberá nossas promoções</div>";	
  $dados_usuario = "INSERT INTO cadastro_promocoes (email, nome) VALUES ('$emailPromo', '$nomePromo')";
  $dados_usuario = mysqli_query($conn, $dados_usuario);
 }


?>


<?php
include_once("conexao.php");

session_start();


  $email = filter_input (INPUT_POST, 'tNomeEmail', FILTER_SANITIZE_EMAIL);
  $senha  = filter_input (INPUT_POST, 'tMailSenha', FILTER_SANITIZE_STRING);


$SQL = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
$result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$total = @mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total)
{
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = @mysqli_fetch_array($result_id);

	// Agora verifica a senha
	if(!strcmp($senha, $dados["senha"]))
	{
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
		$_SESSION["id_usuario"]= $dados["codigo"];
                $cod_usuario = $_SESSION["id_usuario"];
		$_SESSION["nome"] = $dados["nome_cliente"];
		$_SESSION["email"] = $dados["email"];
		$_SESSION["senha"]= $dados["senha"];
		$_SESSION["endereco"]= $dados["endereco"];
		$_SESSION["cep"] = $dados["cep"];
		$_SESSION["cartao"]= $dados["cartao"];
		$_SESSION["validade_cartao"]= $dados["validade_cartao"];
		$_SESSION["cod_cartao"] = $dados["cod_cartao"];
		$_SESSION["cpf_titular"]= $dados["cpf_titular"];
		$_SESSION["nome_cartao"]= $dados["nome_cartao"];
		$_SESSION["telefone"] = $dados["telefone"];
		echo "<div id='alterar_dados'>BEM VINDO! ".strtoupper($dados["nome_cliente"])." :)</div>";



                echo "<table id='botoesOpcoes'>";
                echo "<tr id='colunaBotoes'>";
                echo "<td id='linhaBotoes'>";              
                echo "<form id='' method='POST' action= 'rastrearPedidos.php'>";
                echo "<input type='hidden' name='tCodCliente' value= $cod_usuario >";
                echo "<input type='submit' id='botaoAcesso' name='consultarDados' value='RASTREAR PEDIDO'/>";  
                echo "</form>";
                echo "</td>"; 
                echo "<td id='linhaBotoes'>";  
                echo "<form id='' method='POST' action= 'trocas.php'>";
                echo "<input type='hidden' name='tCodCliente'value= $cod_usuario >";
                echo "<input type='submit' id='botaoAcesso' name='consultarDados' value='TROCAS'/>";  
                echo "</form>";
                echo "</td>"; 
                echo "</tr>";
                echo "</table>";
 
                echo "<table id='botoesOpcoes'>";
                echo "<tr id='colunaBotoes'>";
                echo "<td id='linhaBotoes'>";  
                echo "<form id='' method='POST' action= 'vales.php'>";
                echo "<input type='hidden' name='tCodCliente'value= $cod_usuario >";
                echo "<input type='submit' id='botaoAcesso' name='consultarDados' value='VALES'/>";  
                echo "</form>";
                echo "</td>"; 
                echo "<td id='linhaBotoes'>"; 
                echo "<form method='POST' action='dadosUsuario.php'>";
                echo "<input type='hidden' name='tCodCliente'value= $cod_usuario >";
                echo "<input type='submit' id='botaoAcesso' name='consultarDados' value='DADOS DO USUÁRIO'/>";  
                echo "</form>";
                echo "</td>"; 
                echo "</tr>";
                echo "</table>";
                echo "<form method='POST' action='paginaSenha.php'>";
                echo "<input type='hidden' name='tCodCliente'value= $cod_usuario >";
                echo "<input type='image' id='logout' name='consultarDados' value='' src=''/>";  
                echo "</form>";


		exit;
	}
	// Senha inválida	
	else
	{
	 echo "<div id='alterar_dados2'>SENHA INVALIDA!</div>";
         echo "<form method='POST' action='paginaSenha.php'>";
         echo "<input type='image' id='botaoLogin_2' name='' value='' />";                 
         echo "</form>";
	exit;
	}
}
	// Login inválido
else
{
	echo "<div id='alterar_dados'>LOGIN OU SENHA INCORRETOS!</div>";
        echo "<form method='POST' action='paginaSenha.php'>";
        echo "<input type='image' id='botaoLogin_2' name='' value='' />";                 
        echo "</form>";
	exit;
}
?>





</body>
</html>