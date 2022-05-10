$(document).ready(function() {
    $('.order-btn').click( () => {
        window.location.href = 'order.php';
        return false;
    });
    $('.menu-button').click( () => {
        window.location.href = 'menu.php';
        return false;
    });
});