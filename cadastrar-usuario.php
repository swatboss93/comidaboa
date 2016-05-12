<?php
include "bd.php";

if(isset($_POST['nome']))
{
    $usuario = array();
    
    $usuario['nome'] = $_POST['nome'];
    $usuario['dataNascimento'] = $_POST['dataNascimento'];
    $usuario['cidade'] = $_POST['cidade'];
    $usuario['estado'] = $_POST['estado'];
    $usuario['telefone'] = $_POST['telefone'];
    $usuario['login'] = $_POST['login'];
    $usuario['confirmarSenha'] = $_POST['confirmarSenha'];

    if(cadastrar_usuario($conexao, $usuario))
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html?cadastroUsuario=true">';
    else
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html?cadastroUsuario=false">';
    
}

?>