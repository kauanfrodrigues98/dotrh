jQuery(function($) {
    checkFlash();
});

const salvar = () => {
    let senha = $("#password").val();
    let repetir_senha = $("#repeat_password").val();

    if(empty(senha) || empty(repetir_senha)) {
        showToast('Aviso!', 'Os campos de senha devem ser informados.', 'fas fa-exclamation-triangle');
        return false;
    }

    if(senha !== repetir_senha) {
        showToast('Aviso!', 'As senhas informadas são diferentes!', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}
