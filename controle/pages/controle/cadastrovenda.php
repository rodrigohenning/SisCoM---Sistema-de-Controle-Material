<?php
if($_SESSION['nome']==""){
  echo '<meta http-equiv="refresh" content="0;url=/projetovendas/">';  
}


include('../include/conexao.php');



   if(isset($_POST['radios'])){

   	$radios=$_POST['radios'];


   	if ($radios==1) {

   		$clienteF=$_GET['id'];                            
   		$dataF=$_POST['data_compra'];


                                    //somar compra
   		$valorT=0.0;
   		$valorF=0.0;

   		$rs1 = $conexao->query("SELECT  id_carrinho, id_cliente, id_produto, data FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   		while ($row1 = $rs1->fetch(PDO::FETCH_ASSOC)) {  

   			$idprodutocarrinho=$row1["id_produto"];  

   			$rs2 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   			while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)) {

   				$valorF=$valorF+$row2["valor"];
   			}        
   		}               


   		$query = "INSERT INTO vendas (id_cliente, tipo_pagamento, valor_venda, valor_pago, data) VALUES (:id_cliente, :tipo_pagamento, :valor_venda, :valor_pago, :data)";
   		$statement = $conexao->prepare($query);
   		$statement->execute(
   			array(

   				'id_cliente' => $clienteF,
   				'tipo_pagamento' => $radios,    
   				'valor_venda' => $valorF, 
   				'valor_pago' => $valorF,
   				'data' => $dataF,          
   				)
   			);

   		if($statement){

   			$rs = $conexao->query("SELECT  id_venda FROM vendas WHERE id_cliente='$clienteF' and data='$dataF'");

   			while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

   				$idVenda=$row["id_venda"];  

   			}  


   			$rs3 = $conexao->query("SELECT  id_carrinho, id_cliente,id_produto FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   			while ($row3 = $rs3->fetch(PDO::FETCH_ASSOC)) {  

   				$idprodutocarrinho=$row3["id_produto"];  

   				$rs4 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   				while ($row4 = $rs4->fetch(PDO::FETCH_ASSOC)) {

   					$valorp=$row4["valor"];
   				}      

   				$query = "INSERT INTO venda_produtos (id_venda, id_cliente, id_produto, valor_produto) VALUES (:id_venda, :id_cliente, :id_produto, :valor_produto)";
   				$statementF = $conexao->prepare($query);
   				$statementF->execute(
   					array(
   						'id_venda' => $idVenda,
   						'id_cliente' => $clienteF, 
   						'id_produto' => $idprodutocarrinho,
   						'valor_produto' => $valorp,            
   						)
   					);


   				if($statementF){
   					$rs = $conexao->query("DELETE FROM carrinho_compras WHERE id_cliente='$clienteF'");   

                                        //echo '<div class="sucesso">cadastrado com sucesso!</div>';
   					$status="Venda Cadastrada com sucesso!";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 

   				}else{
                                        //echo '<div class="naosucesso">Não cadastrado</div>';
   					$status="Não cadastrado";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 
   				}

   			} 
   		}

   	} 

   	if ($radios==2) {
                                      #A prazo com entrada

   		$clienteF=$_GET['id'];                            
   		$dataF=$_POST['data_compra']; 
   		$valorEntrada = str_replace(",",".", $_POST['valorentrada']);

                                    //somar compra
   		$valorT=0.0;
   		$valorF=0.0;

   		$rs1 = $conexao->query("SELECT  id_carrinho, id_cliente, id_produto, data FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   		while ($row1 = $rs1->fetch(PDO::FETCH_ASSOC)) {  

   			$idprodutocarrinho=$row1["id_produto"];  

   			$rs2 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   			while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)) {

   				$valorF=$valorF+$row2["valor"];
   			}        
   		}               


   		$query = "INSERT INTO vendas (id_cliente, tipo_pagamento, valor_venda, valor_pago, data) VALUES (:id_cliente, :tipo_pagamento, :valor_venda, :valor_pago, :data)";
   		$statement = $conexao->prepare($query);
   		$statement->execute(
   			array(

   				'id_cliente' => $clienteF,
   				'tipo_pagamento' => $radios,    
   				'valor_venda' => $valorF, 
   				'valor_pago' => $valorEntrada,
   				'data' => $dataF,          
   				)
   			);



   		if($statement){

   			$rs = $conexao->query("SELECT  id_venda FROM vendas WHERE id_cliente='$clienteF' and data='$dataF'");

   			while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

   				$idVenda=$row["id_venda"];  

   			}  


   			$rs3 = $conexao->query("SELECT  id_carrinho, id_cliente,id_produto FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   			while ($row3 = $rs3->fetch(PDO::FETCH_ASSOC)) {  

   				$idprodutocarrinho=$row3["id_produto"];  

   				$rs4 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   				while ($row4 = $rs4->fetch(PDO::FETCH_ASSOC)) {

   					$valorp=$row4["valor"];
   				}      
   			
   				$query = "INSERT INTO venda_produtos (id_venda, id_cliente, id_produto, valor_produto) VALUES (:id_venda, :id_cliente, :id_produto, :valor_produto)";
   				$statementF = $conexao->prepare($query);
   				$statementF->execute(
   					array(
   						'id_venda' => $idVenda,
   						'id_cliente' => $clienteF, 
   						'id_produto' => $idprodutocarrinho,
   						'valor_produto' => $valorp,            
   						)
   					);

   				}
   				$query = "INSERT INTO titulos (id_venda, id_cliente, valor_titulo, data_titulo, quitado) VALUES (:id_venda, :id_cliente, :valor_titulo, :data_titulo, :quitado)";
   				$statementT = $conexao->prepare($query);
   				$statementT->execute(
   					array(
   						'id_venda' => $idVenda,
   						'id_cliente' => $clienteF, 
   						'valor_titulo' => ($valorF-$valorEntrada),
   						'data_titulo' => $dataF,
   						'quitado' => "nao",            
   						)
   					);


   				if($statementT){
   					$rs = $conexao->query("DELETE FROM carrinho_compras WHERE id_cliente='$clienteF'");   

                                        //echo '<div class="sucesso">cadastrado com sucesso!</div>';
   					$status="Venda Cadastrada com sucesso!";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 

   				}else{
                                        //echo '<div class="naosucesso">Não cadastrado</div>';
   					$status="Não cadastrado";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 
   				}


   		}                                      

   	}

   	if ($radios==3) {
                                      #A prazo sem entrada


   		$clienteF=$_GET['id'];                            
   		$dataF=$_POST['data_compra']; 
   		$valorEntrada = 0;

                                    //somar compra
   		$valorT=0.0;
   		$valorF=0.0;

   		$rs1 = $conexao->query("SELECT  id_carrinho, id_cliente, id_produto, data FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   		while ($row1 = $rs1->fetch(PDO::FETCH_ASSOC)) {  

   			$idprodutocarrinho=$row1["id_produto"];  

   			$rs2 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   			while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)) {

   				$valorF=$valorF+$row2["valor"];
   			}        
   		}               


   		$query = "INSERT INTO vendas (id_cliente, tipo_pagamento, valor_venda, valor_pago, data) VALUES (:id_cliente, :tipo_pagamento, :valor_venda, :valor_pago, :data)";
   		$statement = $conexao->prepare($query);
   		$statement->execute(
   			array(

   				'id_cliente' => $clienteF,
   				'tipo_pagamento' => $radios,    
   				'valor_venda' => $valorF, 
   				'valor_pago' => $valorEntrada,
   				'data' => $dataF,          
   				)
   			);

   		if($statement){

   			$rs = $conexao->query("SELECT  id_venda FROM vendas WHERE id_cliente='$clienteF' and data='$dataF'");

   			while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

   				$idVenda=$row["id_venda"];  

   			}  


   			$rs3 = $conexao->query("SELECT  id_carrinho, id_cliente,id_produto FROM carrinho_compras WHERE id_cliente='$clienteF' ");

   			while ($row3 = $rs3->fetch(PDO::FETCH_ASSOC)) {  

   				$idprodutocarrinho=$row3["id_produto"];  

   				$rs4 = $conexao->query("SELECT id_produto, descricao, valor FROM produto WHERE id_produto='$idprodutocarrinho' ");

   				while ($row4 = $rs4->fetch(PDO::FETCH_ASSOC)) {

   					$valorp=$row4["valor"];
   				}      
   			
   				$query = "INSERT INTO venda_produtos (id_venda, id_cliente, id_produto, valor_produto) VALUES (:id_venda, :id_cliente, :id_produto, :valor_produto)";
   				$statementF = $conexao->prepare($query);
   				$statementF->execute(
   					array(
   						'id_venda' => $idVenda,
   						'id_cliente' => $clienteF, 
   						'id_produto' => $idprodutocarrinho,
   						'valor_produto' => $valorp,            
   						)
   					);

   				} 
   				
   				$query = "INSERT INTO titulos (id_venda, id_cliente, valor_titulo, data_titulo, quitado) VALUES (:id_venda, :id_cliente, :valor_titulo, :data_titulo, :quitado)";
   				$statementT = $conexao->prepare($query);
   				$statementT->execute(
   					array(
   						'id_venda' => $idVenda,
   						'id_cliente' => $clienteF, 
   						'valor_titulo' => ($valorF-$valorEntrada),
   						'data_titulo' => $dataF,
   						'quitado' => "nao",            
   						)
   					);


   				if($statementT){
   					$rs = $conexao->query("DELETE FROM carrinho_compras WHERE id_cliente='$clienteF'");   

                                        //echo '<div class="sucesso">cadastrado com sucesso!</div>';
   					$status="Venda Cadastrada com sucesso!";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 

   				}else{
                                        //echo '<div class="naosucesso">Não cadastrado</div>';
   					$status="Não cadastrado";
   					echo "<meta http-equiv=\"refresh\" content=\"0;url=vendas.php?status=".$status."\">"; 
   				}

   			
   		} 




   	}


   }
   ?>

