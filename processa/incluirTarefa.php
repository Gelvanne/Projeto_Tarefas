<?php
$method = $_SERVER["REQUEST_METHOD"];

/* Iniciando a conexão com a classe Tarefas */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Tarefas.class.php';

/* Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';

/* iniciando uma sessão */
session_start();
if (isset($_SESSION['usuarioLogado'])) {
    $SESS_US = $_SESSION['usuarioLogado'];
}

/* Teste para o método POST */
if ($method == "POST") {

    /* Recebendo os dados do formulario Login */
    $titulo = $_POST["fT_titulo"];
    $data = $_POST["fT_data"];
    if ($titulo && $data != null) {

        /* Iniciando a conexão do banco de dados */
        include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
        global $SQL;
        global $SQLError;

        /* Inserindo uma nova tarefa. */
        $queryInserir = "INSERT INTO db_tarefas.tb_tarefas (tarefas_titulo, tarefas_finalizada,tarefas_data, usuario_id) VALUES ('$titulo',false,'$data',{$SESS_US->usuario_id})";
        $envioSQL = mysqli_query($SQL, $queryInserir);
        $_SESSION['MSG_incluir_Tarefa'] = "Tarefas cadastrado com sucesso.";
        header("Location:/Projeto_Tarefas/processa/home.php");
        exit();
    } else /* Fim do teste de valor nulo */
    {
        unset($_SESSION['MSG_incluir_Tarefa']);
        $_SESSION['MSG_incluir_Tarefa'] = "Preencha os campos do formulário.";
        header("Location:/Projeto_Tarefas/processa/home.php");
        exit();
    }
} /* Fim do teste de POST */

?>
