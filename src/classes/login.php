
<?php
 
include 'src/class/usuario.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
 
    $usuarioObj = new usuario();
    $usuario = $usuarioObj->autenticar($email, $senha);
 
    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['email'];
        header("Location: /poo");
        exit();
    } else {
        echo "Login inválido!";
    }
}
?>