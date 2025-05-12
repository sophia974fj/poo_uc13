<?php
require __DIR__."/../classes/curso.php";

//Inicializa as variáveis
$titulo = $aluno = $horas = $dias = "";
$cursoCriado = false;


//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $aluno = trim($_POST["aluno"]);
    $horas = trim($_POST["horas"]);
    $dias = trim($_POST["dias"]);
    
    try {
        $curso = new Curso($titulo, $aluno, $horas, $dias);
        $cursoCriado = true;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}

?>


<h2>Cadastro do Curso</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="form-control"
            value="<?= htmlspecialchars($titulo) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="aluno" class="form-label">Aluno:</label>
        <input type="text" name="aluno" id="aluno" class="form-control"
            value="<?= htmlspecialchars($aluno) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="horas" class="form-label">Horas:</label>
        <input type="number" name="horas" id="horas" class="form-control"
            value="<?= htmlspecialchars($horas) ?>">
    </div>

    <div class="col-md-5">
        <label for="dias" class="form-label">Dias:</label>
        <input type="number" name="dias" id="dias" class="form-control"
            value="<?= htmlspecialchars($dias) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

    
</form>

<?php
    if ($cursoCriado)
    {
        echo "<h3>Resultado:</h3>";
        $curso->exibirDados();
    }
?>