<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
//$bdSenha = '1234';
$bdSenha = '';
$bdBanco = 'usp';
//$bdBanco = 'bd_fundamentoweb';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
	echo "Problemas para conectar no banco. Verifique os dados!";
	die();
}

function buscar_receitas_recentes($conexao) {

	$sqlValidar = "SELECT id_receita, nome_receita, imagens_receita, categorias_receita FROM tb_receita ORDER BY id_receita DESC LIMIT 5";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
    //$lista = mysqli_fetch_assoc($result);

	$receitas = array();

	while ($lista = mysqli_fetch_assoc($result)) {
		$receitas[] = $lista;
	}

	return $receitas;
}

function buscar_receitas_mais_votadas($conexao) {

	$sqlValidar = "SELECT id_receita, nome_receita, imagens_receita, categorias_receita FROM tb_avaliacao INNER JOIN tb_receita ON tb_receita_id_receita = id_receita GROUP BY id_receita ORDER BY AVG(valor_avaliacao) DESC LIMIT 4";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
    //$lista = mysqli_fetch_assoc($result);

	$receitas = array();

	while ($lista = mysqli_fetch_assoc($result)) {
		$receitas[] = $lista;
	}

	return $receitas;
}

function buscar_comentarios($conexao, $id) {

	$sqlValidar = "SELECT id_comentario, descricao_comentario, tb_usuario_id_usuario FROM tb_comentario WHERE tb_receita_id_receita = {$id} ORDER BY id_comentario DESC LIMIT 5";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
    //$lista = mysqli_fetch_assoc($result);

	$receitas = array();

	while ($lista = mysqli_fetch_assoc($result)) {
		$receitas[] = $lista;
	}

	return $receitas;
}

function comentar_receita($conexao, $com,  $id_rec, $id_u) {
	$sqlGravar = "INSERT INTO tb_comentario ( descricao_comentario, tb_receita_id_receita, tb_usuario_id_usuario ) VALUES ('{$com}','{$id_rec}','{$id_u}')";

	if(mysqli_query($conexao, $sqlGravar))
		return "true";
	else
		return "false";
}

function avaliar_receita($conexao, $nota, $id_u, $id_rec) {
	$sqlGravar = "INSERT INTO tb_avaliacao ( valor_avaliacao, tb_receita_id_receita, tb_usuario_id_usuario ) VALUES ({$nota},{$id_rec},{$id_u})";

	if(mysqli_query($conexao, $sqlGravar))
		return "true";
	else
		return "false";
}

function buscar_receitas_por_id($conexao, $id) {

	$sqlValidar = "SELECT id_receita, nome_receita, modopreparo_receita, ingredientes_receita, tb_usuario_id_usuario, imagens_receita, categorias_receita FROM tb_receita WHERE id_receita = {$id}";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
    //$lista = mysqli_fetch_assoc($result);

	$receitas = array();

	while ($lista = mysqli_fetch_assoc($result)) {
		$receitas[] = $lista;
	}

	return $receitas;
}

function conta_avaliacoes($conexao, $id_receita) {

	$sqlValidar = "SELECT count(*) FROM tb_avaliacao AS av INNER JOIN tb_receita AS r ON av.tb_receita_id_receita = r.id_receita WHERE r.id_receita = {$id_receita}";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
	$lista = mysqli_fetch_assoc($result);

	if ($qtdlinhas > 0)
		return $lista['count(*)'];
	else
		return "null"; 
}

function buscar_avaliacao_media($conexao, $id_receita) {

	$sqlValidar = "SELECT AVG(av.valor_avaliacao) FROM tb_avaliacao AS av INNER JOIN tb_receita AS r ON av.tb_receita_id_receita = r.id_receita WHERE r.id_receita = '{$id_receita}'";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
	$lista = mysqli_fetch_assoc($result);

	if ($qtdlinhas > 0)
		return $lista['AVG(av.valor_avaliacao)'];
	else
		return "null"; 
}


