
<?php
require_once 'Usuario.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    if ($usuario->validarLogin($email, $senha)) {
        // Iniciar sessão e redirecionar
        session_start();
        $_SESSION['usuario'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('E-mail ou senha inválidos!'); window.location.href='index.php';</script>";
    }
}
?>
