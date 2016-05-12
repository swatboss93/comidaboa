<?php
include "bd.php";

if(isset($_POST['login']))
{
 $usuario['login'] = $_POST['login'];
 $usuario['senha'] = $_POST['senha'];

    //$usuario['login'] = 'math@hotmail.com';
    //$usuario['senha'] = 'yyyyyyyyyyyyy';
 $uu = validar_usuario($conexao, $usuario);
 
 if(strcmp($uu['nome'], 'null')==0)
 {
   $user = array('result'=>'false','nome'=>'null','login'=>'null');
   $json = json_encode($user);
   echo $json;
 }else
 {
   $user = array('result'=>'true','nome'=>$uu['nome'],'login'=>$uu['login']);
   $json = json_encode($user);
   echo $json;
 }

 
}else{
	$user = array('result'=>'false','nome'=>'false','login'=>'false');
  $json = json_encode($user);
  echo $json;
}