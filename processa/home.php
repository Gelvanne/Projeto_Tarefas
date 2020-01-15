<?php
/*Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';
/* iniciando uma sessão */ 
session_start();
if (isset($_SESSION['usuarioLogado'])){
  $SESS_US = $_SESSION['usuarioLogado'];
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
<p><label>Sair do APP:</label><a href="http://localhost/Projeto_Tarefas/index.html">Sair</a>
<h1>APP: TAREFAS-Página HOME</h1>
<br>
<form action="http://localhost/Projeto_Tarefas/processa/incluirTarefa.php" method="POST">
<p><input type="text" name="fT_titulo" placeholder="Digite o título da tarefa"></p>
<p><input type="date" name="fT_data"></p>
<input type="submit" value="Cadastrar Tarefa">

</form>

</body>

</html>

