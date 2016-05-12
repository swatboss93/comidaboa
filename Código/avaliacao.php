<?php
include "bd.php";

if(isset($_POST["nota"]))
{
   $nota = $_POST["nota"];
   $login = $_POST["login"];
   $id_receita = $_POST["id_receita"];

   $id_usuario = buscar_id_pelo_login($conexao, $login);

   $retorno = avaliar_receita($conexao, $nota, $id_usuario, $id_receita);

   $user = array('result'=>$retorno);
   $json = json_encode($user);
   echo $json;
   
}else
{
  $user = array('result'=>'error');
  $json = json_encode($user);
  echo $json;
}

