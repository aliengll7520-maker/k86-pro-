
jQuery(function ($) {

    console.log("K86 Media Loaded");

    $('#k86-upload-image').on('click', function (e) {

        e.preventDefault();

        var frame = wp.media({
            title: 'Chọn ảnh sản phẩm',
            button: {
                text: 'Sử dụng ảnh này'
            },
            multiple: false
        });

        frame.on('select', function () {

            var attachment = frame.state().get('selection').first().toJSON();

            $('#image').val(attachment.url);

            $('#k86-image-preview').html(
                '<img src="' + attachment.url + '" style="max-width:200px;">'
            );

        });

        frame.open();

    });

});
