<?php
//Lucas 05042023 criado

include_once('../conexao.php');

function buscaMenuProgramas($idMenuPrograma=null)
{

	$menuProgr = array();
	//echo json_encode($idMenuPrograma);
	//return;	
	$apiEntrada = array(
		'idMenuPrograma' => $idMenuPrograma,
	);
	
	/* echo "-ENTRADA->".json_encode($apiEntrada)."\n";
	return; */	
	$menuProgr = chamaAPI(null, '/sistema/menuprograma', json_encode($apiEntrada), 'GET');
	return $menuProgr;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "inserir") {
		$apiEntrada = array(
			'IDMenu' => $_POST['IDMenu'],
			'progrNome' => $_POST['progrNome'],
            'idAplicativo' => $_POST['idAplicativo'],
            'progrLink' => $_POST['progrLink'],
            'nivelMenu' => $_POST['nivelMenu'],		
            'menuAtalho' => $_POST['menuAtalho']		
		);

		$menuProgr = chamaAPI(null, '/sistema/menuprograma', json_encode($apiEntrada), 'PUT');
		
	}

    if ($operacao == "alterar") {
		$apiEntrada = array(
			'idMenuPrograma' => $_POST['idMenuPrograma'],
			'IDMenu' => $_POST['IDMenu'],
			'progrNome' => $_POST['progrNome'],
            'idAplicativo' => $_POST['idAplicativo'],
            'progrLink' => $_POST['progrLink'],
            'nivelMenu' => $_POST['nivelMenu'],
            'menuAtalho' => $_POST['menuAtalho']
			
		);

		$menuProgr = chamaAPI(null, '/sistema/menuprograma', json_encode($apiEntrada), 'POST');
		
	}

	if ($operacao == "excluir") {
		$apiEntrada = array(
			'idMenuPrograma' => $_POST['idMenuPrograma']		
		);

		$menuProgr = chamaAPI(null, '/sistema/menuprograma', json_encode($apiEntrada), 'DELETE');
		
	}


	
	header('Location: ../configuracao/menuprograma.php');
}
