$('.booking_button').on('click', function (event) {
    const button = $(this); // Button that triggered the modal
    const room_id = button.data('room-id'); // Extract room_id from data-room-id attribute
    const form = $('#booking_form');

    form.attr({
        action: $('#form_action').val(),
        method: "post"
    })
    form.find('#room_id_input').val(room_id);
    form.submit();
});

$(".scroll-link").on('click', function (event) {
    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    const hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    $('html, body').animate({
        scrollTop: $(hash).offset().top
    }, 500, function () {
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
});
$(document).ready(function () {
    $('#booking_success_modal').modal('show');
});
