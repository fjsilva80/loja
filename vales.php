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

If (isset($_POST['tCodCliente'])){
include_once("conexao.php");

$tCodCliente = filter_input (INPUT_POST, 'tCodCliente', FILTER_SANITIZE_STRING);



$SQL = "SELECT * FROM cliente WHERE codigo = '$tCodCliente'";
$result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");

$dados = @mysqli_fetch_array($result_id);

$email = $dados["email"];
$senha = $dados["senha"];



?>
 <form method='POST' action='paginaAutenticacao.php'>
  <input type="hidden" name="tNomeEmail" id="cNomeEmail" value ="<?php echo $email; ?>" required />
  <input type="hidden" name="tMailSenha" id="tMailSenha" value ="<?php echo $senha; ?>" required />         
  <input type="image" id="botaoLogin_2" name="tEnviarLogin" value="" src=""/>                 
  </form>

<?php
}
?>


<div id="alterar_dados">NÃO HÁ VALES!</div>

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


<article id="tela1">

 <img id="imagemSlide3" src="_imagens/fotoB.jpg"/>

<header class="codrops-header">
				<h1>Afinal, todo mundo ama!</h1>
			</header> 

</article>

</body>

</html>
