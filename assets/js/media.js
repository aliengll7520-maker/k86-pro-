jQuery(document).ready(function ($) {

    $('.k86-upload-image').on('click', function (e) {

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

        });

        frame.open();

    });

});
