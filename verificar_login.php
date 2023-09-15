<?php
//Lucas 10/04/2023 modificado a header para ser redirecionado para painel.php
//gabriel 220323 11:19 adicionado idcliente
// helio 26012023 16:16

include_once 'conexao.php';
$nomeEmpresa = $_POST['nomeEmpresa'];
$loginNome = $_POST['loginNome'];
$vpassword = $_POST['password'];

$dados = array();
$apiEntrada = array(
        'nomeEmpresa' => $nomeEmpresa,
        'loginNome' => $loginNome,
        'vpassword' => $vpassword
);
$dados = chamaAPI(null, '/sistema/login/verifica', json_encode($apiEntrada), 'GET');


$statusLogin = $dados['statusLogin'];
$user = $dados['loginNome'];
$idLogin = $dados['idLogin'];
$idEmpresa = $dados['idEmpresa'];
$idCliente = $dados['idCliente'];
$idUsuario = $dados['idUsuario'];
$nomeEmpresa = $dados['nomeEmpresa'];
$email = $dados['email'];
$pedeToken = $dados['pedeToken'];
$timeSessao = $dados['timeSessao'];

if (!$user == "") {

        if ($pedeToken == 1) {
                if ($statusLogin == 0) {
                        header('Location: auth.php?idLogin=' . $idLogin . '&email=' . $email);
                } else {
                        header('Location: autenticar.php?' . http_build_query(['apiEntrada' => $apiEntrada]));
                }
        } else {
                session_start();

                $_SESSION['START'] = time();
                $_SESSION['LAST_ACTIVITY'] = time(); 
                $_SESSION['usuario'] = $user;
                $_SESSION['idLogin'] = $idLogin;
                $_SESSION['idEmpresa'] = $idEmpresa;
                $_SESSION['idCliente'] = $idCliente;
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['email'] = $email;
                $_SESSION['timeSessao'] = $timeSessao;

                setcookie('Empresa', $nomeEmpresa, strtotime("+1 year"), "/", "", false, true );
                setcookie('User', $user, strtotime("+1 year"), "/", "", false, true );

                header('Location: ' . URLROOT . '/sistema/');
        }
} else {
        $mensagem = $dados['retorno'];
        header('Location: login.php?mensagem=' . $mensagem);
}