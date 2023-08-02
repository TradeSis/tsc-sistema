<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once ('../database/menu.php');


$menus = buscaMenu();

//echo json_encode($menus);
?>

<body class="bg-transparent" >
    <div class="container" style="margin-top:30px">

            <div class="row mt-4">
                <div class="col-sm-8">
                        <p class="tituloTabela">Menus</p>
                    </div>

                <div class="col-sm-4" style="text-align:right">
                        <a href="menu_inserir.php" role="button" class="btn btn-primary">Adicionar</a>
                    </div>
          
            </div>
        <div class="card shadow mt-2">  
            <table class="table">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Aplicativo</th>
                        <th>Nivel Menu</th>
                        <th>Header</th>
                        <th>Ação</th>

                    </tr>
                </thead>

                <?php
                foreach ($menus as $menu) {
                ?>
                    <tr>
                        <td><?php echo $menu['nomeMenu'] ?></td>
                        <td><?php echo $menu['nomeAplicativo'] ?></td>
                        <td><?php echo $menu['nivelMenu'] ?></td>
                        <td><?php echo ($menu['menuHeader'] == 1) ? "Sim" : "Não"; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="menu_alterar.php?IDMenu=<?php echo $menu['IDMenu'] ?>" role="button">Editar</a>
                            <a class="btn btn-danger btn-sm" href="menu_excluir.php?IDMenu=<?php echo $menu['IDMenu'] ?>" role="button">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>

</body>

</html>
