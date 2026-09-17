<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Doces</title>
</head>
<body>

<h1>Cadastrar Doces</h1>

<form action="index.php?action=salvar" method="post">
    <label for="nome">Nome do Doce</label><br>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="tempo_preparo">Preco (R$):</label><br>
    <input type="number" step="1" min="1" max="600" name="preco" id="preco" required><br><br>

    <label for="nota">Quantidade</label><br>
    <input type="number" name="nota" id="nota" step="0.1" min="0" max="5" required><br><br>

    <label for="categoria">Categoria</label><br>
    <select name="categoria" id="categoria">
        <option value="entrada">Entrada</option>
        <option value="prato_principal">Prato Principal</option>
        <option value="sobremesa">Sobremesa</option>
        <option value="bebida">Bebida</option>
    </select><br><br>

    <input type="submit" value="Salvar">
</form>

<br>
<a href="index.php">Voltar para o cardápio</a>

</body>
</html>
