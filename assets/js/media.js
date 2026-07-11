jQuery(function ($) {

    let frame = null;

    $(document).on('click', '#k86-upload-image', function (e) {

        e.preventDefault();

        if (frame) {
            frame.open();
            return;
        }

        frame = wp.media({

            title: k86Pro.title,

            button: {
                text: k86Pro.button
            },

            multiple: false

        });

        frame.on('select', function () {

            const attachment = frame
                .state()
                .get('selection')
                .first()
                .toJSON();

            $('#image').val(attachment.url);

            $('#k86-image-preview').html(

                '<img src="' +
                attachment.url +
                '" style="max-width:220px;border-radius:10px;border:1px solid #ddd;">'

            );

        });

        frame.open();

    });

    $(document).on('click', '#k86-remove-image', function (e) {

        e.preventDefault();

        $('#image').val('');

        $('#k86-image-preview').html('');

    });

});
