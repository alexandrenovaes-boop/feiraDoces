<?php
require_once './config/config.php';
require_once ROOT_PATH . '/config/conexao.php';
require_once MODEL_PATH . '/DocesModel.php';
require_once CONTROLLER_PATH . '/DocesController.php';

$controller = new DocesController($conexao);

// AJUSTE o nome da variável de conexão abaixo para o que seu config.php usa
// (ex: $conexao, $conn, $mysqli...)

$dados = json_decode(file_get_contents('php://input'), true);

if (!isset($dados['itens']) || !is_array($dados['itens'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'Dados inválidos']);
    exit;
}

$conexao->begin_transaction();

try {
    $stmt = $conexao->prepare(
        "UPDATE doces SET quantidade = quantidade - ? WHERE nome = ? AND quantidade >= ?"
    );

    foreach ($dados['itens'] as $item) {
        $nome = $item['nome'];
        $qtd = (int) $item['quantidade'];

        $stmt->bind_param('isi', $qtd, $nome, $qtd);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            throw new Exception("Estoque insuficiente para: $nome");
        }
    }

    $conexao->commit();
    echo json_encode(['sucesso' => true]);

} catch (Exception $e) {
    $conexao->rollback();
    http_response_code(409);
    echo json_encode(['erro' => $e->getMessage()]);
}

$stmt->close();