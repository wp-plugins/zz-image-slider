<?php

class JSSOR_Settings {
    
    const SETTING_PREFIX = "ZZIS_se_";
    const SETTINGS_KEY_PREFIX = "ZZIS_Settings_";
    
    public $settings_array;   
    
    static $defaults;
    static $descriptions;
    
    function __construct() {
        self::get_defaults();
        self::get_descriptions();
    }

    static function get_defaults() {
        
        if ( isset(self::$defaults) )
            return self::$defaults;
        
        self::$defaults = array(            
            
            'AutoPlay' => true,
            'Transition' => '',            
            'StartIndex' => 0,            
            'Loop' => 1,
            'AutoPlaySteps' => 1,
            'AutoPlayInterval' => 3000,                        
            'SlideDuration' =>  500,
            'PauseOnHover' => 1,
            
            'FillMode' => 2,                                    
            'PlayOrientation' =>  1,
            'DragOrientation' =>  0,   
            'ArrowKeyNavigation' => false,

            'Responsive' => true,
            'SlideSpacing' =>  0,
            'SlideWidth' => '600',
            'SlideHeight' => '300',                                       
                                                                     
            'ShowBullets' =>  2,
            'BulletsSkin' => 1,
            'ShowArrows' =>  1,
            'ArrowsSkin' => 1,
            'ShowThumbnails' => 0,
            'ThumbnailsSkin' => 1,
            
            'ReadMoreButtonTitle' => __('Read More', ZZIS_TEXT_DOMAIN)
            
            //disabled - using defaults
//            'LazyLoading' => '1',                                  
//            'HWA' => true,                                    
//            'SlideEasing' =>  '$JssorEasing$.$EaseOutQuad',
//            'MinDragOffsetToSlide' =>  20,                                    
//            'DisplayPieces' =>  1,
//            'ParkingPosition' =>  0,
//            'UISearchMode' =>  1,
        );
          
        return self::$defaults;
    }
    
