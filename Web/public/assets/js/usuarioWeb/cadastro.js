var btnVisible = document.getElementById('setVisible');
var fieldSenha = document.getElementById('senha');
var iconVisible = document.getElementById('iconVisible');

btnVisible.onclick = function () {
    if (fieldSenha.type == "password") {
        fieldSenha.type = "text";
        iconVisible.className = "fas fa-eye";
    } else {
        fieldSenha.type = "password";
        iconVisible.className = "fas fa-eye-slash";
    }
};

$('#telefone').mask('(99)99999-9999');