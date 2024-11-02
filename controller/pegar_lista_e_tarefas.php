<?php

include_once '../model/link.php';


$id_lista = $_GET['id'];
$_SESSION['id_lista'] = $id_lista;

if ($id_lista > 0) {
    //print $listaId;
    $stmt = $conn->prepare("SELECT id,nome, descricao, data_criacao, data_conclusao, situacao, id_lista_tarefa FROM tarefas WHERE id_lista_tarefa = ?");
    $stmt->execute([$id_lista]);
    $tarefas = $stmt->fetchAll();
    
    if ($tarefas) {
        include "pegar_nome_lista.php";
        print "<div class='menu-overlay' id='menu'>
        <button class='close-btn' onclick='fecharMenu()'>×</button>
        <h3>Criar Tarefa</h3>
        <ul>
        <div id = 'formTarefa'>
            <div class='div-forms'>
            <li><input class='form-control' type='text' placeholder='Nome' name='nome_tarefa' id='nome_tarefa' required></li>
            <li><textarea class='form-control' placeholder='Descrição' name='descricao_tarefa' id='descricao_tarefa' required></textarea></li>
            <li><input class='form-control' type='date' placeholder='Data final' name='data_final' id='data_final' required></li>
            <button class='btn' onclick='criarTarefa(".$id_lista.")'>Confirmar</button>
            </div>
        </ul>
        </div>
        </div>";

        //NOME DA LISTA ATUAL
        print "<h2>".$lista[0]['nome']."</h2>";
        foreach ($tarefas as $tarefa) {
            
            print "<div class='form-chek card-tarefa id='tarefa-".$tarefa['id']."' style='margin-bottom: 2em'>";
            print "<input class='form-check-input' type='checkbox' value=''>
            <label class='form-check-label'>";
            print "<h2>" 
                    .$tarefa['nome'] . "</h2></strong> " .$tarefa['descricao'] .
                
                "<br><button class='btn btn-primary'>Editar tarefa</button> <button class='btn btn-danger' onclick='excluirTarefa(".$tarefa['id'].','.$tarefa['id_lista_tarefa']. ")'>Excluir Tarefa</button>
                </div>";
        }
        print "<button class='open-btn ' onclick=
        'abrirMenu()'>🖊 Nova Tarefa</button>";
        
    } else {
        print "<p>Nenhuma tarefa encontrada para esta lista.</p>";
    }
} else {
    print "<p>Lista de tarefas não encontrada.</p>";  
}
 
