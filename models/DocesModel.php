<?php
class DocesModel {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    
    public function listarDoces() {
        $sql = "SELECT * FROM doces ORDER BY id DESC";
        return $this->conexao->query($sql);
    }

    
    public function buscarPratos($id) {
        $sql = "SELECT * FROM doces WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    
    public function adicionarPratos($nome, $preco, $quantidade) {
        $sql = "INSERT INTO pratos (nome, preco, quantidade) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sids", $nome, $preco, $quantidade);
            $resultado = $stmt->execute();
            $stmt->close();
            return $resultado;
        }

        echo "ERRO: " . $sql . "<br>" . $this->conexao->error;
        return false;
    }

  
    public function atualizarDoces($id, $nome, $preco, $quantidade) {
        $sql = "UPDATE doces SET nome = ?, preco = ?, quantidade = ?, WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sidsi", $id, $nome, $preco, $quantidade);
            $resultado = $stmt->execute();
            $stmt->close();
            return $resultado;
        }

        echo "ERRO: " . $sql . "<br>" . $this->conexao->error;
        return false;
    }

    
    public function deletarDoces($id) {
        $sql = "DELETE FROM doces WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }
}
