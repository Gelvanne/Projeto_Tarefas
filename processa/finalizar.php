<?php
/* Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';

/* Iniciando a conexão com a classe Tarefas */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Tarefas.class.php';

/* Iniciando a conexão do banco de dados */
include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
global $SQL;
global $SQLError;

/* iniciando uma sessão */
session_start();

/* Verificar se o usuário está logado */
if (isset($_SESSION['usuarioLogado'])) {
    $SESS_US = $_SESSION['usuarioLogado'];
}

/* Carregando o ID da tarefa, vinda do outro formulario via GET, em uma variável idT */
$idT = $_GET["id"];

/* Buscando dados da Tarefa */
if ($SQLError == 0) {
    $QueryAlteraTarefa = "UPDATE db_tarefas.tb_tarefas SET tarefas_finalizada = 1 WHERE tb_tarefas.usuario_id = {$SESS_US->usuario_id} and tb_tarefas.tarefas_id = '$idT'";
    $envioSQLAltera = mysqli_query($SQL, $QueryAlteraTarefa);
    if ($envioSQLAltera) {
        $linhasAlteradas  = mysqli_affected_rows($SQL);
        if ($linhasAlteradas > 0) {
            $MSGFinalizada="Tarefa finalizada com sucesso. ";$_SESSION['MSGFinalizada'] = $MSGFinalizada;
        } else {$MSG3erro="Essa tarefa já foi finalizada. ";$_SESSION['MSG3erro'] = $MSG3erro;}
    } else {$MSG2erro="O DB retornou um valor FALSE.";$_SESSION['MSG2erro'] = $MSG2erro;}
} else {$MSG1erro="Erro na conexão com o DB ao finalizar tarefa.";$_SESSION['MSG1erro'] = $MSG1erro;}
header("Location: /Projeto_Tarefas/processa/home.php");
exit();
