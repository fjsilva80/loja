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


If (isset($_POST['tCadastroNome'])){    // se existir o envio do name tCadastroNome será inciado
  $nome = $_POST ['tCadastroNome'];
  $email = $_POST ['tCadastroEmail'];
  $senha = $_POST ['tCadastroSenha'];
?>

<form id="fCadastro_2" method="POST" action= "finalizacaoCadastro.php"> <p id="titulo_form">CADASTRAR</p>
                     <input type="text" name="tCadastroNome" id="cNomeEmail" value="<?php echo $nome?>" required /> 
                     <input type="email" name="tCadastroEmail" id="cNomeEmail" value="<?php echo $email?>" required />
                     <input type="password" name="tCadastroSenha" id="cNomeEmail" value="<?php echo $senha?>" required /> 
                     <input type="text" name="tCadastroEndereco" id="cNomeEmail" placeholder="*digite seu endereço" required /> 
                     <input type="number" name="tCadastroCep" id="cNomeEmail" placeholder="*digite seu cep" required /> 
                     <input type="number" name="tCadastroCartao" id="cNomeEmail" placeholder="*digite o número do seu cartão" required /> 
                     <input type="number" name="tCadastroVl" id="cNomeEmail" placeholder="*digite a validade do seu cartão" required /> 
                     <input type="password" name="tCadastroCdCt" id="cNomeEmail" placeholder="*digite o codigo do seu cartão" required /> 
                     <input type="number" name="tCadastroCpf" id="cNomeEmail" placeholder="*digite o CPF do titular do cartão" required /> 
                     <input type="text" name="tCadastroTitular" id="cNomeEmail" placeholder="*digite o nome do titular do seu cartão" required /> 
                     <input type="tel" name="tCadastroTel" id="cNomeEmail" placeholder="*digite o telefone para contato" required /> 
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
                     <p id="titulo_form">* Campos obrigatórios</p>
</form> 

<?php

} 

?>


<form method="POST" action="paginaSenha.php">
  <input type="image" id="botaoLogin_2" name="" value="" />                 
  </form>

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