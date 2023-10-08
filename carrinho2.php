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
		$id_usuario = $dados["codigo"];
		$nome_usuario = $dados["nome_cliente"];
                $email = $dados["email"];
		$senha = $dados["senha"];
                $endereco = $dados["endereco"];
		$cep = $dados["cep"];
                $cartao = $dados["cartao"];
		$valCartao = $dados["validade_cartao"];
                $cod_cartao = $dados["cod_cartao"];
		$cpf_titular = $dados["cpf_titular"];
                $nome_cartao = $dados["nome_cartao"];
		$telefone = $dados["telefone"];
?>
     <form id="fSenha" method="POST" action= "carrinho_finalizar.php"> <p id="titulo_form">Olá :)</p>
                     <input type="email" name="tCadastroEmail" id="cNomeEmail" value ="<?php echo $email; ?>" disabled="" required /> 
                     <input type="hidden" name="tCadastroEmail" id="cNomeEmail" value ="<?php echo $email; ?>" required /> 
                     <input type="hidden" name="tCadastroCod" id="cNomeEmail" value ="<?php echo $id_usuario; ?>" required /> 
                     <input type="hidden" name="nome_usuario" id="cNomeEmail" value ="<?php echo $nome_usuario; ?>" required /> 
                     <input type="hidden" name="senha" id="cNomeEmail" value ="<?php echo $senha; ?>" required /> 
                     <input type="hidden" name="endereco" id="cNomeEmail" value ="<?php echo $endereco; ?>" required /> 
                     <input type="hidden" name="cep" id="cNomeEmail" value ="<?php echo $cep; ?>" required /> 
                     <input type="hidden" name="cartao" id="cNomeEmail" value ="<?php echo $cartao; ?>" required /> 
                     <input type="hidden" name="valCartao" id="cNomeEmail" value ="<?php echo $valCartao; ?>" required /> 
                     <input type="hidden" name="cod_cartao" id="cNomeEmail" value ="<?php echo $cod_cartao; ?>" required /> 
                     <input type="hidden" name="cpf_titular" id="cNomeEmail" value ="<?php echo $cpf_titular; ?>" required /> 
                     <input type="hidden" name="nome_cartao" id="cNomeEmail" value ="<?php echo $nome_cartao; ?>" required /> 
                     <input type="hidden" name="telefone" id="cNomeEmail" value ="<?php echo $telefone; ?>" required /> 
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" value="CONFIRMAR" />  
</form>
<?php
                exit;
	}
	// Senha inválida
	else
	{ 	 echo "<div id='alterar_dados'>Senha inválida!</div>";
?>

<form id="fSenha" method="POST" action= "carrinho2.php"> <p id="titulo_form">ENTRAR</p>
                     <input type="email" name="tNomeEmail" id="cNomeEmail" placeholder="digite seu email" required / ></p> 
                     <input type="password" name="tMailSenha" id="cMailSenha" placeholder="digite a sua senha" required /></p>  
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
</form> 
<?php
	 echo "<div id='alterar_dados'>Senha inválida!</div>";
?>
<form id="fSenha" method="POST" action= "carrinho2.php"> <p id="titulo_form">ENTRAR</p>
                     <input type="email" name="tNomeEmail" id="cNomeEmail" placeholder="digite seu email" required / ></p> 
                     <input type="password" name="tMailSenha" id="cMailSenha" placeholder="digite a sua senha" required /></p>  
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
<?php
	exit;
	}
}
	// Login inválido
else
{
	echo "<div id='alterar_dados'>O login fornecido por você é inexistente!</div>";
?>
<form id="fSenha" method="POST" action= "carrinho2.php"> <p id="titulo_form">ENTRAR</p>
                     <input type="email" name="tNomeEmail" id="cNomeEmail" placeholder="digite seu email" required / ></p> 
                     <input type="password" name="tMailSenha" id="cMailSenha" placeholder="digite a sua senha" required /></p>  
		     <input type="submit" id="botaoLogin" name="tEnviarLogin" />  
<?php
	exit;
}
?>



</body>

</html>

