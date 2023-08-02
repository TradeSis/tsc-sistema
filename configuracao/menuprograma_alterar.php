<?php
//Lucas 04042023 criado

include_once('../head.php');
include_once('../database/menuprograma.php');
include_once('../database/menu.php');
include_once('../database/aplicativo.php');

$menus = buscaMenu();
$aplicativos = buscaAplicativos();
$menuProgr = buscaMenuProgramas($_GET['idMenuPrograma']);
//echo json_encode($menuProgr);
?>

<body class="bg-transparent">

    <div class="container" style="margin-top:10px">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="menuprograma.php" role="button" class="btn btn-primary"><i
                    class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Alterar Menu Programa</spam>
        </div>

        <div class="container" style="margin-top: 10px">

            <form action="../database/menuprograma.php?operacao=alterar" method="post">

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label class="labelForm">Nome</label>
                        <input type="text" name="progrNome" class="form-control"
                            value="<?php echo $menuProgr['progrNome'] ?>">
                        <input type="text" class="form-control" name="idMenuPrograma"
                            value="<?php echo $menuProgr['idMenuPrograma'] ?>" hidden>
                    </div>

                    <div class="col-md-3 form-group-select" style="margin-top: 37px;">
                        <label class="labelForm">Menu</label>
                        <select class="select form-control" name="IDMenu">
                            <option value="<?php echo $menuProgr['IDMenu'] ?>"><?php echo $menuProgr['nomeMenu'] ?>
                            </option>
                            <?php
                            foreach ($menus as $menu) {
                                ?>
                                <option value="<?php echo $menu['IDMenu'] ?>"><?php echo $menu['nomeMenu'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3 form-group-select" style="margin-top: 37px;">
                        <label class="labelForm">Aplicativo</label>
                        <select class="select form-control" name="idAplicativo">
                            <option value="<?php echo $menuProgr['idAplicativo'] ?>"><?php echo $menuProgr['nomeAplicativo'] ?></option>
                            <?php
                            foreach ($aplicativos as $aplicativo) {
                                ?>
                                <option value="<?php echo $aplicativo['idAplicativo'] ?>"><?php echo $aplicativo['nomeAplicativo'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <label class="labelForm">link</label>
                <input type="text" name="progrLink" class="form-control" value="<?php echo $menuProgr['progrLink'] ?>">
                <div class="row">
                    <div class="col-md-2" style="margin-top: 17px;">
                        <label class="labelForm mt-3">Nível</label>
                        <select class="select form-control" style="padding-right: 50px;" name="nivelMenu">
                            <option value="1">Nível 1</option>
                            <option value="2">Nível 2</option>
                            <option value="3">Nível 3</option>
                            <option value="4">Nível 4</option>
                            <option value="5">Nível 5</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-left:-10px;margin-top: 17px;">
                        <label class="labelForm mt-3">Menu Atalho</label>
                        <select class="select form-control" name="menuAtalho">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>
        </div>
        <div style="text-align:right; margin-top:30px">

            <button type="submit" class="btn  btn-success"><i class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
        </div>
    </div>
    </form>
    </div>

    </div>


</body>

</html>