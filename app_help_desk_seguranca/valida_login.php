<?php

    session_start();
    /* SESSION_START TEM QUE VIR ANTES DE QUALQUER IMPRESSÃO NO NAVEGADOR (COMO POR EXEMPLO, ANTES DO echo. POR CONVENÇÃO, COLOCA-SE ESA FUNÇÃO NO INÍCIO DOS CÓDIGOS!*/

    // Variável que verifica se a autenticação foi realizada:
    $usuario_autenticado = false;
    /*
    Recebe FALSE porque só vai virar TRUE caso os valores recebidos pelo POST estejam presentes no banco de dados (NESSE CASO, NO ARRAY ESTÁTICO);
     */
    $usuario_id = null;
    $usuario_perfil_id = null;
    
    $perfis = [ 1 => 'Administrativo', 2 => 'Usuário']; 

    //USUÁRIOS DO SISTEMA
    /*Uma relação de usuários estática foi criada pois até o momento ainda não aprendemos a trabalhar com banco de dados!! */
    $usuarios_app = [
        ['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1],
        ['id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1],
        ['id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2],
        ['id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2],
    ];

    foreach($usuarios_app as $user) {

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        } 
    }

    if ($usuario_autenticado) {
        echo 'USUÁRIO AUTENTICADO COM SUCESSO!';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;

        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
    }
    /*header('Location: index.php?login=erro'); É UMA FUNÇÃO NATIVA DO PHP! Essa função espera receber um destino para onde a página será redirecionada, como se fosse um "desvio"! */

?>