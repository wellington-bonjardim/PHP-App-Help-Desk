<?php
    session_start();

/*https://www.php.net/manual/en/function.fopen => CONSULTAR OS ATRIBUTOS DA FUNÇÃO NATIVA*/

    //MONTAGEM DO TEXTO:
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);
    $texto = $_SESSION['id'] . ' # ' . $titulo . ' # ' . $categoria . ' # ' . $descricao . PHP_EOL;

    //ABRINDO O ARQUIVO
    $arquivo = fopen('../../app_help_desk/arquivo.txt', 'a');
    //ESCREVENDO O TEXTO
    fwrite($arquivo, $texto);
    //FECHANDO O ARQUIVO
    fclose($arquivo);
    //REDIRECIONAMENTO PARA ABRIR CHAMADO AO FINALIZAR UM CHAMADO:
    header('Location: abrir_chamado.php');

?>