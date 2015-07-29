jQuery(function (jQuery) {

    var file_frame,
            zzis = {
                admin_thumb_ul: '',
                init: function () {
                    this.admin_thumb_ul = jQuery('#zzis_thumbs');
                    this.admin_thumb_ul.sortable({
                        placeholder: '',
                        revert: true,
                    });
                    this.admin_thumb_ul.on('click', '.zzis_remove', function () {
                        if (confirm(strings.delete)) {
                            jQuery(this).parent().fadeOut(1000, function () {
                                jQuery(this).remove();
                            });
                        }
                        return false;
                    });

                    jQuery('#zzis_upload_button').on('click', function (event) {
                        event.preventDefault();
                        if (file_frame) {
                            file_frame.open();
                            return;
                        }

                        file_frame = wp.media.frames.file_frame = wp.media({
                            title: jQuery(this).data('uploader_title'),
                            button: {
                                text: jQuery(this).data('uploader_button_text'),
                            },
                            multiple: true
                        });

                        file_frame.on('select', function () {
                            var images = file_frame.state().get('selection').toJSON(),
                                    length = images.length;
                            for (var i = 0; i < length; i++) {
                                zzis.get_thumbnail_uris(images[i]['id']);
                            }
                        });
                        file_frame.open();
                    });


                },
                get_thumbnail_uris: function (id, cb) {
                    cb = cb || function () {
                    };
                    var data = {
                        action: 'zzis_get_thumbnail',
                        imageid: id
                    };
                    jQuery.post(ajaxurl, data, function (response) {
                        zzis.admin_thumb_ul.append(response);
                        cb();
                    });
                }
            };
    zzis.init();
});