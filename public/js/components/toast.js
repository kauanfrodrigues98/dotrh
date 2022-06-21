const showToast = (title = '', body = '', icon = '') => {
    $(document).Toasts('create', {
        title: title,
        subtitle: new Date().getHours()+':'+new Date().getMinutes(),
        body: body,
        position: 'topRight',
        icon: icon,
        fade: true
    })
}
