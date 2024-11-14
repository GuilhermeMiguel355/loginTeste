function checarUsuario() {
    var usuario = document.getElementById('usuario').value;
    var botao = document.getElementById('bt-confirmar'); 

    
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) { 
            if (this.responseText.trim() === "existe") {
                document.getElementById('erro').innerText = "Usuário já existe!"; 
                botao.disabled = true;
            } else {
                document.getElementById('erro').innerText = "";
                botao.disabled = false; 
            }
        }
    };
    
    xhttp.open("GET", "../controller/check_usuario.php?usuario=" + usuario, true);
    xhttp.send();
}

document.getElementById('usuario').addEventListener('input', checarUsuario);
