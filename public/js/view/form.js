$('#master-form').on('click', '.modal-delete', function (event) {
    // Data Variables
    const button = $(event);
    const id = button.data("id");
    console.log(id);
    // Print HTML
    $('.input-form-id').val(id);
});