function buscar_receitas_categoria($conexao, $cat) {

	$sqlValidar = "SELECT id_receita, nome_receita, tb_usuario_id_usuario, imagens_receita FROM tb_receita WHERE categorias_receita LIKE '%{$cat}%' ORDER BY data_receita DESC";

	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
    //$lista = mysqli_fetch_assoc($result);

	$receita = array();
	$receitas = array();

	while ($lista = mysqli_fetch_assoc($result)) {
		$receitas[] = $lista;
	}

	return $receitas;
}

function buscar_id_pelo_login($conexao, $login) {

	$sqlValidar = "SELECT id_usuario FROM tb_usuario WHERE login_usuario = '{$login}'";
	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
	$lista = mysqli_fetch_assoc($result);

	if ($qtdlinhas > 0)
		return $lista['id_usuario'];
	else
		return "null"; 
}

function buscar_nome_usuario_pelo_id($conexao, $id) {

	$sqlValidar = "SELECT nome_usuario FROM tb_usuario WHERE id_usuario = '{$id}'";
	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
	$lista = mysqli_fetch_assoc($result);

	if ($qtdlinhas > 0)
		return $lista['nome_usuario'];
	else
		return "null"; 
}

function cadastrar_receita($conexao, $r) {
	$sqlGravar = "INSERT INTO tb_receita ( nome_receita,modopreparo_receita,data_receita, tb_usuario_id_usuario, ingredientes_receita, imagens_receita, categorias_receita ) VALUES ('{$r['nomeReceita']}','{$r['modoPreparo']}','{$r['data']}','{$r['id']}','{$r['ingredientes']}','{$r['img_url']}','{$r['categorias']}')";

	if(mysqli_query($conexao, $sqlGravar))
		return true;
	else
		return false;
}

function cadastrar_usuario($conexao, $u) {
	$sqlGravar = "INSERT INTO tb_usuario (nome_usuario,nascimento_usuario,cidade_usuario,estado_usuario,telefone_usuario,login_usuario,senha_usuario) VALUES ('{$u['nome']}','{$u['dataNascimento']}','{$u['cidade']}','{$u['estado']}','{$u['telefone']}','{$u['login']}','{$u['confirmarSenha']}')";

	if(mysqli_query($conexao, $sqlGravar))
		return true;
	else
		return false;
}

function validar_usuario($conexao, $u) {

	$sqlValidar = "SELECT id_usuario, nome_usuario, login_usuario FROM tb_usuario WHERE login_usuario = '{$u['login']}' and senha_usuario = '{$u['senha']}'";
	$result = mysqli_query($conexao, $sqlValidar);

	$qtdlinhas = mysqli_num_rows($result);
	$lista = mysqli_fetch_assoc($result);

	if ($qtdlinhas > 0) {
		if (!isset($_SESSION)) {
			session_start();
			
		}
		
		$uu = array();
		$uu['nome'] = $lista['nome_usuario'];
        //$_SESSION['loginValido'] = "true";
        //$_SESSION['id'] = $lista['id_usuario'];
        //$_SESSION['nome'] = $uu['nome'];
		$uu['login'] = $lista['login_usuario'];
        //$_SESSION['login'] = $uu['login'];

		$_SESSION[$uu['login']]=$uu['login'];

		return $uu;

	} else {
		$uu['nome']='null';
		$uu['login']='null';
		return $uu;
	}
}

/*
    Wallison
*/
    function busca_dicas($conexao, $busca) {
    	$sqlBusca = "SELECT r.nome_receita, r.id_receita FROM tb_receita AS r WHERE r.nome_receita LIKE '%$busca%';";
    	
    	$resultado = mysqli_query($conexao, $sqlBusca);
    	
    	$listaNomes = array();

    	while ($lista = mysqli_fetch_assoc($resultado)) {
    		$listaNomes[] = $lista;
    	}

    	RETURN $listaNomes;
    }

    function verificaEmail($conexao, $busca) {
    	$sqlBusca = "SELECT u.login_usuario FROM tb_usuario AS u WHERE u.login_usuario='$busca'";
    	
    	$resultado = mysqli_query($conexao, $sqlBusca);
    	
    	$listaNomes = array();

    	while ($lista = mysqli_fetch_assoc($resultado)) {
    		$listaNomes[] = $lista;
    	}

    	RETURN $listaNomes;
    }
/*
    Wallison
*/