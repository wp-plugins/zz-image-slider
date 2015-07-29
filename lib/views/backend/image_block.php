<li class="zzis-image-entry" id="zzis_img">
    <a class="gallery_remove zzis_remove" href="#" id="zzis_remove_bt" ><img src="<?php echo ZZIS_PLUGIN_URL . 'img/close-icon.png'; ?>" /></a>
    <div class="zzis-admin-inner-div1" >
        <img src="<?php echo $url; ?>" class="zzis-meta-image" alt=""  style="">
        <input type="hidden" id="unique_string[]" name="unique_string[]" value="<?php echo $unique_string; ?>" />        
    </div>
    <div class="zzis-admin-inner-div2" >
        <input type="hidden" id="zzis_image_url[]" name="zzis_image_url[]"  value="<?php echo $url; ?>" />
        <p>
            <label><?php _e("Slide Title", ZZIS_TEXT_DOMAIN) ?></label>
            <input type="text" id="zzis_image_label[]" name="zzis_image_label[]" value="<?php echo $name; ?>" placeholder="<?php _e("Enter Slide Title", ZZIS_TEXT_DOMAIN) ?>" class="zzis-label-text">
        </p>
        <p>
            <label><?php _e("Slide Description", ZZIS_TEXT_DOMAIN) ?></label>
            <textarea rows="4" cols="50" id="zzis_image_desc[]" name="zzis_image_desc[]" placeholder="<?php _e("Enter Slide Description", ZZIS_TEXT_DOMAIN) ?>" class="zzis-label-text"><?php echo $desc; ?></textarea>
        </p>
        <p>
            <label><?php _e("Read More Link", ZZIS_TEXT_DOMAIN) ?></label>
            <input type="text" id="zzis_image_readmore_link[]" name="zzis_image_readmore_link[]" value="<?php echo $readmorelink; ?>" placeholder="<?php _e("Enter Read More Link", ZZIS_TEXT_DOMAIN) ?>" class="zzis-label-text">
        </p>
    </div>
</li>
