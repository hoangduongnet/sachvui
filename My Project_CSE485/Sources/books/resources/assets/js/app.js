require('./bootstrap');


$(document).ready(function () {
    $(".remove-book-form").submit(function (event) {
        if (!confirm('Bạn có muốn xóa sách này không?'))
            event.preventDefault();
    });
});
