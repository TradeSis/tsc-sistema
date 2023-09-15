<?php
// helio 01022023 criado option null para empresa
// helio 01022023 altereado para include_once
// helio 26012023 16:16
include_once('../head.php');
include_once '../database/empresa.php';

$empresas = buscaEmpresas();

?>

<body class="bg-transparent">

    <div class="container formContainer">

        <div class="col-sm mt-4" style="text-align:right">
            <a href="../configuracao/?tab=configuracao&stab=usuarios" role="button" class="btn btn-primary"><i
                    class="bi bi-arrow-left-square"></i></i>&#32;Voltar</a>
        </div>
        <div class="col-sm">
            <spam class="col titulo">Cadastrar Usuário</spam>
        </div>


        <div class="container" style="margin-top: 10px">
            <form action="../database/login.php?operacao=inserir" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Nome do
                                Usuário</label>
                            <input type="text" name="loginNome" class="form-control" required autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">E-mail</label>
                            <input type="email" name="email" class="form-control" autocomplete="off">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Senha do
                                Usuário</label>
                            <input id="txtSenha" type="password" name="password" class="form-control" required
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm" style="margin-top: 10px">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Repetir
                                Senha</label>
                            <input type="password" name="senhausuario2" class="form-control" required autocomplete="off"
                                oninput="validaSenha(this)">
                            <small>Precisa ser igual a senha digitada acima.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class='control-label' for='inputNormal' style="margin-top: -20px;">Cpf/Cnpj</label>
                            <input type="text" name="cpfCnpj" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group-select">
                            <label class="labelForm">Utiliza Token</label>
                            <select class="select form-control" style="padding-right: 100px;" name="pedeToken">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group-select">
                            <label class="labelForm">Empresa</label>
                            <select class="select form-control" style="padding-right: 100px;" name="idEmpresa" required>
                                <option value=""></option>
                                <?php
                                foreach ($empresas as $empresa) {
                                    $idEmpresa = $empresa['nomeEmpresa'] === "TradeSis" ? "null" : $empresa['idEmpresa'];
                                    ?>
                                    <option value="<?php echo $idEmpresa ?>"><?php echo $empresa['nomeEmpresa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="text-align:right; margin-top: 30px">
                    <button type="submit" class="btn  btn-success"><i
                            class="bi bi-sd-card-fill"></i>&#32;Cadastrar</button>
                </div>
        </div>
        </form>

    </div>

    </div>



    <script>
        function validaSenha(input) {
            if (input.value != document.getElementById('txtSenha').value) {
                input.setCustomValidity('Repita a senha corretamente');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $('input[name="loginNome"]').bind('input', function () {
                var c = this.selectionStart,
                    r = /[^a-z0-9 .]/gi,
                    v = $(this).val();
                if (r.test(v)) {
                    $(this).val(v.replace(r, ''));
                    c--;
                }
                this.setSelectionRange(c, c);
            });
        });
    </script>

</body>

</html>