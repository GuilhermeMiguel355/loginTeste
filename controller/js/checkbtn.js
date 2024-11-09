// function q muda o icone do botao quando apreta
function checkIcon(idCheck, situacao){

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/excluir_tarefa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var chkbtn = document.getElementById(idCheck);

    if (situacao == "completa") {
        chkbtn.textContent = "✅"; 
    }else{
        chkbtn.textContent = "⬜";
    }

}