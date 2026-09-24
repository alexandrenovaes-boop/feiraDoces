<?php
require_once './config/config.php';
require_once ROOT_PATH . '/config/conexao.php';
require_once MODEL_PATH . '/DocesModel.php';
require_once CONTROLLER_PATH . '/DocesController.php';

$controller = new DocesController($conexao);

$action = $_GET['action'] ?? 'listar';
$id     = $_GET['id'] ?? null;

switch ($action) {

    
    case 'adicionar':
        include VIEW_PATH.'/doces/adicionar.php';
        break;

    
    case 'salvar':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade= $_POST['quantidade'];
       

        $controller->adicionar($id, $nome, $preco, $quantidade);
        header('Location: index.php?mensagem=Prato adicionado com sucesso!');
        exit();

    
    case 'editar':
        if ($id) {
            $prato = $controller->buscar($id);
            include '../views/doces/editar.php';
        }
        break;

    case 'atualizar':
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST = ['preco'];
        $quantidade = $_POST['quantidade'];
        

        $controller->editar($id, $nome, $preco, $quantidade);
        header('Location: index.php?mensagem = Doce atualizado com sucesso!');
        exit();

   
    case 'deletar':
        if ($id) {
            $controller->deletar($id);
            header('Location: index.php?mensagem= Doce deletado com sucesso!');
            exit();
        }
        break;

        case 'baixarEstoque':
    header('Content-Type: application/json');
    $dados = json_decode(file_get_contents('php://input'), true);

    if (!isset($dados['itens']) || !is_array($dados['itens'])) {
        http_response_code(400);
        echo json_encode(['erro' => 'Dados inválidos']);
        exit();
    }

    $resultado = $controller->baixarEstoque($dados['itens']);

    if (!$resultado['sucesso']) {
        http_response_code(409);
    }

    echo json_encode($resultado);
    exit();
  
    default:
        $doce = $controller->listar();
        include VIEW_PATH.'/doces/home.php';
        break;
}
