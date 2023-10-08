<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> 
<title>HOME</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="_imagens/logopagina.png">
<style>
* { 
	margin: 0;  /* sem margem */
}

body,html{


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

                     <p id="titulo_contato">CONTATO</p> 

<form id="fContato" method="POST" action= "paginaHome.php">
                     <p id="iNome"><label for="cNome">Seu nome:</label></p> <input type="text" name="tNome" id="cNome" required /></p> 
                     <p id="iMail"><label for="cMail">Seu e-mail:</label></p><input type="email" name="tMail" id="cMail" required /></p>  
                 <fieldset id="mensagem"><legend>Sua Mensagem:</legend> 
                 <textarea name="tMsg" class="cMsg" required >
                 </textarea>
				          
				</fieldset> 
				<input type="submit" id="botao" name="tEnviar" />
               </fieldset>  
				     
</form> 

<?php
include_once("conexao.php");

  $nome = filter_input (INPUT_POST, 'tNome', FILTER_SANITIZE_STRING);
  $email  = filter_input (INPUT_POST, 'tMail', FILTER_SANITIZE_EMAIL);
  $mensagem = filter_input (INPUT_POST, 'tMsg', FILTER_SANITIZE_STRING);


  IF ((empty ($nome)) OR (empty ($email)))  {
  echo "";}
  ELSE {	
  $dados_usuario = "INSERT INTO contato (nome, email, texto) VALUES ('$nome', '$email', '$mensagem')";
  $dados_usuario = mysqli_query($conn, $dados_usuario);
  echo "<div id='dados_contato'>EM BREVE ENTRAREMOS EM CONTATO :)</div>";
  
 }


?>



			
<iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.140962772909!2d-46.50645298502163!3d-23.599276984664012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce67ed20863d03%3A0x1877affe5320a11b!2sR.+Jer%C3%B4nimo+Moravia%2C+121+-+Jardim+Nossa+Senhora+Aparecida%2C+S%C3%A3o+Paulo+-+SP%2C+03939-075!5e0!3m2!1spt-BR!2sbr!4v1486275504135" ></iframe>



  <footer id="rodape">
   <p id="empresaProm"> Receba nossas ofertas!</p>

      <form id="promocoes" method="post" action= "paginaHome.php">
                     <p id="iNomeProm"><label for="cNomeProm">Seu nome:</label></p> <input type="text" name="tNomeProm" id="cNomeProm" required /></p> 
                     <p id="iMailProm"><label for="cMailProm">Seu e-mail:</label></p><input type="email" name="tMailProm" id="cMailProm" required /></p>  
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
