<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once ('../database/menuprograma.php');
include_once('../database/menu.php');
include_once('../database/aplicativo.php');

$menuProgramas = buscaMenuProgramas();
$menus= buscaMenu();
$aplicativos= buscaAplicativos();
//echo json_encode($menuProgr);
?>


<body class="bg-transparent" >
    <div class="container" style="margin-top:10px">

            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Menu Programas</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="menuprograma_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Menu</th>
                        <th>Aplicativo</th>
                        <th>Link</th>
                        <th>Nivel Menu</th>
                        <th>Atalho</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($menuProgramas as $menuProgr) {
                ?>
                    <tr>
                        <td><?php echo $menuProgr['progrNome'] ?></td>
                        <td><?php echo $menuProgr['nomeMenu'] ?></td>                       
                        <td><?php echo $menuProgr['nomeAplicativo'] ?></td>
                        <td><?php echo $menuProgr['progrLink'] ?></td>
                        <td><?php echo $menuProgr['nivelMenu'] ?></td>
                        <td><?php echo ($menuProgr['menuAtalho'] == 1) ? "Sim" : "Não"; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="menuprograma_alterar.php?idMenuPrograma=<?php echo $menuProgr['idMenuPrograma'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="menuprograma_excluir.php?idMenuPrograma=<?php echo $menuProgr['idMenuPrograma'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>

</body>

</html>
