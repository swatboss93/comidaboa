<?php
include "bd.php";

$arraydicas = array();

if(isset($_POST['busca']))
{
    $busca = $_POST['busca'];
    
    foreach (busca_dicas($conexao,$busca) as $li):
     
        $dicaAtual = array(
            'dica' => $li['nome_receita'],
            'id' => $li['id_receita'],
            );
    
    array_push($arraydicas, $dicaAtual);
    
    endforeach;

    $dicas = array(
        'dicas' => $arraydicas
        );

    $json = json_encode($dicas);
    echo $json;
}