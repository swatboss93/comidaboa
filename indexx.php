<?php
include "bd.php";

if(isset($_GET['tipo']))
{
 $categoria = $_GET['tipo'];

 $receitas = array();

 if(strcmp($categoria,"recentes")==0)
  $receitas = buscar_receitas_recentes($conexao);
else if(strcmp($categoria,"votadas")==0)
  $receitas = buscar_receitas_mais_votadas($conexao);

   //$receitas['avaliacao'] = buscar_avaliacao_media($conexao, $receitas['id_receita']);
   //$receitas['qtd_avaliacoes'] = conta_avaliacoes($conexao, $receitas['id_receita']);

$jsonReceitas = array();
foreach ($receitas as $receita):
  /*
            echo '<br> NOME DA RECEITA: ';
            echo $receita['nome_receita'];
            echo '<br>IMG: ';
             
             echo $parts[0];
             echo '<br>CATEgoria';
             echo $receita['categorias_receita'];
             echo '<br>ID REC: ';
             echo $receita['id_receita'];
             echo '<br>AVALIACAO';
             echo buscar_avaliacao_media($conexao, $receita['id_receita']);
*/
             $parts = explode ('&', $receita['imagens_receita']);
             $avaliacao = buscar_avaliacao_media($conexao, $receita['id_receita']);
             if($avaliacao == null)
              $avaliacao = 'S.N';

            $jsonReceitas[] = array('nome'=>$receita['nome_receita'],'categorias'=>$receita['categorias_receita'],'avaliacao'=>$avaliacao,'imagem'=>$parts[0],'id_receita'=>$receita['id_receita']);

            endforeach;

            echo '{';
            for($i=0;$i<count($jsonReceitas);$i++)
            {
              $rand = '"'.$i.'":';
              echo $rand; echo json_encode($jsonReceitas[$i]);
              
              if($i != count($jsonReceitas)-1)
                echo ',';
            }
            echo '}';

          }