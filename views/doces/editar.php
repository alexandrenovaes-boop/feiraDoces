<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Doces</title>
</head>
<body>

<h1>Editar Doces</h1>

<?php if ($doce): ?>
<form action="index.php?action=atualizar" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($doce['id']) ?>">

    <label for="nome">Nome do doce</label><br>
    <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($doce['nome']) ?>" required><br><br>

    <label for="tempo_preparo">Preço (R$):</label><br>
    <input type="number" step="1" min="1" max="600" name="preco" id="preco" value="<?= htmlspecialchars($doce['preco']) ?>" required><br><br>

    <label for="nota">Quantidade</label><br>
    <input type="number" name="nota" id="nota" step="0.1" min="0" max="5" value="<?= htmlspecialchars($doce['quantidade']) ?>" required><br><br>

   

    <input type="submit" value="Atualizar">
</form>
<?php else: ?>
    <p>Prato não encontrado.</p>
<?php endif; ?>

<br>
<a href="index.php">Voltar para o cardápio</a>

</body>
</html>
