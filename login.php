<?php
// Lucas 08032023 - modificado o action do form para chamar api, linha 67
// helio 26012023 16:16

include_once __DIR__ . "/../config.php";

?>
<!DOCTYPE html>
<html lang="en" class="bg-white">

<?php
        include_once ROOT. "/vendor/vendor.php";
?>

<body class="bg-default mt-5">
  <div>
    <!-- Header -->
    <div class="header">
      <div class="container">
        <div class="header-body text-center mb-2">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
              <p class="text-lead text">Por favor faça login.</p>
            </div>
            <div class="container">
              <a class="brand">
                <img src="<?php echo URLROOT ?>/img/logo.png">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-gray-200 shadow border-1">

            <div class="card-body px-lg-4 py-lg-6">
              <?php

              if (isset($_GET['mensagem'])) {
                ?>
                <div class="alert alert-dark" role="alert">
                  <?php echo $_GET['mensagem'] ?>
                </div>
                <?php
              }

              ?>

              <form role="form" action="verificar_login.php" method="post">
                <div class="form-group mb-3">

                  <div class="input-group input-group-alternative">
                    <span class="input-group-text"></i><i class="bi bi-building-fill"></i></span>
                    <input class="form-control" type="text" name="nomeEmpresa"
                      value="<?php echo isset($_COOKIE['Empresa']) ? $_COOKIE['Empresa'] : '' ?>" placeholder="Empresa"
                      autocomplete="off" autofocus>
                  </div>
                </div>
                <div class="form-group mb-3">

                  <div class="input-group input-group-alternative">
                    <span class="input-group-text"></i><i class="bi bi-person-fill"></i></span>
                    <input class="form-control" type="text" name="loginNome"
                      value="<?php echo isset($_COOKIE['User']) ? $_COOKIE['User'] : '' ?>" placeholder="Usuário"
                      autocomplete="off" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative" id="show_hide_password">
                    <span class="input-group-text" style="width: 42px;"></i><i class="bi bi-lock-fill"></i></span>
                    <input class="form-control" placeholder="Senha" type="password" id="pass" name="password">
                    <i class="bi bi-eye pt-3" aria-hidden="true"
                      style="width:30px; text-align: right;border-bottom:1px solid #40505B"></i>
                  </div>

                  <div class="custom-control custom-control-alternative custom-checkbox">
                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">

                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Entrar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    <footer class="sticky-footer fixed bottom">
      <div class="container">
        <div class="copyright text-center">
          <span class="text text-gray-600 small">Copyright &copy; TRADESIS Soluções em Sistemas 2022</span>
        </div>
      </div>
    </footer>
  </div>

  <script>
    $(document).ready(function () {
      $("#show_hide_password i").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi bi-eye");
          $('#show_hide_password i').removeClass("bi bi-eye-slash");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi bi-eye");
          $('#show_hide_password i').addClass("bi bi-eye-slash");
        }
      });
    });
  </script>
</body>

</html>