<?php
    //Remover índices do array da sessão:
    //unset();

    //Destruir a variável da sessão:
    //session_destroy();
    
    session_start();
    
    session_destroy();

    header('Location: index.php');
?>