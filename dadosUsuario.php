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
$total = @mysqli_num_rows($result_id);

	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = @mysqli_fetch_array($result_id);

		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
                $cod_usuario = $dados["codigo"];
                $nome = $dados["nome_cliente"];
                $email = $dados["email"];
                $senha = $dados["senha"];
                $endereco = $dados["endereco"];
                $cep = $dados["cep"];
                $cartao = $dados["cartao"];
                $validade = $dados["validade_cartao"];
                $codigo_cartao = $dados["cod_cartao"];
                $cpf = $dados["cpf_titular"];
                $titular = $dados["nome_cartao"];
                $tel = $dados["telefone"];

?>
                <form method='POST' action='dadosUsuario.php'>
                     <input type="hidden" name="tCadastroCodigo" id="cNomeEmail" value ="<?php echo $cod_usuario; ?>" required /> 
                     <input type="text" name="tCadastroNome" id="cNomeEmail" value ="<?php echo $nome; ?>" required /> 
                     <input type="email" name="tCadastroEmail" id="cNomeEmail" value ="<?php echo $email; ?>" required />
                     <input type="text" name="tCadastroSenha" id="cNomeEmail" value ="<?php echo $senha; ?>" required /> 
                     <input type="text" name="tCadastroEndereco" id="cNomeEmail" value ="<?php echo $endereco; ?>" required /> 
                     <input type="number" name="tCadastroCep" id="cNomeEmail" value ="<?php echo $cep; ?>" required />
                     <input type="number" name="tCadastroCartao" id="cNomeEmail" value ="<?php echo $cartao; ?>" required />
                     <input type="number" name="tCadastroVl" id="cNomeEmail" value ="<?php echo $validade; ?>" required />
                     <input type="number" name="tCadastroCdCt" id="cNomeEmail" value ="<?php echo $codigo_cartao; ?>" required /> 
                     <input type="number" name="tCadastroCpf" id="cNomeEmail" value ="<?php echo $cpf; ?>" required />
                     <input type="text" name="tCadastroTitular" id="cNomeEmail" value ="<?php echo $titular; ?>" required />
                     <input type="tel" name="tCadastroTel" id="cNomeEmail" value ="<?php echo $tel; ?>" required />
                     <input type="submit" id="botaoLogin_1" name="tEnviarLogin" value="ALTERAR" />
                </form>

  <form method="POST" action="paginaAutenticacao.php">
                     <input type="hidden" name="tNomeEmail" id="cNomeEmail" value ="<?php echo $email; ?>" required />
                     <input type="hidden" name="tMailSenha" id="tMailSenha" value ="<?php echo $senha; ?>" required />         
                     <input type="image" id="botaoLogin_2" name="tEnviarLogin" value="" src=""/>             
  </form>

<?php

}
?>


<?php
If (isset($_POST['tCadastroCodigo'])){
         $id = $_POST["tCadastroCodigo"];
         $nomeEditado = $_POST["tCadastroNome"];
         $emailEditado = $_POST["tCadastroEmail"];
         $senhaEditado = $_POST["tCadastroSenha"];
         $enderecoEditado = $_POST["tCadastroEndereco"];
         $cepEditado = $_POST["tCadastroCep"];
         $cartaoEditado = $_POST["tCadastroCartao"];
         $validadeEditado = $_POST["tCadastroVl"];
         $codigo_cartaoEditado = $_POST["tCadastroCdCt"];
         $cpfEditado = $_POST["tCadastroCpf"];
         $titularEditado = $_POST["tCadastroTitular"];
         $telEditado = $_POST["tCadastroTel"];

        echo "$id";

        include_once("conexao.php");
          
         $SQL = "UPDATE * FROM cliente WHERE codigo = '$id'";
         mysqli_select_db($conn,"cafe_gourmet") or die("Erro no banco de dados!");

         mysqli_query($conn, "UPDATE cliente set nome_cliente ='$nomeEditado', email='$emailEditado', senha='$senhaEditado', endereco='$enderecoEditado', cep='$cepEditado', cartao='$cartaoEditado', validade_cartao='$validadeEditado', cod_cartao='$codigo_cartaoEditado', cpf_titular='$cpfEditado' , nome_cartao='$titularEditado' , telefone='$telEditado' WHERE codigo = '$id'");


?>

                <form method='POST' action='paginaAutenticacao.php'>
                     <input type="hidden" name="tNomeEmail" id="cNomeEmail" value ="<?php echo $emailEditado; ?>" required />
                     <input type="hidden" name="tMailSenha" id="tMailSenha" value ="<?php echo $senhaEditado; ?>" required />         
                     <input type="image" id="botaoLogin_2" name="tEnviarLogin" value="VOLTAR" src="_imagens/voltar.png"/>                
                </form>
<div id="alterar_dados">DADOS ALTERADOS COM SUCESSO!</div>

<?php

} 	
?>

<footer id="rodape">
   <p id="empresaProm"> Receba nossas ofertas!</p>

      <form id="promocoes" method="post" action= "paginaHome.php">
                     <p id="iNomeProm"><label for="cNomeProm">Seu nome:</label></p> <input type="text" name="tNomeProm" id="cNomeProm" /></p> 
                     <p id="iMailProm"><label for="cMailProm">Seu e-mail:</label></p><input type="email" name="tMailProm" id="cMailProm" /></p>  
                 </textarea>
				          
					<input type="submit" id="botaoProm" name="tEnviar" />
				     
      </form> 

   </footer>

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











