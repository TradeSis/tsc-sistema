<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "UPDATE usuarioaplicativo SET nivelMenu = $nivelMenu WHERE idUsuario = $idUsuario and idAplicativo = $idAplicativo";

   //echo "-SQL->".json_encode($sql)."\n";

    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>