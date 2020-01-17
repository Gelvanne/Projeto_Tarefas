<?php
/* Iniciando a conexão com a classe Usuarios */
include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Usuario.class.php';

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
<!--INICIO DO FORMULARIO PARA INSERIR TAREFAS -->
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>APP:TAREFAS-HOME</title>
</head>

<body>
    <label> Usuário ativo: </label>
    <h4><?php if (isset($SESS_US)) {
			echo "$SESS_US->usuario_nome";
		} ?></h4>

    <p><label>Sair do APP:</label><a href="http://localhost/Projeto_Tarefas/processa/Sair.php">
            <= Sair</a> </p> <hr>
                <!-- LINHA-->
                <h2>APP: TAREFAS-Página HOME</h2>
                <hr> <!-- LINHA-->
                <form action="http://localhost/Projeto_Tarefas/processa/incluirTarefa.php" method="POST">
                    <p> <input type="text" name="fT_titulo" placeholder="Digite o título da tarefa"> </p>
                    <p> <input type="timezone_location_get" name="fT_data"> </p>
                    <input type="submit" value="Cadastrar Tarefa">
                </form>


                <?php
				///// Mostrar oa tarefas agendadas/////

				/* Iniciando a conexão com a classe Tarefas */
				include 'C:\xampp\htdocs\Projeto_Tarefas\classes\Tarefas.class.php';

				/* Iniciando a conexão do banco de dados */
				include 'C:\xampp\htdocs\Projeto_Tarefas\processa\sqlConection.php';
				global $SQL;
				global $SQLError;

				/* Buscando dados da Tarefa */
				if ($SQLError == 0) {
					$QueryBuscarTarefa = "SELECT * FROM `db_tarefas`.`tb_tarefas` WHERE usuario_id = {$SESS_US->usuario_id}";

					$envioSQLBusca = mysqli_query($SQL, $QueryBuscarTarefa);

					if ($envioSQLBusca->num_rows > 0 && $envioSQLBusca == TRUE) {
						$RowsTarefas = array();

						while ($obj  =  mysqli_fetch_object($envioSQLBusca, 'Tarefas')) {
							$RowsTarefas[] =  $obj;
						}
					}
				}

				?>

                <!-- criação da tabela -->
                <h2>Suas tarefas:</h2>
                </legend>
                <table border="1">
                    <thead>
                        <tr>
                            <td>
                                <font color="blue" size="+1"><strong>Editar Tarefas</strong></font>
                            </td>
                            <td>
                                <font color="blue" size="+1"><strong>Situação da tarefa:</strong></font>
                            </td>
                            <td>
                                <font color="blue" size="+1"><strong>Situação:</strong></font>
                            </td>
                            <td>
                                <font color="blue" size="+1"><strong>Data Abertura:</strong></font>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Trazendo as tarefas e organizando por linhas -->
                        <?php if(isset($RowsTarefas)){ ?>

                        <?php foreach ($RowsTarefas as $t) { ?>

                        <tr>
                            <form action="#" method="POST">
                                <!--<td><input type="checkbox" name="IDs[]" value="<?php //echo $t->tarefas_id;
																						?>" ></td> -->
                                <!-- Enviar informação usando a tag <a> e metodo GET para enviar informação para outro form-->
                                <td> <a
                                        href="/Projeto_Tarefas/processa/finalizar.php ? id= <?Php echo $t->tarefas_id; ?>">Finalizar</a>
                                    <a
                                        href="/Projeto_Tarefas/processa/excluir.php ? id= <?Php echo $t->tarefas_id; ?>">Excluir</a>
                                </td>
                                <td>
                                    <p> <?php echo $t->tarefas_titulo; ?></p>
                                </td>
                                <td>
                                    <p> (<?php echo $t->tarefas_finalizada ? "Finalizada" : "Aberta"; ?>) </p>
                                <td>
                                    <p> <?php $data = $t->tarefas_data; echo $data = date("j, n, Y"); ?></p>
                                </td>
                                <?php } ?> </td>
                        </tr>
                    </tbody>
                </table>

</body>

<hr>

<?php }?>
<!-- linha para definir onde a menssagem de erro vai ser mostrada.-->

<?php if (isset($SESS_MSG)) {?>
    <h3><font color="green"> <?php echo "$SESS_MSG";?></h3></font>
<?php }?>
<?php if (isset($SESS_MSG_null)) {?>
    <h3><font color="red"> <?php echo "$SESS_MSG_null";?></h3></font>
<?php }?>

<?php if (isset($SESS_MSG1erro)) {?>
     <h3><font color="red"> <?php echo "$SESS_MSG1erro"?>;</h3></font>
<?php }?>

<?php if (isset($SESS_MSG2erro)) {?>
	<h3><font color="red"><?php echo "$SESS_MSG2erro";?></font></h3>
<?php }?>

<?php if (isset($SESS_MSG3erro)) {?>
	<h3><font color="red"><?php echo "$SESS_MSG3erro";?></font></h3>
<?php }?>

<?php if (isset($SESS_MSGFinalizada)) {?>
    <h3><font color="green"><?php echo "$SESS_MSGFinalizada";?></font></h3>
<?php }?>

<?php if (isset($SESS_MSGapagada)) {?>
    <h3> <font color="green"><?php echo "$SESS_MSGapagada"; ?></font></h3>
<?php }?>

<?php if (isset($SESS_MSG4erro)) {?>
   <h3><font color="red"><?php  echo "$SESS_MSG4erro";?></font></h3>
<?php }?>

<hr/>
</html>