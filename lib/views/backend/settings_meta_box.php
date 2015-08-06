<style>

.thumb-pro th, .thumb-pro label, .thumb-pro h3, .thumb-pro{
	color:#31a3dd !important;
	font-weight:bold;
}
.caro-pro th, .caro-pro label, .caro-pro h3, .caro-pro{
	color:#DA5766 !important;
	font-weight:bold;
}
</style>

<input type="hidden" id="zzis_settings_action" name="zzis_settings_action" value="zzis-settings-save-settings">
<table class="zzis-form-table">
	<tbody>
		<tr id="L3">
			<th scope="row" colspan="2"><h2>Configure Settings For Slider Shortcode: <?php echo "[" . ZZIS_SHORTCODE . " id=$post->ID]"; ?></h2><hr></th>
		</tr>
		
                <?php foreach( JSSOR_Settings::$descriptions as $key => $value ) { 
                    
                    JSSOR_Settings::get_setting_html_block($key, $se->get($key) );
                
                 } ?>                            
	</tbody>        
</table>

<input name="save" class="button button-primary button-large zzis-save-button" value="<?= __("Save", ZZIS_TEXT_DOMAIN) ?>" type="submit" />