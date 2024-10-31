<?php

session_start();

$html = ''; // Inicialize a variável


if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    //Destrói
    session_destroy();
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    
    //Redireciona para a página de autenticação
    header('location:..\index.php');
}

include('../../include/conexao.php');

if (isset($_GET['id'])) {

    $requisitante = $_GET['id'];
    $datahoje = date("d/m/y H:i:s");

    // Usando prepared statements para prevenir SQL Injection
    $stmt = $conexao->prepare("SELECT r.nome, s.nome as 'setor', s.sigla as 'sigla' FROM retirante as r, setor as s WHERE r.id_retirante = :requisitante AND r.setor = s.id_setor");
    $stmt->bindParam(':requisitante', $requisitante, PDO::PARAM_INT);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $nomeRetirante = utf8_encode($row["nome"]);
        $setorRetirante = utf8_encode($row["sigla"] . " - " . $row["setor"]);
    }



   $html .= '<html>
   <head>
   <table border="1"  style="width:100%">
   <tbody>
   <tr>
   <td width="100"> <center> <img class="profile-img" src="../../img/brasao.png" width="60" height="60"></center></td>
   <td colspan="4">GOVERNO DO ESTADO DO ACRE <br>IMAC- INSTITUTO DO MEIO AMBIENTE DO ACRE<br>SETOR DE  MATERIAL E PATRIMÔNIO <br></td>
   </tr>
   </tbody>
   </table>

   <table border="1"  style="width:100%">
   <tbody>
   <tr >
   <td colspan="3">Requisição de Material</td>
   <td width="180">DATA: '.$datahoje.'</td>
   </tr>
   
   </tbody>
   </table>
   
   <table border="1"  style="width:100%">
   <tbody>
   <tr>
   <td width="50">Item</td>
   <td colspan="2"><center>DISCRIMINAÇÃO DO MATERIA L</center></td>
   <td width="50"> Quantidade</td>
   </tr>

   </tbody>
   </table>

   <table border="1"  style="width:100%">
   <tbody>';




   $item=0;

   $rs2 = $conexao->query(" SELECT c.quantidade, p.nome as 'produto'  FROM card as c, produto as p WHERE c.retirante='$requisitante' and c.produto=p.id_produto ");

   while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)) {  
     
       $produtoSair=utf8_encode($row2["produto"]);
       $quantidadeSair=$row2["quantidade"];

       $item++;



       $html .='<tr>
       <td width="50"><center>'.$item.'</center></td>
       <td colspan="2" width="410">'.$produtoSair.' </td>
       <td><center>'.$quantidadeSair.'</center></td>
       </tr>';


   }  

   $html .=' </tbody>
   </table>

   <table border="1"  style="width:100%">
   <tbody>
   <tr>
   <td colspan="4" >SETOR REQUISITANTE: <b>'.$setorRetirante.'</b>
   <br><br>
   </td>   
   </tr>
   
   <tr>
   <td colspan="3">REQUISITANTE:<br>
   <center><a>__________________________</a></center>
   <center><a><b>'.$nomeRetirante.'</b></a></center> 
   </td>
   <td width="200">Autorizado por:<br> <b>'.$_SESSION['nome'].' </b><br><br></td>
   </tr>
   
   </tbody>
   </table>

   <table border="1"  style="width:100%">
   <tbody>
   </tr>
   <tr>
   <td colspan="4"><br><br><br></td>	
   </tr>
   </tbody>
   </table>

   </body>
   </html>';

   $KO="ok";
}



if($KO=="ok"){

   $rs = $conexao->query("SELECT id_card, retirante, produto, quantidade, data FROM card WHERE retirante='$requisitante' ");                                
   while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {  

    $idcard=$row["id_card"];
    $retirante=$row["retirante"];
    $produto=$row["produto"];
    $quantidade=$row["quantidade"];
    $data=$row["data"]; 

    
    $rs2 = $conexao->query("SELECT categoria FROM produto WHERE id_produto='$produto' "); 
    while ($row2 = $rs2->fetch(PDO::FETCH_ASSOC)) {  
        $categoria=$row2["categoria"];    
    }

    $query = "INSERT INTO saida (data,categoria,produto,retirante, quantidade) VALUES (:data,:categoria,:produto,:retirante,:quantidade)";
    $statement1 = $conexao->prepare($query);
    $statement1->execute(
      array(
        'data' => $data,  
        'categoria' => $categoria, 
        'produto' => $produto, 
        'retirante' => $retirante,
        'quantidade' => $quantidade,       
        )
      );          
}
$rs3 = $conexao->query("DELETE FROM card WHERE retirante='$requisitante'"); 
}



//==============================================================
//==============================================================
//==============================================================

include("../../mpdf60/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('/css/mpdfstyleA4.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
//==============================================================
//==============================================================
//==============================================================



echo "<meta http-equiv=\"refresh\" content=\"0;url=test.php\">";
?>
