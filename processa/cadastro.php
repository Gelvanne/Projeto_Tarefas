<?php
$method= $_SERVER["REQUEST_METHOD"];
/* Teste para o método POST */
if ($method == "POST") {

/*Recebendo os dados do formulario Login*/
$nome =  $_POST["fC_nome"];
$email = $_POST["fC_email"];
$senha = $_POST["fC_senha"];

/* iniciando uma sessão */ 
session_start();

/*Iniciando a conexão do banco de dados*/
include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
global $SQL;
global $SQLError;

/*Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';
/* Testando se os campos do formulario estão preenchidos*/
if ($nome && $email && $senha != null) {
    $queryBuscar = "SELECT * FROM `db_tarefas`.`tb_usuarios` WHERE `usuario_email`= ('$email')";
    $envioSQL = mysqli_query($SQL, $queryBuscar);

    /* object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(4) ["lengths"]=> NULL ["num_rows"]=> int(1) ["type"]=> int(0) } */
    /* Teste se o resultado da busca trouxe algum valor: se = 0 não existe usuário se maior que 1 usuario cadastrado.*/
    if ($envioSQL->num_rows > 0) { 

        /* Resultado maior que 1: Usuario ja cadastrado armazenar menssagem. */
        $MSG_Erro_usuario = "Email de usuario já cadastrado. Por favor tente cadastrar outro";
    } else{ 

        /* Resultado igual a 0: Procedimento de cadastro de usuario. */
        $queryInserir = "INSERT INTO `db_tarefas`.`tb_usuarios`(`usuario_nome`,`usuario_email`,`usuario_senha`) VALUES ('$nome','$email','$senha')";
        $envioSQL = mysqli_query($SQL, $queryInserir);
        $MSG_Cadastro = "Usuário cadastrado com sucesso.";
    }
} else {$MSG_Erro_usuario = "Preencha todos os campos do formulário.";}/* Fim do teste dos valores nulos */
}/*Fim do if do POST */


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>APP:TAREFAS-CADASTRO</title>
</head>

<body>
<h1>APP: TAREFAS-Página Cadastro</h1>
<form action="cadastro.php" method="POST">
<p><input type="text" name="fC_nome" placeholder="Digite seu nome" maxlength="30"></p>
<p><input type="email" name="fC_email" placeholder="Digite seu e-mail" maxlength="30"></p>
<p><input type="password" name="fC_senha" placeholder="Digite sua senha" maxlength="11"></p>
<input type="submit" value="Cadastrar">
<br>
</form>
<strong><a href="../index.html"> HOME </strong></a>
<hr> <!-- linha para definir onde a menssagem de erro vai ser mostrada.-->
<?php if (isset($MSG_Erro_usuario)) {
    echo "$MSG_Erro_usuario";
}?>
<?php if (isset($MSG_Cadastro)) {
    echo "$MSG_Cadastro";
}?>
</body>

</html>
