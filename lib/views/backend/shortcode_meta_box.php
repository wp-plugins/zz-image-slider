<p><?php _e("Use below shortcode in any Page/Post to publish your slider", ZZIS_TEXT_DOMAIN);?></p>
<input readonly="readonly" type="text" value="<?php echo "[" . ZZIS_SHORTCODE . " id=".get_the_ID()."]"; ?>">
<p><?php _e("Use below PHP code in any php file to publish your slider", ZZIS_TEXT_DOMAIN);?></p>
<input readonly="readonly" type="text" value="<?php echo "<?= ZZIS(" . get_the_ID() . ") ?>"; ?>">
