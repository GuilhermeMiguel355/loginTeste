function criarTarefa(id_lista) {
    const nome_tarefa = document.getElementById('nome_tarefa').value;
    const descricao_tarefa = document.getElementById('descricao_tarefa').value;
    const data_final = document.getElementById('data_final').value;
    xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controller/criar_tarefa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onload = function() {
        if (this.status === 200) {
            document.getElementById('nome_tarefa').value = '';
            document.getElementById('descricao_tarefa').value = '';
            document.getElementById('data_final').value = '';
        }
    };
    
    xhttp.send(`nome_tarefa=${nome_tarefa}&descricao_tarefa=${descricao_tarefa}&data_final=${data_final}&id_lista=${id_lista}`);
    fecharMenu();
    carregarConteudo(id_lista);
}