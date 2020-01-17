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
if (isset($_SESSION['usuarioLogado'])) {$SESS_US = $_SESSION['usuarioLogado'];}

/* Carregando o ID da tarefa, vinda do outro formulario via GET, em uma variável idT */
$idT = $_GET["id"];

/* Buscando dados da Tarefa */
if ($SQLError == 0) {
    $QueryDeletaTarefa = "DELETE FROM db_tarefas.tb_tarefas WHERE tb_tarefas.usuario_id = {$SESS_US->usuario_id} and tb_tarefas.tarefas_id = '$idT'";
    $envioSQLDeleta = mysqli_query($SQL, $QueryDeletaTarefa);
    if ($envioSQLDeleta) {
        $linhasDeletadas  = mysqli_affected_rows($SQL);
        if ($linhasDeletadas > 0) {
            $MSGApagar="Tarefa apagada com sucesso. ";$_SESSION['MSGapagar'] = $MSGApagar;                 
        }
        } 

    } else {$MSG4erro="Erro na conexão com o DB ao apagar tarefa.";$_SESSION['MSG4erro'] = $MSG4erro;}
header("Location: /Projeto_Tarefas/processa/home.php");
exit();