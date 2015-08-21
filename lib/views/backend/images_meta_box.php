<div id="rpggallery_container">
    <ul id="zzis_thumbs" class="clearfix">
        <?php
        $items = unserialize(base64_decode(get_post_meta($post->ID, 'zzis_items_details', true)));
        $total_items = get_post_meta($post->ID, 'zzis_items_total_count', true);
        if ($total_items) {
            foreach ($items as $item) {
                $name = $item['zzis_image_label'];
                $desc = $item['zzis_image_desc'];
                $readmorelink = $item['zzis_image_readmore_link'];
                $readmorelink_type = $item['zzis_image_readmore_link_type']; // 0 - button, 1 - whole image
                $url = $item['zzis_image_url'];                
                $visible = ( isset($item['zzis_image_visible']) ? $item['zzis_image_visible'] : "1"); 

                require ZZIS_PLUGIN_DIR . "/lib/views/backend/image_block.php";

            }
        } else {
            $total_items = 0;
        }
        ?>
    </ul>
</div>
<div class="zzis-image-entry zzis-add-new-image" id="zzis_upload_button" data-uploader_title="Upload Image" data-uploader_button_text="Select" >
          
        <div class="dashicons dashicons-plus"></div>
        <p>
            <?php _e('Add New Images', ZZIS_TEXT_DOMAIN); ?>
        </p>
    
</div>
<div style="clear:left;"></div>
