<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
   <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body class="fadeIn">
<?php
$conexao = mysqli_connect("localhost", "root", "","cafe_gourmet") or die ("erro_1");
  $sql = "SELECT * FROM produtos WHERE codigo='11'";
  $resultado = mysqli_query($conexao,$sql) or die ("erro_2");
        while ($registro = mysqli_fetch_array($resultado))
         { 
              $id =            $registro['codigo'];
              $nome    =       $registro['nome'];
              $preco =         $registro['preco'];
	      $quant =         $registro['quantidade'];
         }
   mysqli_close($conexao);
			 
?>

<div id="voltar"><a id="linkVoltar" href="paginaProdutos.html" target="janela"><img id="iconeVoltar" src='_imagens/voltar.png' /></a><span id="pagSeguroParc">Afinal, todo mundo ama!</span></div>


<div id="imagemPrdt">
<img id="zoom_01" src='_imagens/imgL.png' data-zoom-image="_imagens/imgLlarge.png"/>
   <p id="nomeProduto"><?php echo $nome?><br/>R$ <?php echo $preco?></p><br/>

 
    <form id="selecionar" method="post" action= "carrinho.php" >
	<input type="hidden" name="id_txt" value="<?php echo $id?>">
	<input type="hidden" name="nome" value="<?php echo $nome?>">
	<input type="hidden" name="preco" value="<?php echo $preco?>">
    <table id="tbEscolha">
	<tr><td>
	QTD:  
   <select id="quantidade" name="quantidade" value="<?php echo $quantidade;?>">
         <?php
            $conexao = mysqli_connect("localhost", "root", "","cafe_gourmet") or die ("erro_1");
            $sql = "SELECT * FROM produtos WHERE codigo='11'";
            $resultado = mysqli_query($conexao,$sql) or die ("erro_2");
                while ($registro = mysqli_fetch_array($resultado))
                   { 

	               $quant =         $registro['quantidade'];

                    }

                        if ($quant == 0)
                           {
                             echo "<option value= 0>produto indisponível</option>";
                             echo "</select>";
	                     echo "</td></tr>";
	                     echo "</table>";

                            } else {
 
                               for ($i=1; $i < $quant+1; $i++) 
                                {
                                  echo "<option value=".$i.">".$i."</option>";
                                }
                             
                                echo "</select>";
	                        echo "</td></tr>";
	                        echo "</table>";
	                        echo "<td>";
                                echo "<input type='submit' name='tEscolher' id='Iescolher' value='ADICIONAR AO CARRINHO'/>";
	                        echo "</td>";
                                }

              mysqli_close($conexao);
			 
?>

	</form> 
  
  </div>
  
  

<table class="informacoesProduto">
     <tr id="tdInformacoesProduto">
    <td id="tituloInformacoesProduto">Informações do Produto</td>
    <td id="tituloInformacoesProduto">Composição</td>
  </tr>
       <tr>
    <td id="textoInformacoesProduto">Runner type: neutral
boost™ is our most responsive cushioning ever: The more energy you give, the more you get
adidas Primeknit upper wraps the foot in adaptive support and ultralight comfort
TORSION® SYSTEM between the heel and forefoot for a stable ride
FITCOUNTER moulded heel counter provides a natural fit that allows optimal movement of the Achilles
Continental™ Rubber outsole for extraordinary grip in wet and dry conditions; STRETCHWEB rubber outsole flexes underfoot for an energised ride
Weight: 280 g (size UK 8.5)
Midsole drop: 10 mm (heel: 29 mm / forefoot: 19 mm)o</td>
    <td id="textoInformacoesProduto" >Take on the miles in these game-changing shoes. Built with a cage-free adidas Primeknit upper for a clean, minimalist feel, they feature boost™'s energy-returning power for a fast, light ride. The flexible and stretchy outsole provides a secure grip in all conditions.</td>
  </tr>
</table> 


<footer id="rodape">
   <p id="empresaProm"> Receba nossas ofertas!</p>

      <form id="promocoes" method="post" action= "produto11.php">
                     <p id="iNomeProm"><label for="cNomeProm">Seu nome:</label></p> <input type="text" name="tNomeProm" id="cNomeProm" /></p> 
                     <p id="iMailProm"><label for="cMailProm">Seu e-mail:</label></p><input type="email" name="tMailProm" id="cMailProm" /></p>  
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
