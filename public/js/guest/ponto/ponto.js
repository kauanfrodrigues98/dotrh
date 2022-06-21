jQuery(function($) {
    checkFlash();
});

const getHours = () => {
    const clock = document.getElementsByClassName('clock')[0]
    const date = new Date()
    const hours = date.getHours()
    const minutes = date.getMinutes()
    const seconds = date.getSeconds()
    const hour = hours < 10 ? `0${hours}` : hours
    const minute = minutes < 10 ? `0${minutes}` : minutes
    const second = seconds < 10 ? `0${seconds}` : seconds
    clock.innerHTML = `${hour}:${minute}:${second}`
}

setInterval(() => {
    getHours()
}, 1000)


const salvar = () => {
    let horas = $(".clock").html();
    let ponto = $("#ponto").val(horas);

    if ( empty(ponto) ) {
        showToast('Aviso!', 'Não conseguimos capturar o horário.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}
