<?php
//Lucas 09032023 - adicionado um segundo parametro no buscaUsuario 
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../head.php');
include_once ('../database/usuario.php');
include_once ('../database/clientes.php');

$usuarios = buscaUsuarios();

?>

<body class="bg-transparent">
    <div class="container" style="margin-top:10px">


            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Usuários</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="usuario_inserir.php" role="button" class="btn btn-primary">Cadastrar Novo Usuário</a>
                    </div>
          
            </div>

        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Empresa/Cliente</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>

                <?php
                foreach ($usuarios as $usuario) {

                    $nomeCliente = "Interno";
                    if ($usuario["idCliente"]) {
                        $clientes = buscaClientes ($usuario["idCliente"]);
                        $nomeCliente = $clientes ["nomeCliente"];
                    }
                ?>
                    <tr>
                        <td class="text-center"><?php echo $usuario['nomeUsuario'] ?></td>
                        <td class="text-center"><?php echo $usuario['email'] ?></td>
                        <td class="text-center"><?php echo $nomeCliente ?></td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="usuario_alterar.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Alterar</a>
                            <a class="btn btn-danger btn-sm" href="usuario_excluir.php?idUsuario=<?php echo $usuario['idUsuario'] ?>" role="button">Excluir</a>
                            
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</body>

</html>