<?php
include "bd.php";

if(isset($_GET['id']))
{
 $id_receita = $_GET['id'];

 $receitas = array();
 $receitas = buscar_receitas_por_id($conexao, $id_receita);

 $jsonReceitas = array();
 foreach ($receitas as $receita):
  /*
            echo '<br>NOME REC: ';
            echo $receita['nome_receita'];
             echo '<br>IMAGENS: ';
            echo $receita['imagens_receita'];
            echo '<br>CATEGORIAS';
            echo $receita['categorias_receita'];
            echo '<br>INGRED: ';
            echo $receita['ingredientes_receita'];
            echo '<br>MODO PREPARO: ';
            echo $receita['modopreparo_receita'];
             //echo '<br>';
             //echo $receita['imagens_receita'];
             echo '<br>ID REC: ';
             echo $receita['id_receita'];
             echo '<br>AUTOR: ';
             //echo $receita['tb_usuario_id_usuario'];
             echo buscar_nome_usuario_pelo_id($conexao, $receita['tb_usuario_id_usuario']);
             echo '<br>NOTA: ';
             echo buscar_avaliacao_media($conexao, $receita['id_receita']);
             echo "<br>";*/

             $avaliacao = buscar_avaliacao_media($conexao, $receita['id_receita']);
             if($avaliacao == null)
                $avaliacao = 'S.N';

            $jsonReceitas = array('imagens'=>$receita['imagens_receita'],'nome'=>$receita['nome_receita'],'ingredientes'=>$receita['ingredientes_receita'],'modopreparo'=>$receita['modopreparo_receita'],'categorias'=>$receita['categorias_receita'],'avaliacao'=>$avaliacao,'autor'=>buscar_nome_usuario_pelo_id($conexao, $receita['tb_usuario_id_usuario']),'id_receita'=>$receita['id_receita']);

            endforeach;

            echo '{ "receita":';
            echo json_encode($jsonReceitas);
            echo "}";

        }