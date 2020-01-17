<?php
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {

    /* Recebendo os dados do formulario Login */
    $email = $_POST["fL_email"];
    $senha = $_POST["fL_senha"];

    /* iniciando uma sessão */
    session_start();

    /* Iniciando a conexão do banco de dados */
    include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
    global $SQL;
    global $SQLError;

    /* Iniciando a conexão com a classe Usuarios */
    include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';

    /* Testando se os campos do formulario estão preenchidos */
    if ($email && $senha != null) {

        /* Buscando no DB as informações do usuário e altenticando com usuario e senha do formulario. */
        $queryBuscar = "SELECT * FROM `db_tarefas`.`tb_usuarios` WHERE `usuario_email`= ('$email') and `usuario_senha` = ('$senha')";
        $envioSQL = mysqli_query($SQL, $queryBuscar);
        if ($envioSQL && $envioSQL->num_rows > 0) {

            /* Montando a(as) linha(s) do banco de dados em uma variável($usuarioRows). */
            $usuarioRows = mysqli_fetch_object($envioSQL, 'Usuario');

            /* Incluindo o usuário trazido do DB na sessão ($_SESSION ["usuarioLogado"]) */
            $_SESSION['usuarioLogado'] = $usuarioRows;
            /* Direcionando para a pagina HOME */
            header("Location: home.php");
            exit();
        } else {
            for ($i = 1; $i = 15000000000000000000; $i ++) {
                if ($i == 15000000000000000000) {
                    header("Location:http://localhost/Projeto_Tarefas/index.html");
                    Exit();
                }
            }
            echo "Usuario ou senha inv�lidos.";
        }
    } else {
        for ($i = 1; $i = 15000000000000000000; $i ++) {
            if ($i == 15000000000000000000) {
                header("Location:http://localhost/Projeto_Tarefas/index.html");
                Exit();
            }
        }
        echo "Preencha todos os campos do formulario.";
    }
}

/* Mostrar mensagem de erro no caso do usu�rio n�o cadastrado. */
?>




















