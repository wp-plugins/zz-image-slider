<script>
        jQuery(document).ready(function ($) {

            var options = { 
                
                <?= $this->get_js_option("AutoPlay", ",\n") ?>                
                <?= $this->get_js_option("StartIndex", ",\n") ?>
                <?= $this->get_js_option("Loop", ",\n") ?>
                <?= $this->get_js_option("AutoPlaySteps", ",\n") ?>
                <?= $this->get_js_option("AutoPlayInterval", ",\n") ?>                
                <?= $this->get_js_option("SlideDuration", ",\n") ?>
                <?= $this->get_js_option("PauseOnHover", ",\n") ?>
                <?= $this->get_js_option("FillMode", ",\n") ?>
                <?= $this->get_js_option("PlayOrientation", ",\n") ?>
                <?= $this->get_js_option("SlideSpacing", ",\n") ?>              
                $DragOrientation: 0,
                $HWA: true

                <?php if ( $this->get("ShowBullets") > 0 )  { ?>
                ,$BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: <?= $this->get("ShowBullets") ?>,//[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
                <?php } ?>

                <?php if ( $this->get("ShowArrows") > 0 )  { ?>
                ,$ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: <?= $this->get("ShowArrows") ?>, //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
                <?php } ?>
                
                

            };
            var jssor_slider<?= $zzis_post->ID ?> = new $JssorSlider$('zzis_container_<?= $zzis_post->ID ?>', options);                    

            <?php if ( $this->get("Responsive" ) ) { ?>
            function ScaleSlider<?= $zzis_post->ID ?>() {
                var bodyWidth = jQuery('#zzis_container_<?= $zzis_post->ID ?>').parent().width();
                if (bodyWidth)
                    jssor_slider<?= $zzis_post->ID ?>.$ScaleWidth(Math.min(bodyWidth, 1920));
                else
                    window.setTimeout(ScaleSlider<?= $zzis_post->ID ?>, 30);
            }
            ScaleSlider<?= $zzis_post->ID ?>();

            jQuery(window).bind("load", ScaleSlider<?= $zzis_post->ID ?>);
            jQuery(window).bind("resize", ScaleSlider<?= $zzis_post->ID ?>);
            jQuery(window).bind("orientationchange", ScaleSlider<?= $zzis_post->ID ?>);   
            <?php } ?>
        }); 

</script>

<div id="zzis_container_<?= $zzis_post->ID ?>" class="zzis_container" style="position: relative; overflow: hidden; top: 0px; left: 0px; width: <?= $this->get("SlideWidth") ?>px; height: <?= $this->get("SlideHeight") ?>px;">    
    <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: <?= $this->get("SlideWidth") ?>px; height: <?= $this->get("SlideHeight") ?>px;">
        <?php foreach ($images as $img) { ?>
            <div>
                <img u="image" class="zzis-slide-img" src="<?= $img['zzis_image_url'] ?>" />
                
                <h1 class="zzis-slide-title"><?= $img['zzis_image_label'] ?> </h1>
                                
                <h2 class="zzis-slide-desc"><?= $img['zzis_image_desc'] ?> </h2>
                
                <?php if ( $img['zzis_image_readmore_link'] != '' ) { ?>
                <div class="zzis-slide-readmore-btn">
                    <a class="zzis-slide-readmore-btn-link" href="<?= $img['zzis_image_readmore_link'] ?>"><?= $this->get_string("ReadMoreButtonTitle") ?></a>
                </div>
                <?php } ?>                                
            </div>
        <?php } ?>                                        
    </div>
    
    <?php 
        if ( $this->get("ShowArrows") > 0 )  { 
            $this->get_arrows_skin_hmtl ( $this->get( "ArrowsSkin" ) );
        }
        if ( $this->get("ShowBullets") > 0 )  { 
            $this->get_bullets_skin_hmtl ( $this->get( "BulletsSkin" ) );
        }
    ?>

</div>

