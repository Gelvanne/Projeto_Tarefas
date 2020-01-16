<?php
$method = $_SERVER["REQUEST_METHOD"];

/* Iniciando a conexão com a classe Tarefas */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Tarefas.class.php';

/* Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';

/* iniciando uma sessão */

session_start();
$T = $_SESSION;
var_dump($T);
exit();


if (isset($_SESSION['usuarioLogado'])) {
    $SESS_US = $_SESSION['usuarioLogado'];
   
}
/* Iniciando a conexão do banco de dados */
include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
global $SQL;
global $SQLError;

/* Alterando a tarefa */
$queryAlterar = "UPDATE db_tarefas.tb_tarefas SET tarefa_finalizada = 1 WHERE tarefa_id = $id and usuario_id = {$SESS_US->usuario_id}";
$envioSQL = mysqli_query($SQL, $queryAlterar);
$_SESSION['MSG_Alterar_Tarefa'] = "Tarefas alterada com sucesso.";
header("Location:/Projeto_Tarefas/processa/home.php");
exit();
 /* Fim do teste de valor nulo */
    {
        unset($_SESSION['MSG_incluir_Tarefa']);
        $_SESSION['MSG_incluir_Tarefa'] = "Preencha os campos do formulário.";
        header("Location:/Projeto_Tarefas/processa/home.php");
        exit();
    }
 /* Fim do teste de POST */

?>
