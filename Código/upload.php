<?php
include "bd.php";

if (!isset($_SESSION)) {
    session_start();
}

//echo $_SESSION["edu@hot"];

if(isset($_POST['login']))
{
    //echo $_SESSION[$_POST['login']];

    if(strcmp( $_SESSION[$_POST['login']] , $_POST['login'] )==0)
    {
        $receita = array();
        
        //$receita['autor'] = $_POST['autor'];
        $receita['login'] = $_POST['login'];
        $receita['nomeReceita'] = $_POST['nomeReceita'];
        $receita['modoPreparo'] = $_POST['modoPreparo'];

        foreach ($_POST["quantidade"] as $key => $value) {
            $ing_quantidade[] =  $value;
        }

        $ing_medida = array();
        foreach ($_POST["medida"] as $key => $value) {
            $ing_medida[] =  $value;
        }

        $ing_nomeIng = array();
        foreach ($_POST["nomeIng"] as $key => $value) {
            $ing_nomeIng[] =  $value;
        }

        $receita['ing_quantidade'] = $ing_quantidade;
        $receita['ing_medida'] = $ing_medida;
        $receita['ing_nomeIng'] = $ing_nomeIng;

        $strIngredientes="";
        for($i=0 ; $i<count($receita['ing_quantidade']);$i++) {
            $strIngredientes = $strIngredientes .$receita['ing_quantidade'][$i] ." ". $receita['ing_medida'][$i]." de ".$receita['ing_nomeIng'][$i]."&";
        }
        $receita['ingredientes'] = $strIngredientes;

        $categorias = "";
        foreach ($_POST["categoria"] as $key => $value) {
            $categorias =  $categorias . $value."&";
        }
        
        $receita['categorias'] = $categorias;

        $img_url = "";
        $img_banco="";
        $i = 0;
        foreach ($_FILES["arquivos"]["error"] as $key => $error) {
            $destino = "images/" . $_FILES["arquivos"]["name"][$i];
            $img_url = $img_url . $destino.'&';
            $img_banco = $img_banco . $_FILES["arquivos"]["name"][$i] . '&';
            move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i], $destino );
            $i++;
        }
        $receita['img_url'] = $img_banco;

        $receita['id'] = buscar_id_pelo_login($conexao, $receita['login']);
        $receita['data'] = date ("Y-m-d H:i:s");
        //echo $receita['id'];

        if(cadastrar_receita($conexao, $receita))
            echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">';
        else
            echo 'Erro ao cadastrar';
        
    }else
    {
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=index.html">';
    }
/*
    echo 'Login: ';
                echo $receita['login'];
    echo '<br><br>Nome da receita: ';
                echo $receita['nomeReceita'];
    echo '<br><br>Ingredientes';
                echo $receita['ingredientes'];
    echo'<br><br>Modo de Preparo:';
                 echo $receita['modoPreparo'];
    echo '<br><br>Categorias: ';
                echo $receita['categorias'];

    echo '<br><br>Imagens: ';
                echo $receita['img_url'];
*/
    //gravar_usuario($conexao, $user);
    //echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=cadastrar-receita.html">';
                
            }
            ?>