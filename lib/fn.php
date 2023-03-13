<?php

    // Exemplo para aplicação
    /*
    RegLog([
        'dados' => $VetorData,//POST, GET e ETC
        'query' => $query //Comando SQL da Operação
    ])
    //*/

    function RegLog($g){
        global $_SESSION;
        global $con;

        $dados = json_encode($g['dados']);
        $op = strtoupper(substr(trim($g['query']),0,strpos(trim($g['query']), ' ')));
        $comando = base64_encode(trim($g['query']));

        $query = "INSERT INTO `logs` set
                    usuario = '{$_SESSION['usuario']->codigo}',
                    data = NOW(),
                    operacao = '{$op}',
                    dados = '{$dados}',
                    comando = '{$comando}'
                ";
        mysqli_query($con, $query);
        // file_put_contents('log.txt', $query);
        // usuario	data	operacao	dados	comando
    }