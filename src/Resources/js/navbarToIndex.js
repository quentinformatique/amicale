document.addEventListener('DOMContentLoaded', function () {
    const leftNavbar = document.querySelector('.navbar .left');
    if (leftNavbar) {
        leftNavbar.addEventListener('click', function () {
            window.location.href = '/';
        });
    }
});