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

<form id="fCadastro" method="POST" action= "paginaCadastro.php"> <p id="titulo_form">CADASTRAR</p>
                     <input type="text" name="tCadastroNome" id="cNomeEmail" placeholder="* digite seu nome" required /></p> 
                     <input type="email" name="tCadastroEmail" id="cNomeEmail" placeholder="* digite seu email" required /></p> 
                     <input type="password" name="tCadastroSenha" id="cMailSenha" placeholder="* digite uma senha" required /></p>  
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
                     <p id="titulo_form">* Campos obrigatórios</p>
</form> 



<form id="fSenha" method="POST" action= "paginaAutenticacao.php"> <p id="titulo_form">ENTRAR</p>
                     <input type="email" name="tNomeEmail" id="cNomeEmail" placeholder="digite seu email" required / ></p> 
                     <input type="password" name="tMailSenha" id="cMailSenha" placeholder="digite a sua senha" required /></p>  
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
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
                     <p id="iNomeProm"><label for="cNomeProm">Seu nome:</label></p> <input type="text" name="tNomeProm" id="cNomeProm" required  /></p> 
                     <p id="iMailProm"><label for="cMailProm">Seu e-mail:</label></p><input type="email" name="tMailProm" id="cMailProm" required  /></p>  
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
