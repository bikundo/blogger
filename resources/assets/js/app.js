$(function () {
    $('a').each(function () {
        if ($(this).prop('href') == window.location.href) {
            $(this).parent().addClass('active');
        }
    });
});
notie.setOptions({
    animationDelay: 400,
    backgroundClickDismiss: true
});
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#laraToken').getAttribute('value');
