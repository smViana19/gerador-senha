<?php

if (isset($_POST['tamanho'])) {
    $tamanh = intval($_POST['tamanho']);
    $minuscula = isset($_POST['minuscula']);
    $maiuscula = isset($_POST['maiuscula']);
    $simbolos = isset($_POST['simbolos']);
    $numeros = isset($_POST['numeros']);

    if (!$minuscula && !$maiuscula && !$simbolos && !$numeros) {
        echo "Erro ao gerar uma senha, selecione pelo menos uma opção!";
    }

    $minuscula_caract = "abcdefghijklmnopqrstuvwxyz";
    $maiuscula_caract = "ABCDEFGHIJKLMNOPQRSTUVWYZ";
    $simbolos_caract = "!@#$%&*()_+=";
    $numeros_caract = "0123456789";

    $senha = "";
    $opcao_valida = "";

    if ($minuscula) {
        $opcao_valida .= $minuscula_caract;
    }

    if ($maiuscula) {
        $opcao_valida .= $maiuscula_caract;
    }

    if ($simbolos) {
        $opcao_valida .= $simbolos_caract;
    }

    if ($numeros) {
        $opcao_valida .= $numeros_caract;
    }

    for ($i = 0; $i < $tamanh; $i++) {
        $random_n = rand(0, strlen($opcao_valida) - 1); // gerar um numero aleatorio de 0 a valida option
        $senha .= $opcao_valida[$random_n];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerador de senhas</title>
</head>

<body>
    <div class="container">
        <?php if (isset($senha)) { ?>
            <h4>Senha gerada</h4>
            <input type="text" class="senha-gerada" readonly value="<?php echo $senha; ?>">
        <?php } ?>

        <form method="POST" action="">
            <div class="content"><label for="">Tamanho da senha</label>
                <input type="number" min="6" required value="1" name="tamanho">
            </div>
            <div class="content"><label for="">Minuscula</label>
                <input type="checkbox" value="1" checked name="minuscula">
            </div>
            <div class="content"><label for="">Maiuscula</label>
                <input type="checkbox" value="1" checked name="maiuscula">
            </div>
            <div class="content"><label for="">Simbolos</label>
                <input type="checkbox" value="1" checked name="simbolos">
            </div>
            <div class="content"><label for="">Numeros</label>
                <input type="checkbox" value="1" checked name="numeros">
            </div>


            <button>Gerar</button>
        </form>

    </div>


</body>

</html>