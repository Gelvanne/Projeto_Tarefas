<?php
/* Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';
/* iniciando uma sessão */
session_start();
if (isset($_SESSION['usuarioLogado'])) {
    $SESS_US = $_SESSION['usuarioLogado'];
}

if (isset($_SESSION['MSG_incluir_Tarefa'])) {
    $SESS_MSG = $_SESSION['MSG_incluir_Tarefa'];
    unset($_SERVER['MSG_incluir_Tarefa']);
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset='utf-8'>
<title>APP:TAREFAS-HOME</title>
</head>

<body>
	<label> Seja bem vindo. Usuário ativo na sessão: </label>  <?php if (isset($SESS_US)) {echo "$SESS_US->usuario_nome";} ?>
		<label>Sair do APP:</label>
	<a href="http://localhost/Projeto_Tarefas/index.html">Sair</a>
	<h1>APP: TAREFAS-Página HOME</h1>
	<br>
	<form action="http://localhost/Projeto_Tarefas/processa/incluirTarefa.php" method="POST">
		<p> <input type="text" name="fT_titulo" placeholder="Digite o título da tarefa"> </p>
		<p> <input type="date" name="fT_data"> </p>
		<input type="submit" value="Cadastrar Tarefa">
	</form>

	<hr>
	<!-- linha para definir onde a menssagem de erro vai ser mostrada.-->
<?php

if (isset($SESS_MSG)) {
    echo "$SESS_MSG";
}
?>
<hr>
<!-- linha para definir onde a menssagem de erro vai ser mostrada.-->
<!-- criação da tabela -->
<h2>Suas tarefas:</h2>
		</legend>
		<table>
			<thead>
				<tr>
					<td><font color="blue" size="+1"><strong>Check</strong></font></td>
					<td><font color="blue" size="+1"><strong>Usuario:</strong></font></td>
					<td><font color="blue" size="+1"><strong>Situação da tarefa:</strong></font></td>
					<td><font color="blue" size="+1"><strong>Data:</strong></font></td>
				</tr>
			</thead>
		<tbody>
			<?php foreach ($Tarefas as $t){ ?>
								
				<tr>
				<form action="#" method="POST" >
					<td><input type="checkbox" name="IDs[]" value="<?php echo $t->tarefas_id;?>" checked="checked"></td>
					<td><p>[<?php echo $usuario->usuario_nome;?>]</p></td>
					<td><p> <?php echo $t->tarefas_titulo;?></p></td>
					<td><p> (<?php echo $t->tarefas_finalizada ? "Finalizada" : "em Aberto"; ?>) </p> <?php }?> </td>
				</tr>
				</tbody>
		</table>

</body>

</html>

