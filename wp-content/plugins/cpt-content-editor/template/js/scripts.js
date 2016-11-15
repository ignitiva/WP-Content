jQuery(document).ready(function($) {
    $('.cpt_editor_featured_image_upload').click(function(e) {
        e.preventDefault();

        var custom_uploader = wp.media({
            title: 'Custom Image',
            button: {
                text: 'Upload Image'
            },
            multiple: false  // Set this to true to allow multiple files to be selected
        })
        .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            $('.cpt_editor_featured_image').attr('src', attachment.url).show();
            $('.cpt_editor_featured_image_url').val(attachment.url);

        })
        .open();
    });
});