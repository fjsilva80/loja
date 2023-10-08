<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" /> 
<title>HOME</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="_imagens/logopagina.png">
</head>

<body class="fadeIn">


<article id="tela1">

 <img id="imagemSlide3" src="_imagens/fotoA.png"/>

<header class="codrops-header">
				<h1>Afinal, todo mundo ama!</h1>
</header> 


<?php

If (isset($_POST['codPedido'])){


$CodPedido = filter_input (INPUT_POST, 'codPedido', FILTER_SANITIZE_STRING);
$CodCliente = filter_input (INPUT_POST, 'codCliente', FILTER_SANITIZE_STRING);

function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}

$pedido = limpar_texto($CodPedido);

include_once("conexao.php");


$SQL = "SELECT * FROM pedido 
INNER JOIN entregador e ON pedido.codigo_entregador = e.codigo
INNER JOIN cliente c ON pedido.codigo_cliente = c.codigo
INNER JOIN produtos p ON pedido.produto = p.codigo
WHERE pedido.codigo = '$pedido'";
$result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$total = @mysqli_num_rows($result_id);

   echo "número do pedido: ".$pedido; 
   
         while($user_data = mysqli_fetch_assoc($result_id)){
         echo "<table id='notaProduto'>";
         echo "<tr id= 'colunaNotaProduto'>";
          echo "<td id= 'colunaNotaProduto'> código: ".$user_data['produto']."</td>";
          echo "<td id= 'colunaNotaProduto2'> ".$user_data['nome']."</td>";
           echo "<td id= 'colunaNotaProduto'> unidade: R$ ".$user_data['valor']/$user_data['qtd']."</td>"; 
           echo "<td id= 'colunaNotaProduto'> quantidade: ".$user_data['qtd']."</td>"; 
           echo "<td id= 'colunaNotaProduto'> valor R$ ".$user_data['valor']."</td>"; 
           echo "</tr>";
          echo "</table>";
           $entregador = $user_data['nome_entregador'];        
           $cliente = $user_data['nome_cliente']; 
           $valor_total = $user_data['valor_total'];
         }
   echo "<table id='notaProduto2'>";
   echo "<tr id= 'colunaNotaProduto'>";
   echo "<td id= 'colunaNotaProduto'> Entregador: ".$entregador."</td>";
   echo "</tr>";
  echo "<tr>";
   echo "<td id= 'colunaNotaProduto'> Cliente: ".$cliente."</td>";
   echo "</tr>";
  echo "<tr>";
   echo "<td id= 'colunaNotaProduto'> Valor total: R$ ".$valor_total."</td>";
   echo "</tr>";
  echo "<tr>";
   echo "<td id= 'colunaNotaProduto'> STATUS DO PAGAMENTO: CONFIRMADO</td>";
   echo "</tr>";
  echo "<tr id= 'colunaNotaProduto'>";
        date_default_timezone_set('America/Sao_Paulo');

$now = new DateTime(); // data/hora atual
$now->add(new DateInterval('PT30M')); // somar 1 hora
$data_pagamento = $now->format('H:i:s');

   echo "<td id= 'colunaNotaProduto'> STATUS DA ENTREGA: A CAMINHO / PREVISÃO DE ENTREGA: ".$data_pagamento;"</td>";
   echo "</tr>";
   echo "</table>";


}


$SQL = "SELECT * FROM cliente WHERE codigo = '$CodCliente'";
$result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
$total = @mysqli_num_rows($result_id);

	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$dados = @mysqli_fetch_array($result_id);

		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário
                $email = $dados["email"];
                $senha = $dados["senha"];
?>


                <form method='POST' action='paginaAutenticacao.php'>
                     <input type="hidden" name="tNomeEmail" id="cNomeEmail" value ="<?php echo $email; ?>" required />
                     <input type="hidden" name="tMailSenha" id="tMailSenha" value ="<?php echo $senha; ?>" required />         
                     <input type="image" id="botaoLogin_2" name="tEnviarLogin" value="VOLTAR" src="_imagens/voltar.png"/>                
                </form>



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

