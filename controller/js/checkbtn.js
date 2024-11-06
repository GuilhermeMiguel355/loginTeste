// function q muda o icone do botao quando apreta
function checkIcon(){
    var chkbtn = document.getElementById("checkbtn");

    // enquanto for ⬜ muda para ✅. se for ✅ volta para ⬜
    if (chkbtn.textContent === "⬜") {
        chkbtn.textContent = "✅";
            } else {
        chkbtn.textContent = "⬜";
    }
}