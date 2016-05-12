<?php
include "bd.php";

if(isset($_POST["comentario"]))
{
   $comentario = $_POST["comentario"];
   $login = $_POST["login"];
   $id_receita = $_POST["id_receita"];

   $id_usuario = buscar_id_pelo_login($conexao, $login);

   $retorno = comentar_receita($conexao, $comentario, $id_receita,  $id_usuario);

   $user = array('result'=>$retorno);
   $json = json_encode($user);
   echo $json;
   
}else
{
  $user = array('result'=>'error');
  $json = json_encode($user);
  echo $json;
}

