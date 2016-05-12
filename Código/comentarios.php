<?php
include "bd.php";

if(isset($_GET['id']))
{
 $id_receita = $_GET['id'];

 $comentarios = array();
 $comentarios = buscar_comentarios($conexao, $id_receita);

 $jsonComent = array();
 foreach ($comentarios as $comentario):
  
    /*
            echo '<br>ID USER: ';
            echo $comentario['tb_usuario_id_usuario'];

            echo '<br>DESC: ';
            echo $comentario['descricao_comentario'];

            echo '<br> NOME USER: ';
             echo buscar_nome_usuario_pelo_id($conexao, $comentario['tb_usuario_id_usuario']);
             echo'<br>';

*/

             $jsonComent[] = array('nome'=>buscar_nome_usuario_pelo_id($conexao, $comentario['tb_usuario_id_usuario']),'comentario'=>$comentario['descricao_comentario']);

             endforeach;

             echo '{';
             for($i=0;$i<count($jsonComent);$i++)
             {
              $rand = '"'.$i.'":';
              echo $rand; echo json_encode($jsonComent[$i]);
              
              if($i != count($jsonComent)-1)
                echo ',';
            }
            echo '}';

          }