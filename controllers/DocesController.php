<?php
class DocesController {
    private $DocesModel;

    public function __construct($conexao) {
        $this->DocesModel = new DocesModel($conexao);
    }

    public function listar() {
        return $this->DocesModel->listarDoces();
    }

    public function adicionar($nome, $preco, $quantidade) {
        return $this->DocesModel->adicionarDoces( $nome, $preco, $quantidade);
    }

    public function editar($id, $nome, $preco, $quantidade) {
        return $this->DocesModel->atualizarDoces($id, $nome, $preco, $quantidade);
    }

    public function deletar($id) {
        return $this->DocesModel->deletarDoces($id);
    }

    public function buscar($id) {
        return $this->DocesModel->buscarDoces($id);
    }
}
