document.addEventListener('DOMContentLoaded', function () {
    var elem = document.querySelector('.grid');
    var msnry = new Masonry(elem, {
        itemSelector: '.grid-item',
        columnWidth: 32,
    });
});