<?php
include "bd.php";

if(isset($_GET['categoria']))
{
 $categoria = $_GET['categoria'];

 if(strcmp($categoria,"bolosetortas")==0) 
  $categoria = "Bolos e tortas";


$receitas = array();
$receitas = buscar_receitas_categoria($conexao, $categoria);

   //$receitas['avaliacao'] = buscar_avaliacao_media($conexao, $receitas['id_receita']);
   //$receitas['qtd_avaliacoes'] = conta_avaliacoes($conexao, $receitas['id_receita']);

$jsonReceitas = array();
foreach ($receitas as $receita):
           /* echo '<br> NOME DA RECEITA: ';
            echo $receita['nome_receita'];
             echo '<br>';
*/
             $parts = explode ('&', $receita['imagens_receita']); /*
             echo $parts[0];
             //echo '<br>';
             //echo $receita['imagens_receita'];
             echo '<br>ID REC: ';
             echo $receita['id_receita'];
             echo '<br>';
             //echo $receita['tb_usuario_id_usuario'];
             echo buscar_nome_usuario_pelo_id($conexao, $receita['tb_usuario_id_usuario']);
             echo '<br>';
             echo buscar_avaliacao_media($conexao, $receita['id_receita']);
             echo '<br>';
             echo conta_avaliacoes($conexao, $receita['id_receita']);

*/
             $avaliacao = buscar_avaliacao_media($conexao, $receita['id_receita']);
             if($avaliacao == null)
              $avaliacao = 'S.N';

            $jsonReceitas[] = array('imagem'=>$parts[0],'nome'=>$receita['nome_receita'],'avaliacao'=>$avaliacao,'qtd_avaliacao'=>conta_avaliacoes($conexao, $receita['id_receita']),'autor'=>buscar_nome_usuario_pelo_id($conexao, $receita['tb_usuario_id_usuario']),'id'=>$receita['id_receita']);

            // echo "<br>RAND: ";
             //echo rand(5, 2000);
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