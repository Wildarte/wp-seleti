jQuery(function ($) {
    function setPreview(id, previewEl, inputEl) {
        if (!id) {
            previewEl.html('');
            inputEl.val('');
            return;
        }
        wp.media.attachment(id).fetch().then(function () {
            var url = wp.media.attachment(id).get('url');
            previewEl.html('<img src="' + url + '" style="max-width:150px;height:auto;" />');
            inputEl.val(id);
        });
    }

    $(document).on('click', '.seleti-area-image-upload', function (e) {
        e.preventDefault();
        var button = $(this);
        var wrapper = button.closest('td, .form-field');
        var inputEl = wrapper.find('#seleti_area_image_id');
        var previewEl = wrapper.find('#seleti_area_image_preview');

        var frame = wp.media({
            title: 'Selecionar imagem',
            button: { text: 'Usar esta imagem' },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first();
            if (attachment) {
                setPreview(attachment.id, previewEl, inputEl);
            }
        });

        frame.open();
    });

    $(document).on('click', '.seleti-area-image-remove', function (e) {
        e.preventDefault();
        var wrapper = $(this).closest('td, .form-field');
        var inputEl = wrapper.find('#seleti_area_image_id');
        var previewEl = wrapper.find('#seleti_area_image_preview');
        setPreview('', previewEl, inputEl);
    });
});
