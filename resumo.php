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






<?php
$idProduto = filter_input (INPUT_POST, 'codigoProduto', FILTER_SANITIZE_STRING);
$codClientePedido = filter_input (INPUT_POST, 'tCadastroCodigo', FILTER_SANITIZE_STRING);
$tCadastroNome = filter_input (INPUT_POST, 'nomeProduto', FILTER_SANITIZE_STRING);
$quantidade = filter_input (INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
$valor = filter_input (INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
$valorTotal = filter_input (INPUT_POST, 'valorTotal', FILTER_SANITIZE_STRING);
$endereco = filter_input (INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cep = filter_input (INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$telefone = filter_input (INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$pedido = filter_input (INPUT_POST, 'numeroPedido', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


?>

<div id="numPedidoExibir">
<p>PEDIDO FINALIZADO COM SUCESSO!</p>
<p>NÚMERO DO PEDIDO: <?php echo $pedido?></p>
</div>


<form id="" method="POST" action= "paginaAutenticacao.php">
<input type="hidden" name="tCodCliente" value= "<?php echo $codClientePedido; ?>">
<input type="hidden" name="tNomeEmail" value= "<?php echo $email; ?>">
<input type="hidden" name="tMailSenha" value= "<?php echo $senha; ?>">
<input type="submit" id="botaoLoginExibir" name="tEnviarLogin" value="CENTRAL DO CLIENTE"/>
</form>


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