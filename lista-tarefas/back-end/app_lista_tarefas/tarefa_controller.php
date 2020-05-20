<?php

	/*

	require_once 
	'/var/www/html/udemy/php-pdo/udemy/lista-tarefas/back-end/app_lista_tarefas/tarefa.model.php';
	require_once 
	'/var/www/html/udemy/php-pdo/udemy/lista-tarefas/back-end/app_lista_tarefas/tarefa.service.php';
	require_once 
	'/var/www/html/udemy/php-pdo/udemy/lista-tarefas/back-end/app_lista_tarefas/conexao.php';

	*/

	require_once 'C:\xampp\htdocs\udemy\lista-tarefas\back-end\app_lista_tarefas\tarefa.model.php';
	require_once 'C:\xampp\htdocs\udemy\lista-tarefas\back-end\app_lista_tarefas\tarefa.service.php';
	require_once 'C:\xampp\htdocs\udemy\lista-tarefas\back-end\app_lista_tarefas\conexao.php';



	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	echo $acao;

	if($acao == 'inserir' ) {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	
	} else if($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();
	} else if($acao == 'atualizar'){
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])
				->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();
		$tarefaService = new tarefaService($conexao, $tarefa);
		if ($tarefaService -> atualizar()){

			header('location:todas_tarefas.php');
		}
	}else if ($acao == 'remover'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();

		header('location:todas_tarefas.php');
		
	} else if ($acao == 'marcarRealizda'){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao,$tarefa);
		$tarefaService->marcarRealizda();

		header('location:todas_tarefas.php');

	}

?>