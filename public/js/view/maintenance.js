// var url = window.location.href.toString();
// if (url.indexOf("?") > 0) {
//     var clean_url = url.substring(0, url.indexOf("?"));
//     window.history.replaceState({}, document.title, clean_url);
// }

$('#master-maintenance').on('click', '.modal-delete', function (event) {
    // Data Variables
    const button = $(event);
    const id = button.data("id");
    console.log(id);
    // Print HTML
    $('.input-maintenance-id').val(id);
});