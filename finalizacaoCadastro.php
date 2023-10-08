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

 <img id="imagemSlide3" src="_imagens/fotoA.png"/>

<header class="codrops-header">
				<h1>Afinal, todo mundo ama!</h1>
			</header> 

</article>

<?php

include_once("conexao.php");

  $nome = filter_input (INPUT_POST, 'tCadastroNome', FILTER_SANITIZE_STRING);
  $email = filter_input (INPUT_POST, 'tCadastroEmail', FILTER_SANITIZE_EMAIL);
  $senha = filter_input (INPUT_POST, 'tCadastroSenha', FILTER_SANITIZE_STRING);
  $endereco = filter_input (INPUT_POST, 'tCadastroEndereco', FILTER_SANITIZE_STRING);
  $cep = filter_input (INPUT_POST, 'tCadastroCep', FILTER_SANITIZE_STRING);
  $cartao = filter_input (INPUT_POST, 'tCadastroCartao', FILTER_SANITIZE_STRING);
  $validade = filter_input (INPUT_POST, 'tCadastroVl', FILTER_SANITIZE_STRING);
  $codigo = filter_input (INPUT_POST, 'tCadastroCdCt', FILTER_SANITIZE_STRING);
  $cpf = filter_input (INPUT_POST, 'tCadastroCpf', FILTER_SANITIZE_STRING);
  $titular = filter_input (INPUT_POST, 'tCadastroTitular', FILTER_SANITIZE_STRING);
  $tel = filter_input (INPUT_POST, 'tCadastroTel', FILTER_SANITIZE_STRING);



     $SQL = "SELECT * FROM cliente WHERE email = '$email'";
     $result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
     $total = @mysqli_num_rows($result_id);

     
     if ($total > 0){ 
        echo "<div id='msgDiv'>EMAIL JÁ CADASTRADO!</div>";
        echo "<form method='POST' action='paginaSenha.php'>";
        echo "<input type='image' id='botaoLogin_2' name='' value='' />";                 
        echo "</form>";
        
      } else {
        $dados_usuario = "INSERT INTO cliente (nome_cliente, email, senha, endereco, cep, cartao, validade_cartao, cod_cartao, cpf_titular, nome_cartao, telefone) VALUES ('$nome', '$email', '$senha', '$endereco', '$cep', '$cartao', '$validade', '$codigo', '$cpf', '$titular', '$tel')";
        $dados_usuario = mysqli_query($conn, $dados_usuario);
        echo "<div id='msgDiv'>Dados cadastrados com sucesso!</div>";
        echo "<form method='POST' action='paginaSenha.php'>";
        echo "<input type='image' id='botaoLogin_2' name='' value='' />";                 
        echo "</form>";
        }

?>

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




</body>
</html>