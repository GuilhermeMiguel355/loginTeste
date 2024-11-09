<?php
include("../model/link.php");
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_lista = $_POST['id_lista'];
    $situacao = $_POST['situacao'];
    try {
        $sql = "UPDATE INTO tarefas SET situacao = ? WHERE id= ?";
        $stmt = $conn->prepare($sql);
        if ($situacao == "pendente") {
            $stmt->execute(["completa", $id_lista ]);
        }else{
            $stmt->execute(["pendente", $id_lista ]);
        }
        
    } catch (PDOException $e) {
        echo "Erro ao inserir tarefa: " . $e->getMessage();
    }
    
}