    static function get_descriptions() {
        
        if ( isset(self::$descriptions) )
            return self::$descriptions;
        
        self::$descriptions = array(
            'AutoPlay' => array(
                    'caption' => __('AutoPlay', ZZIS_TEXT_DOMAIN),
                    'type' => 'boolean',
                    'descr' => __('Whether to auto play, to enable slideshow, this option must be set to true. ', ZZIS_TEXT_DOMAIN),
                    'pro' => false
                ),
            'Transition' => array(
                    'caption' => __('Transition', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Slideshow transition', ZZIS_TEXT_DOMAIN),
                    'options' => array( __("default", ZZIS_TEXT_DOMAIN) => '', 
                                        __("right to left", ZZIS_TEXT_DOMAIN) => '{$Duration:400,x:-1,$Easing:$JssorEasing$.$EaseOutQuad}',
                                        __("left to right", ZZIS_TEXT_DOMAIN) => '{$Duration:400,x:1,$Easing:$JssorEasing$.$EaseOutQuad}',
                                        __("bounce down", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,y:1,$Easing:$JssorEasing$.$EaseInBounce}',
                                        __("bounce up", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,y:-1,$Easing:$JssorEasing$.$EaseInBounce}',
                                        __("bounce right", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,x:1,$Easing:$JssorEasing$.$EaseInBounce}',
                                        __("bounce left", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,x:-1,$Easing:$JssorEasing$.$EaseInBounce}',                        
                                        __("swicth", ZZIS_TEXT_DOMAIN) => '{$Duration:1400,x:0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1400,x:-0.25,$Zoom:1.5,$Easing:{$Left:$JssorEasing$.$EaseInWave,$Zoom:$JssorEasing$.$EaseInSine},$Opacity:2,$ZIndex:-10}}', 
                                        __("extrude replace", ZZIS_TEXT_DOMAIN) => '{$Duration:1600,x:-0.2,$Delay:40,$Cols:12}', 
                                        __("fade twins", ZZIS_TEXT_DOMAIN) => '{$Duration:700,$Opacity:2,$Brother:{$Duration:1000,$Opacity:2}}',
                                        __("rotate overlap", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,$Zoom:11,$Rotate:-1,$Easing:{$Zoom:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Round:{$Rotate:0.5},$Brother:{$Duration:1200,$Zoom:1,$Rotate:1,$Easing:$JssorEasing$.$EaseSwing,$Opacity:2,$Round:{$Rotate:0.5},$Shift:90}}',
                                        __("fly twins", ZZIS_TEXT_DOMAIN) => '{$Duration:1500,x:0.3}',
                                        __("rotate axis up overlap", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:0.25,y:0.5,$Rotate:-0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2,$Brother:{$Duration:1200,x:-0.1,y:-0.7,$Rotate:0.1,$Easing:{$Left:$JssorEasing$.$EaseInQuad,$Top:$JssorEasing$.$EaseInQuad,$Opacity:$JssorEasing$.$EaseLinear,$Rotate:$JssorEasing$.$EaseInQuad},$Opacity:2}}',
                                        __("return TB", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,y:-1,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}}',
                                        __("return LR", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Brother:{$Duration:1200,x:1,$Delay:40,$Cols:6,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Top:$JssorEasing$.$EaseInOutQuart,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2,$ZIndex:-10,$Shift:-100}}',
                                        __("swing outside in stairs", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15}',
                                        __("swing outside in zigzag", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15}',
                                        __("swing inside in stairs", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15}',
                                        __("swing inside in zigzag", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15}',
                                        __("dodge dance inside square", ZZIS_TEXT_DOMAIN) => '{$Duration:1500,x:0.2,y:-0.1,$Delay:20,$Cols:8,$Rows:4,$Clip:15}',
                                        __("flutter inside in", ZZIS_TEXT_DOMAIN) => '{$Duration:1800,x:1,$Delay:30,$Cols:10,$Rows:5,$Clip:15}',
                                        __("flutter inside in wind", ZZIS_TEXT_DOMAIN) => '{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15}',
                                        __("flutter inside in swirl", ZZIS_TEXT_DOMAIN) => '{$Duration:1800,x:1,y:0.2,$Delay:30,$Cols:10,$Rows:5,$Clip:15}',
                                        __("flutter inside in column", ZZIS_TEXT_DOMAIN) => '{$Duration:1500,x:0.2,y:-0.1,$Delay:150,$Cols:12,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:{$Left:$JssorEasing$.$EaseLinear,$Top:$JssorEasing$.$EaseOutWave,$Opacity:$JssorEasing$.$EaseLinear},$Assembly:260,$Opacity:2,$Round:{$Top:2}}',
                                        __("rotate zoom- in R", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1}',
                                        __("zoom+ in", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,$Zoom:11,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
                                        __("zoom- in", ZZIS_TEXT_DOMAIN) => '{$Duration:1200,$Zoom:1,$Easing:{$Zoom:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
                                        __("collapse stairs", ZZIS_TEXT_DOMAIN) => '{$Duration:1000,$Delay:30,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Easing:$JssorEasing$.$EaseOutQuad,$Assembly:2049}',
                                        __("collapse circle", ZZIS_TEXT_DOMAIN) => '{$Duration:800,$Delay:200,$Cols:8,$Rows:4,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Assembly:2049}',
                                        __("horizontal fly strape", ZZIS_TEXT_DOMAIN) => '{$Duration:800,x:1,$Delay:80,$Rows:8,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Assembly:513,$Opacity:2}',
                                        __("vertical bounce atripe", ZZIS_TEXT_DOMAIN) => '{$Duration:800,$Delay:150,$Cols:10,$Clip:1,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInBounce,$Assembly:264}',
                                        __("horizontal bounce atripe", ZZIS_TEXT_DOMAIN) => '{$Duration:800,$Delay:150,$Rows:5,$Clip:8,$Move:true,$Formation:$JssorSlideshowFormations$.$FormationCircle,$Easing:$JssorEasing$.$EaseInBounce,$Assembly:264}',
                                        __("float right random", ZZIS_TEXT_DOMAIN) => '{$Duration:600,x:-1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
                                        __("float up random", ZZIS_TEXT_DOMAIN) => '{$Duration:600,y:1,$Delay:50,$Cols:8,$Rows:4,$SlideOut:true,$Easing:{$Top:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseOutQuad},$Opacity:2}',
                        ),
                    'pro' => true
                                        
                ),             
            'StartIndex' => array(
                    'caption' => __('Start Index', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __('Index of slide to display when initialize, default value is 0 ', ZZIS_TEXT_DOMAIN),    
                    'pro' => false
                ),            
            'Loop' => array(
                    'caption' => __('Loop', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1 ', ZZIS_TEXT_DOMAIN),
                    'options' => array( __("stop", ZZIS_TEXT_DOMAIN) => 0, 
                                        __("loop", ZZIS_TEXT_DOMAIN) => 1, 
                                        __("rewind", ZZIS_TEXT_DOMAIN) => 3 ),
                    'pro' => false
                ),
            'AutoPlaySteps' => array(
                    'caption' => __('AutoPlay Steps', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __('Steps to go for each auto play request. Possible value can be 1, 2, -1, -2 ...', ZZIS_TEXT_DOMAIN),                    
                    'pro' => false
                ),            
            'AutoPlayInterval' => array(
                    'caption' => __('AutoPlay Interval', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __('Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing ', ZZIS_TEXT_DOMAIN),                    
                    'pro' => false
                ),             
            'SlideDuration' => array(
                    'caption' => __('Slide Duration', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __('Specifies default duration for right to left animation in milliseconds', ZZIS_TEXT_DOMAIN),
                    'pro' => false
                ),
            'PauseOnHover' => array(
                    'caption' => __('Pause On Hover', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Whether to pause when mouse over if a slider is auto playing, 0: no pause, 1: pause for desktop, 2: pause for touch device, 3: pause for desktop and touch device, 4: freeze for desktop, 8: freeze for touch device, 12: freeze for desktop and touch device, default value is 1 ', ZZIS_TEXT_DOMAIN),
                    'options' => array( __("no pause", ZZIS_TEXT_DOMAIN) => 0, 
                                        __("pause for desktop", ZZIS_TEXT_DOMAIN) => 1, 
                                        __("pause for touch device", ZZIS_TEXT_DOMAIN) => 2, 
                                        __("pause for desktop and touch device", ZZIS_TEXT_DOMAIN) => 3, 
                                        __("freeze for desktop", ZZIS_TEXT_DOMAIN) => 4, 
                                        __("freeze for touch device", ZZIS_TEXT_DOMAIN) => 8, 
                                        __("freeze for desktop and touch device", ZZIS_TEXT_DOMAIN) => 12),
                    'pro' => false
                ),             
            
            'FillMode' => array(
                    'caption' => __('Fill Mode', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('The way to fill image in slide, 0: stretch, 1: contain (keep aspect ratio and put all inside slide), 2: cover (keep aspect ratio and cover whole slide), 4: actual size, 5: contain for large image and actual size for small image, default value is 0 ', ZZIS_TEXT_DOMAIN),
                    'options' => array( __('stretch', ZZIS_TEXT_DOMAIN) => 0, 
                                        __('contain', ZZIS_TEXT_DOMAIN) => 1, 
                                        __('cover', ZZIS_TEXT_DOMAIN) => 2, 
                                        __('actual size', ZZIS_TEXT_DOMAIN) => 4, 
                                        __('contain for large image', ZZIS_TEXT_DOMAIN) => 5),
                    'pro' => false
                ),
            'PlayOrientation' => array(
                    'caption' => __('Play Orientation', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Orientation to play slide (for auto play, navigation), 1: horizontal, 2: vertical ', ZZIS_TEXT_DOMAIN),
                    'options' => array( __("horizontal", ZZIS_TEXT_DOMAIN) => 1, 
                                        __("vertical", ZZIS_TEXT_DOMAIN) => 2, 
                                        __("horizontal reverse", ZZIS_TEXT_DOMAIN) => 5, 
                                        __("vertical reverse", ZZIS_TEXT_DOMAIN) => 6 ),
                    'pro' => true,
                ),
            'DragOrientation' => array(
                    'caption' => __('Drag Orientation', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Orientation to drag slide, 0: no drag, 1: horizental, 2: vertical, 3: either (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0) ', ZZIS_TEXT_DOMAIN),
                    'options' => array( __("no drag", ZZIS_TEXT_DOMAIN) => 0, 
                                        __("horizontal", ZZIS_TEXT_DOMAIN) => 1, 
                                        __("vertical", ZZIS_TEXT_DOMAIN) => 2, 
                                        __("either", ZZIS_TEXT_DOMAIN) => 3 ),
                    'pro' => true,
                ),             
            'ArrowKeyNavigation' => array(
                    'caption' => __('Arrow Key Navigation', ZZIS_TEXT_DOMAIN),
                    'type' => 'boolean',
                    'descr' => __('Allows keyboard (arrow key) navigation or not ', ZZIS_TEXT_DOMAIN),
                    'pro' => true,
                ),
            
            'Responsive' => array(
                    'caption' => __('Responsive', ZZIS_TEXT_DOMAIN),
                    'type' => 'boolean',
                    'descr' => __('Enable responsive slider. If enabled, sliders width and height depends on sliders parent container width and height.', ZZIS_TEXT_DOMAIN),
                    'pro' => false,
                ),
            
            'SlideSpacing' => array(
                    'caption' => __('Slide Spacing', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __('Space between each slide in pixels ', ZZIS_TEXT_DOMAIN),
                    'pro' => false,
                ),
            'SlideWidth' => array(
                    'caption' => __('Slide Width', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __("Width of every slide in pixels", ZZIS_TEXT_DOMAIN),
                    'pro' => false,
                ),
            'SlideHeight' => array(
                    'caption' => __('Slide Height', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',
                    'descr' => __("Height of every slide in pixels", ZZIS_TEXT_DOMAIN),
                    'pro' => false,
                ),                         

            
            'ShowBullets' => array(
                    'caption' => __('Show Bullets', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Show navigation bullets', ZZIS_TEXT_DOMAIN),     
                    'options' => array(  
                                __('Never', ZZIS_TEXT_DOMAIN) => 0, 
                                __('Mouse Over', ZZIS_TEXT_DOMAIN) => 1, 
                                __('Always', ZZIS_TEXT_DOMAIN) => 2),
                    'pro' => false,
                    ),
            
            'BulletsSkin' => array(
                    'caption' => __('Bullets Skin', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Choose navigation bullets skin.', ZZIS_TEXT_DOMAIN),                                    
                    'options' => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17),
                    'pro' => true,
                    ),
            
            'ShowArrows' => array(
                    'caption' => __('Show Arrows', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Show navigation arrows.', ZZIS_TEXT_DOMAIN),
                    'options' => array(  
                                __('Never', ZZIS_TEXT_DOMAIN) => 0, 
                                __('Mouse Over', ZZIS_TEXT_DOMAIN) => 1, 
                                __('Always', ZZIS_TEXT_DOMAIN) => 2
                    ),
                    'pro' => false,
                ),
            'ArrowsSkin' => array(
                    'caption' => __('Arrows Skin', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Choose navigation arrows skin.', ZZIS_TEXT_DOMAIN),                                    
                    'options' => array(  
                                        1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21
                        ),
                    'pro' => true,
                ),
            'ShowThumbnails' => array(
                    'caption' => __('Show Thumbnails', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Show images thumbnails', ZZIS_TEXT_DOMAIN),
                    'options' => array(  
                                __('Never', ZZIS_TEXT_DOMAIN) => 0, 
                                __('Mouse Over', ZZIS_TEXT_DOMAIN) => 1, 
                                __('Always', ZZIS_TEXT_DOMAIN) => 2
                        ),
                    'pro' => true,
                ),
            'ThumbnailsSkin' => array(
                    'caption' => __('Thumbnails Skin', ZZIS_TEXT_DOMAIN),
                    'type' => 'array',
                    'descr' => __('Choose thumbnails skin.', ZZIS_TEXT_DOMAIN),                                    
                    'options' => array(  
                                        1,2,3,4,5,6,7,8,9,10,11,12
                        ),
                    'pro' => true,
                ),            
            
            'ReadMoreButtonTitle' => array(
                    'caption' => __('Read More Button Title', ZZIS_TEXT_DOMAIN),
                    'type' => 'text',                    
                    'descr' => '',                
                    'pro' => false,
            )
            
            
            
            
//disabled - using defaults            
//            'LazyLoading' => array(
//                    'caption' => __('LazyLoading', ZZIS_TEXT_DOMAIN),
//                    'type' => 'array',
//                    'descr' => __('For image with lazy loading format (<IMG src2="url" .../>), by default it will be loaded only when the slide comes.But an integer value (maybe 1, 2 or 3) indicates that how far of nearby slides should be loaded immediately as well, default value is 1. ', ZZIS_TEXT_DOMAIN),
//                    'options' => array( 1 => "1", 2 => "2", 3 => "3" )
//                ),
//            'HWA' => array(
//                    'caption' => __('HWA', ZZIS_TEXT_DOMAIN),
//                    'type' => 'boolean',
//                    'descr' => __('Enable hardware acceleration or not, default value is true', ZZIS_TEXT_DOMAIN)
//                ),
//            'SlideEasing' => array(
//                    'caption' => __('SlideEasing', ZZIS_TEXT_DOMAIN),
//                    'type' => 'array',
//                    'descr' => __('Specifies easing for right to left animation ', ZZIS_TEXT_DOMAIN),
//                    'options' => array( 'Ease Out Quad' => '$JssorEasing$.$EaseOutQuad', 
//                                        'Ease In Quad' => '$JssorEasing$.$EaseInQuad' )
//                ),
//            'MinDragOffsetToSlide' => array(
//                    'caption' => __('MinDragOffsetToSlide', ZZIS_TEXT_DOMAIN),
//                    'type' => 'text',
//                    'descr' => __('Minimum drag offset to trigger slide ', ZZIS_TEXT_DOMAIN)                    
//                ),
//
//            'DisplayPieces' => array(
//                    'caption' => __('DisplayPieces', ZZIS_TEXT_DOMAIN),
//                    'type' => 'text',
//                    'descr' => __('Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1)', ZZIS_TEXT_DOMAIN)                    
//                ),
//            'ParkingPosition' => array(
//                    'caption' => __('ParkingPosition', ZZIS_TEXT_DOMAIN),
//                    'type' => 'text',
//                    'descr' => __('The offset position to park slide (this options applys only when slideshow disabled)', ZZIS_TEXT_DOMAIN),                    
//                ),
//            'UISearchMode' => array(
//                    'caption' => __('UISearchMode', ZZIS_TEXT_DOMAIN),
//                    'type' => 'array',
//                    'descr' => __('The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc). ', ZZIS_TEXT_DOMAIN),
//                    'options' => array( __("parellel", ZZIS_TEXT_DOMAIN) => 0, 
//                                        __("recursive", ZZIS_TEXT_DOMAIN) => 1 )
//                ),

        );
                        
        return self::$descriptions;
    }
        
    static function get_setting_html_block( $name, $value ) {
        
        if ( self::$descriptions == null )
            self::get_descriptions();
        
        if ( self::$defaults == null )
            self::get_defaults();
        
        $item = self::$descriptions[ $name ];                
               
        if ( isset( $item ) ) {
            
            $pro_limit = !PROVERSION && $item['pro'];
            
            if ( !isset( $value ) )
                $value = self::$defaults[ $name ];
            
            switch ( $item['type'] ) {

                case 'boolean':
                    ?>
                    <tr>
                        <th scope="row"><label><?= $item['caption'] ?> <?= ( $pro_limit ? '<span class="pro_only">' . __("(PRO)", ZZIS_TEXT_DOMAIN) . '</span>' : "") ?></label></th>
                        <td>                            
                            <span class="dashicons dashicons-yes"></span> <input <?= ( $pro_limit ? "disabled" : "") ?> type="radio" name="ZZIS_se_<?= $name ?>"  value="true" <?php if( $value ) { echo 'checked'; } ?> />
                            <span class="dashicons dashicons-no"></span> <input <?= ( $pro_limit ? "disabled" : "") ?> type="radio" name="ZZIS_se_<?= $name ?>"  value="false" <?php if( !$value ) { echo 'checked'; } ?> />
                            <p class="description">
                                <?= $item['descr']  ?>                                        
                            </p>
                        </td>
                    </tr>
                    <?php
                    break;

                case 'array':
                  
                    ?>
                    <tr>
                        <th scope="row"><label><?= $item['caption'] ?> <?= ( $pro_limit ? '<span class="pro_only">' . __("(PRO)", ZZIS_TEXT_DOMAIN) . '</span>' : "") ?></label></th>
                        <td>
                            <select <?= ( $pro_limit ? "disabled" : "") ?> name="ZZIS_se_<?= $name ?>" id="ZZIS_se_<?= $name ?>">
                                <?php if ( array_key_exists(0, $item['options'] ) )  {?>
                                    <?php foreach ( $item['options'] as $val ) { ?>
                                    <option value="<?= $val ?>" <?= ($val == $value ? "selected" : "") ?>><?= $val ?></option>     
                                    <?php } ?>                                
                                <?php } else {?>
                                    <?php foreach ( $item['options'] as $key => $val ) { ?>
                                    <option value="<?= $val ?>" <?= ($val == $value ? "selected" : "") ?>><?= $key ?></option>     
                                    <?php } ?>
                                <?php }?>
                            </select>                            
                            <p class="description">
                                <?= $item['descr']  ?>   
                            </p>
                        </td>
                    </tr>
                    <?php
                    break;

                case 'text':
                default:

                    ?>
                    <tr>
                        <th scope="row"><label><?= $item['caption'] ?> <?= ( $pro_limit ? '<span class="pro_only">' . __("(PRO)", ZZIS_TEXT_DOMAIN) . '</span>' : "") ?></label></th>
                        <td>
                            <input <?= ( $pro_limit ? "disabled" : "") ?> type="text" name="ZZIS_se_<?= $name ?>" id="ZZIS_se_<?= $name ?>" value="<?php echo $value; ?>" />
                            <p class="description">
                                <?= $item['descr']  ?>   
                            </p>
                        </td>
                    </tr>
                    <?php                    
                    break;
            } 
            
            
        }
    }
    
    function get_html( $post_id ) {
        
        $zzis_post = get_post( $post_id );
                          
        if ( isset( $zzis_post ) ) {
        
            $images = unserialize(base64_decode( get_post_meta( $post_id, 'zzis_items_details', true )));
            $total_images =  get_post_meta( $post_id, 'zzis_items_total_count', true );
            
            if ( PROVERSION && file_exists( ZZIS_PLUGIN_DIR . "/lib/views/frontend/slider_PRO.php" ) ) {
                require ZZIS_PLUGIN_DIR . "/lib/views/frontend/slider_PRO.php"; 
            }
            else {
                require ZZIS_PLUGIN_DIR . "/lib/views/frontend/slider.php"; 
            }
            
        }        
    }
    
    function get_bullets_skin_hmtl ( $skin_id ) {
        
        require ZZIS_PLUGIN_DIR . "/lib/views/frontend/bullet-" . str_pad($skin_id, 2, '0', STR_PAD_LEFT) . ".php"; 
        
    }
    
    function get_arrows_skin_hmtl ( $skin_id ) {
        
        require ZZIS_PLUGIN_DIR . "/lib/views/frontend/arrow-" . str_pad($skin_id, 2, '0', STR_PAD_LEFT) . ".php"; 
        
    }    
    
    function get_thumbnails_skin_hmtl ( $skin_id ) {
        
        require ZZIS_PLUGIN_DIR . "/lib/views/frontend/thumbnail-" . str_pad($skin_id, 2, '0', STR_PAD_LEFT) . ".php"; 
        
    }
              
    function get( $name ) {
    
        if ( isset( $this->settings_array[ $name ] ) )
                return $this->settings_array[ $name ];
                   
        return self::$defaults[ $name ];
    
    }
    
    function get_string( $name ) {
                    
        if ( isset( $this->settings_array[ $name ] ) )
            $ret = $this->settings_array[ $name ];
        else                   
            $ret = self::$defaults[ $name ];
        
        if ($ret === true) 
            return "true";
        elseif ($ret === false) 
            return "false";
        else
            return $ret;
    }
    
    function get_js_option( $name, $separator = "" ) {
        
        $val = $this->get_string( $name );
        
        if ( $val != '' )
            return "$" . $name . ":" . $val . $separator;
        else
            return "";
    }
        
    function set( $name, $value ) {
        
        if ( !isset( $this->settings_array ) ) $this->settings_array = array();
        
        if ( $value == 'true' )
            $this->settings_array[$name] = true;
        elseif ( $value == 'false' )
            $this->settings_array[$name] = false;
        else
            $this->settings_array[$name] = $value;
    }
    
    function save( $post_id ) {
                            
        foreach($_POST as $key => $value) {
            
            if (strpos( $key, self::SETTING_PREFIX ) !== false) {
            
                $k = substr( $key,  strlen(self::SETTING_PREFIX) );                                 

                $this->set( $k, $_POST[ $key ] );

            }
        }
                
        update_post_meta( $post_id, self::SETTINGS_KEY_PREFIX . $post_id, serialize( $this->settings_array ) );
        
    }
    
    function load( $post_id ) {                      
        
        $this->settings_array = unserialize( get_post_meta( $post_id, self::SETTINGS_KEY_PREFIX . $post_id, true) );
        
    }
    
}



