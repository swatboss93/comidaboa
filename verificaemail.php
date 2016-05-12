<?php
include "bd.php";

$arraylogin = array();

if(isset($_POST['login']))
{
	$busca = $_POST['login'];
	
	$listaLogin = verificaEmail($conexao,$busca);

	if(sizeof($listaLogin) > 0){
		echo 'false';
	} else {
		echo 'true';
	}
}