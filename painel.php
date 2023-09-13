<?php
//Lucas 05042023 - adicionado foreach para menuLateral.
//gabriel 220323 11:19 - adicionado IF para usuario cliente
//Lucas 13032023 - criado versão 2 do menu.

include_once 'head.php';
include_once 'database/aplicativo.php';
$aplicativos = buscaAplicativosMenu($_SESSION['idUsuario']);
?>

<link rel="stylesheet" href="css/painel.css">
<body>


<nav class="navbar Menu pt-2 pb-2">
  <a class="navbar-brand"></a>
        
        <ul class="navbar-nav" style="margin-right:110px; margin-bottom: 50px">
            <li class="nav-item dropdown font-weight-bold" style="color:white; position: fixed;">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color:white;">
                        <span>
                                <?php echo $logado ?>
                        </span>
                    </a>
                    
                <div class="dropdown-menu" aria-labelledby="userDropdown" style="margin-left:-60px;">
                    <a class="dropdown-item" href="<?php echo URLROOT ?>/sistema/configuracao/usuario_alterar.php?idUsuario=<?php echo $_SESSION['idUsuario'] ?>" src=""><i class="bi bi-person-circle"></i>&#32;<samp>Perfil</samp></a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
    
        </ul>
</nav>
    <!-- Modal sair -->
    <div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se você deseja encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary logout" href="<?php echo URLROOT ?>/sistema/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



<div class="container-fluid mt-3">

    <h1 class="heading"><a href="#"><img src="../img/brand/logo.png" width="300"></a></h1>

    <div class="box-container mt-3">
        <?php
        if (isset($aplicativos['idAplicativo'])) { ?>
            <div class="box">
                <img src="image/icon-1.png" alt="">
                <h3><?php echo $aplicativos['nomeAplicativo'] ?></h3>
                
                <a href="<?php echo $aplicativos['appLink'] ?>" class="btn">acessar</a>
            </div>
        <?php } else {
        foreach ($aplicativos as $aplicativo) {
        ?>
        <div class="box">
            <img src="image/icon-1.png" alt="">
            <h3><?php echo $aplicativo['nomeAplicativo'] ?></h3>
            
            <a href="<?php echo $aplicativo['appLink'] ?>" class="btn">acessar</a>
        </div>
        <?php }} ?>

    </div>




</div>

</body>

</html>
