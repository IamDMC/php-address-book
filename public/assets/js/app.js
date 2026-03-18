$(document).ready(function () {

    let timer;

    $('#search').on('keyup', function () {

        clearTimeout(timer);

        let query = $(this).val();

        timer = setTimeout(function () {

            $.ajax({
                url: '/contacts/search',
                method: 'GET',
                data: { q: query },

                success: function (response) {
                    $('#contact-list').html(response);
                }
            });

        }, 300);

    });

});

$(document).on('click', '.delete-btn', function (e) {

    if (!confirm('Wirklich löschen?')) {
        e.preventDefault();
    }

});