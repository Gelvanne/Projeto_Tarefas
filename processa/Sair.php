<?php

session_start();

unset($_SESSION["usuarioLogado"]);

session_destroy();

header("Location: http://localhost/Projeto_Tarefas/index.html");
?>