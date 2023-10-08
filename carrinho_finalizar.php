<?php

$codClientePedido = filter_input (INPUT_POST, 'tCadastroCod', FILTER_SANITIZE_STRING);
$nome_usuario = filter_input (INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
$endereco = filter_input (INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cep = filter_input (INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$telefone = filter_input (INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cartao = "************************";
$email = filter_input (INPUT_POST, 'tCadastroEmail', FILTER_SANITIZE_STRING);
$senhaLogin = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$qtdLinhas;


If (isset($_POST['id_txt'])){    // se existir o envio do name id_txt será inciado o carrinho

  $id = $_POST ['id_txt'];
  $nome = $_POST ['nome'];
  $quantidade = $_POST ['quantidade'];
  $preco = $_POST ['preco']; 
  $meucarrinho[] = array ('id' => $id,'nome' => $nome,'quantidade' => $quantidade,'preco' => $preco); // array do carrinho
}

session_start();  // iniciar a sessão para inclusão dos itens no carrinho sem buscar no banco de dados

If (isset($_SESSION['carrinho'])){
 $meucarrinho = $_SESSION['carrinho'];  // iniciar a sessão de nome carrinho
If (isset($_POST['id_txt'])){


  $id = $_POST ['id_txt'];
  $nome = $_POST ['nome'];
  $quantidade = $_POST ['quantidade'];
  $preco = $_POST ['preco'];
  $pos = -1;                                              // posição diferente da repetição
    for ($i=0; $i < count($meucarrinho); $i++){          // contagem do índice $i que recebe 0 e acrescenta valores $i++
     if ($id == $meucarrinho[$i]['id']){                 // se o id já existir no carrinho
      $pos = $i;                                         // o valor que está na posição irá ser incluido na mesma posição do índice
 } 

}


  if ($pos <> -1) {                                        // se o índice for diferente d a posição -1 
   $quant = $meucarrinho[$pos] ['quantidade'] + $quantidade; 
   $meucarrinho[$pos] = array ('id' => $id,'nome' => $nome,'quantidade' => $quant,'preco' => $preco); // o valor será mantido e somente a quantidade será alterada
 }
  else {

  $meucarrinho[] = array ('id' => $id,'nome' => $nome,'quantidade' => $quantidade,'preco' => $preco);  // senão o novo valor será acrescentado
}


}
}
 else {                                // else caso a sessão não seja iniciada não será feito nada

  echo '';

}

if (isset($_POST['id2'])) {               // o name será recebido e a quantidade será alterada na exibição final do carrinho
  $indice = $_POST['id2'];
 $quant = $_POST['quantidade2'];
  $meucarrinho[$indice]['quantidade'] = $quant;   // valor novo do índice no array posição quantidade
}

if (isset($_POST['id3'])) {              // o name ira enviar a posição do indice que será excluída
     $indice = $_POST['id3'];             // esse valor será recebido pela variável índice
     unset($meucarrinho[$indice]);         //  a posição do valor será excluída
	 $meucarrinho = array_values($meucarrinho);  // o carrinho se reorganiza 

		  
 }
 
 
 if (isset($meucarrinho)) {                   // se o carrinho existir a sessão carrinho será iniciada 

 $_SESSION['carrinho'] = $meucarrinho;

 }
?>          

<!DOCTYPE HTML>                                                   
<html lang="pt-br">                                              
<head>
<meta @charset="UTF-8"/>                                          
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>Sacola de Compras</title>
  <link rel="stylesheet" type="text/css" href="_css/estilo.css"/>   <!-- chamada do estilo css -->
  <link rel="stylesheet" type="text/css" href="_css/form.css"/>
  <link rel="stylesheet" type="text/css" href="css/vendor/normalize.css">
  <link rel="stylesheet" type="text/css" href="dist/gallery.prefixed.css">
  <link rel="stylesheet" type="text/css" href="dist/gallery.theme.css">
  <link rel="shortcut icon" href="_imagens/logopagina.gif">
  

</head>
<body>

 <header id="cabecalho">  <!-- cabecalho  -->
</header>


 
<section id="pesquisa">
 
<div id="interface">


<fieldset id="sacola">

<div id="dadosComprador">Cliente: <?php echo $nome_usuario ?></div>

<table id="carrinho">

              <tr id="carrinho_linhas">
                <td id="nOme">Nome</td>
                <td id="qUant">Quantidade</td>
                <td id="rS">Preço</td>
                <td id="add">Adicionar</td>
                <td id="sTot">Sub Total</td>
                <td id="eXcl">Excluir</td>
             </tr>


<?php
  if(isset($meucarrinho)){   // se a sessão $meucarrinho for iniciada 
     $total = 0;               // valor para total dos produtos
     for($i=0; $i < count($meucarrinho); $i++) {   // índice para inclusão dos itens no carrinho de compras
	 $qtdLinhas = $i+1;  // contador para identificação dos produtos no pagseguro
        IF ($meucarrinho[$i]<>NULL) {   // se o carrinho for diferente de nulo os itens começarão a ser incluídos
	
?>          
   <tr>
                <td id="nOme_bd"><?php echo $meucarrinho[$i]['nome']?></td> <!-- nome do produto  -->
                <td id="qUant_bd"><?php echo $meucarrinho[$i]['quantidade']?></td> <!-- quantidade  -->
                <td id="rS_bd">R$ <?php echo number_format($meucarrinho[$i]['preco'], 2, ',', '.')?></td> <!-- valor  -->
		<td id="add_bd"><form action="" method="post" name="atualizar"> <!-- início do formulário  -->
		<input name="id2" type="hidden" value="<?php echo $i?>"/>  <!-- índice que será enviado, sem exibição na tela, para alterar a quantidade dos produtos   -->
                <input id="atualizar" name="quantidade2" type="text" value="<?php echo $meucarrinho[$i]['quantidade']?>"/> <!-- caixa de texto para incluir número  -->
                <input id="imagem_atualizar" type="image" type="submit" value="Atualizar" src="_imagens/atualizar1.png"/>
                </td>
<?php
    $subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i]['quantidade'];   // soma do preço e quantidade de produtos por linha do índice
    $total = $total + $subtotal; // valor total de todos os produtos



?>
                <td id="sTot_bd">R$ <?php echo number_format($subtotal, 2, ',', '.');?></td> <!-- transformar valor para exibição em decimal -->
                <td id="eXcl_bd"><form action="" method="post">
		        <input name="id3" type="hidden" value="<?php echo $i?>"/>
		        <input id="excluir" type="image" type="submit" value="Excluir" src="_imagens/excluir.png"/>
                </form>
                </td>
            </tr>
<?php
}
}
} 
?>


               <tr>
                <td id="vTot"> &nbsp &nbsp Valor Total:</td>
                <td id="vTot1">R$ <?php if(isset($total)) echo number_format($total, 2, ',', '.'); ?></td>
				 <td id="vTot3"> &nbsp  </td>
				  <td id="vTot3">&nbsp </td>
				   <td id="vTot3"> &nbsp </td>
				    <td id="vTot2"> &nbsp </td>
			   </tr>


     </table>

<div id="dadosComprador">Endereço: <?php echo $endereco ?></div>
<div id="dadosComprador">CEP: <?php echo $cep ?></div>
<div id="dadosComprador">Telefone: <?php echo $telefone ?></div>
<div id="dadosComprador">Cartão: <?php echo $cartao ?></div>

</fieldset>





	<table id="pAgFinal">
	  <tr>
	  <td><a id="continuarComprando" href="paginaProdutos.html">Continuar comprando</a></td>

<form method="POST" action="resumo.php">

<?php


        date_default_timezone_set('America/Sao_Paulo');
        $dataLocal = date('d/m/Y H:i:s', time());

        $input = rand(1,3);
        include_once("conexao.php");

        $SQL = "SELECT * FROM pedido";
        $result_id = @mysqli_query($conn, $SQL) or die("Erro no banco de dados!");
        $linhasOcupadas = @mysqli_num_rows($result_id);
        $numPedidoBD = $linhasOcupadas + 1;

            
           for($i=0; $i < count($meucarrinho); $i++) {  
?>
          <p><input type="hidden" name="codigoProduto" id="" value ="<?php echo $meucarrinho[$i]['id']; ?>" required /> 
          <p><input type="hidden" name="nomeProduto" id="" value ="<?php echo $meucarrinho[$i]['nome']; ?>" required /> 
          <input type="hidden" name="quantidade" id="" value ="<?php echo $meucarrinho[$i]['quantidade']; ?>" required /> 
          <input type="hidden" name="valor" id="" value ="<?php echo number_format($meucarrinho[$i]['preco'], 2, ',', '.'); ?>" required /></p> 


<?php
         $produto = $meucarrinho[$i]['id'];
         $linhaQtd = $meucarrinho[$i]['quantidade'];
         $linhaValor = number_format($meucarrinho[$i]['preco'] * $meucarrinho[$i]['quantidade'], 2, ',', '.');
         $vlTotalCorrigido = number_format($total, 2, ',', '.');
         $cadastrarPedido = "INSERT INTO pedido (codigo, codigo_entregador, codigo_cliente, valor_total, produto, qtd, valor,data) VALUES ('$numPedidoBD', '$input', '$codClientePedido', '$vlTotalCorrigido','$produto','$linhaQtd','$linhaValor','$dataLocal')";
         $cadastrarPedido = mysqli_query($conn, $cadastrarPedido);


         $altQtd = "SELECT * FROM produtos WHERE codigo = '$produto'";
         $result_id = @mysqli_query($conn, $altQtd) or die("Erro no banco de dados!");
         while($user_data = mysqli_fetch_assoc($result_id)){
         $qtdAtual = $user_data['quantidade'];
         $atualizarQtd = $qtdAtual - $meucarrinho[$i]['quantidade'];
         mysqli_query($conn, "UPDATE produtos set quantidade ='$atualizarQtd' WHERE codigo = '$produto'"); // alterar quantidade do estoque         
          
         }
          }





?>
          <p><input type="hidden" name="valorTotal" id="" value ="<?php echo number_format($total, 2, ',', '.'); ?>" required /> </p>
          <input type="hidden" name="endereco" id="" value ="<?php echo $endereco; ?>" required /> 
          <input type="hidden" name="cep" id="" value ="<?php echo $cep; ?>" required /> 
          <input type="hidden" name="telefone" id="" value ="<?php echo $telefone; ?>" required />
          <input type="hidden" name="numeroPedido" id="" value ="<?php echo $numPedidoBD; ?>" required />
          <input type="hidden" name="email" id="" value ="<?php echo $email; ?>" required />
          <input type="hidden" name="senha" id="" value ="<?php echo $senhaLogin; ?>" required />
          <td><input type="submit" id="btnFinalizar" value="Enviar Pedido" /></td>
</form>
       </td>
	  </tr>
	</table>




</section>
	
</div>


 <footer id="rodape">
   <p id="empresaProm"> Receba nossas ofertas!</p>

      <form id="promocoes" method="post" action= "paginaContato.html#tela1">
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