<?php

/* iniciando uma sessão */
session_start();

/* Verificar se o usuário está logado */
if (isset($_SESSION['usuarioLogado'])) {
    $SESS_US = $_SESSION['usuarioLogado'];
}

/* Verificar se existe mensagem de inclusão de tarefas vindas do (IncluirTarefas.php) */
if (isset($_SESSION['MSG_incluir_Tarefa'])) {
    $SESS_MSG = $_SESSION['MSG_incluir_Tarefa'];
    unset($_SESSION['MSG_incluir_Tarefa']);
}
/* Verificar se existe mensagem de inclusão de tarefas vindas do (IncluirTarefas.php) */
if (isset($_SESSION['MSG_Null'])) {
    $SESS_MSG_null = $_SESSION['MSG_Null'];
    unset($_SESSION['MSG_Null']);
}
/* Verificar mensagem de erro finalizar tarefa */
if (isset($_SESSION['MSG1erro'])) {
    $SESS_MSG1erro = $_SESSION['MSG1erro'];
    unset($_SESSION['MSG1erro']);
}
/* Verificar mensagem de erro finalizar tarefa */
if (isset($_SESSION['MSG2erro'])) {
    $SESS_MSG2erro = $_SESSION['MSG2erro'];
    unset($_SESSION['MSG2erro']);
}
/* Verificar mensagem de erro finalizar tarefa */
if (isset($_SESSION['MSG3erro'])) {
    $SESS_MSG3erro = $_SESSION['MSG3erro'];
    unset($_SESSION['MSG3erro']);
}
if (isset($_SESSION['MSGFinalizada'])) {
    $SESS_MSGFinalizada = $_SESSION['MSGFinalizada'];
    unset($_SESSION['MSGFinalizada']);
}
if (isset($_SESSION['MSGapagar'])) {
    $SESS_MSGapagada = $_SESSION['MSGapagar'];
    unset($_SESSION['MSGapagar']);
}
if (isset($_SESSION['MSG4erro'])) {
    $SESS_MSG4erro = $_SESSION['MSG4erro'];
    unset($_SESSION['MSG4erro']);
}

?>