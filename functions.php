<?php
/**
 * Main functions file to bootstrap the theme.
 */
/*
 * 1. Constants to help us throughout the theme.
 */
DEFINE('COLLEGE_CSS_PATH', get_template_directory_uri() . '/assets/css/');
DEFINE('COLLEGE_JS_PATH', get_template_directory_uri() . '/assets/js/');
DEFINE('COLLEGE_IMAGES_PATH', get_template_directory_uri() . '/assets/images/');
DEFINE('COLLEGE_FONTS_PATH', get_template_directory_uri() . '/assets/fonts/');
DEFINE('COLLEGE_STYLESHEET_PATH', get_stylesheet_uri());
DEFINE('COLLEGE_FRAMEWORK_PATH', get_template_directory_uri() . '/framework/');
DEFINE('COLLEGE_FRAMEWORK_REQUIRED_PATH', get_template_directory() . '/framework/');

/*
 * 2. After setup theme
 */
add_action('after_setup_theme', 'college_setup');
if (!function_exists('college_setup')):
    function college_setup()
    {

        if (!isset($content_width))
            $content_width = 750;

        add_theme_support('automatic-feed-links');
        load_theme_textdomain('college', get_template_directory() . '/languages');
        add_theme_support('html5', array('gallery', 'caption'));

        global $wp_version;
        if (version_compare($wp_version, '4.1', '>=')):
            add_theme_support('title-tag');
        endif;

        register_nav_menus(array(
            'main' => __('Main Navigation', 'college')
        ));
        add_editor_style('style.css');
        $college_bg_defaults = array(
            'default-color' => 'ffffff',
            'default-image' => '',
            'wp-head-callback' => 'college_bg_callback',
        );
        add_theme_support('custom-background', $college_bg_defaults);

        $college_header_defaults = array(
            'default-image' => '',
            'random-default' => false,
            'width' => '1920',
            'height' => '820',
            'flex-height' => false,
            'flex-width' => false,
            'default-text-color' => '',
            'header-text' => false,
            'uploads' => true,
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );

        add_theme_support('custom-header', $college_header_defaults);

        add_theme_support('post-thumbnails');
        add_image_size('slider-image', 1920, 850, true); // slider image size.
        add_image_size('staff-image', 520, 648, true); // staff image size.
        add_image_size('boxed-9', 847, 385, true); // slider image size.
        add_image_size('boxed-12', 1170, 550, true); // Single post type image (boxed 3/4 layout)
    }
endif;

/*
 * 3. Fallback Functions
 */
if (!function_exists('college_bg_callback')):

    function college_bg_callback()
    {
        $background = set_url_scheme(get_background_image());
        $color = get_theme_mod('background_color', get_theme_support('custom-background', 'default-color'));

        if (!$background && !$color)
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat'));
            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';
            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x'));
            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';
            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment'));
            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        }
        ?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo trim( $style ); ?>
            }
        </style>
        <?php
    }
endif;

/*
 * 4. Enqueue styles + scripts.
 */
add_action('wp_enqueue_scripts', 'college_styles');
if (!function_exists('college_styles')):
    function college_styles()
    {

       wp_enqueue_style('college-bootstrap', COLLEGE_CSS_PATH . 'bootstrap.min.css', '', '', 'all');
       wp_enqueue_style('college-bootstrap-theme', COLLEGE_CSS_PATH . 'bootstrap-theme.min.css', '', '', 'all');

        //Fonts
        wp_enqueue_style('college-roboto-slab-font', COLLEGE_FONTS_PATH . 'Roboto-Slab/font-roboto-minified.css', '', '', 'all');
        wp_enqueue_style('college-ubuntu-font', COLLEGE_FONTS_PATH . 'Ubuntu/font-ubuntu-minified.css', '', '', 'all');
        wp_enqueue_style('college-fontawesome-font', COLLEGE_CSS_PATH . 'font-awesome.min.css', '', '', 'all');

        wp_enqueue_style('college-wp-default', COLLEGE_CSS_PATH . 'wordpress-default-min.css', '', '', 'all');
        wp_enqueue_style('college-animate-css', COLLEGE_CSS_PATH . 'animate.min.css', '', '', 'all');
        wp_enqueue_style('college-navigation-menu', COLLEGE_CSS_PATH . 'navigation-menu.css', '', '', 'all');
        wp_enqueue_style('college-navigation-menu-mobile', COLLEGE_CSS_PATH . 'jquery.sidr.dark.css', '', '', 'all');


        wp_enqueue_style('college-slider-css', COLLEGE_CSS_PATH . 'slider.css', '', '', 'all');
        wp_enqueue_style('college-swiper-css', COLLEGE_CSS_PATH . 'swiper.min.css', '', '', 'all');

        wp_enqueue_style('college-main-stylesheets', COLLEGE_STYLESHEET_PATH);
        wp_enqueue_style('college-responsive-stylesheets', COLLEGE_CSS_PATH . 'responsive.css', '', '', 'all');
    }
endif;

add_action('wp_enqueue_scripts', 'college_scripts');
if (!function_exists('college_scripts')):
    function college_scripts()
    {
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        wp_enqueue_script('college-bootstrap', COLLEGE_JS_PATH . 'bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('college-sidr', COLLEGE_JS_PATH . 'jquery.sidr.min.js', array('jquery'), '', true);
        wp_enqueue_script('college-matchHeight', COLLEGE_JS_PATH . 'jquery.matchHeight-min.js', array('jquery'), '', true);

        wp_enqueue_script('college-swiper', COLLEGE_JS_PATH . 'swiper.min.js', array('jquery'), '', true);
        wp_enqueue_script('college-main-js', COLLEGE_JS_PATH . 'main-js.js', array('jquery'), '', true);
    }
endif;

add_action('wp_head', 'college_html5shiv');
function college_html5shiv()
{
    echo '<!--[if lt IE 9]>';
    echo '<script src="' . COLLEGE_JS_PATH . 'html5shiv.min.js"></script>';
    echo '<![endif]-->';
}
function college_upsell_notice(){
    // Enqueue the script
    wp_enqueue_script(
        'prefix-customizer-upsell',
        get_template_directory_uri() . '/assets/js/upsell.js',
        array(), '1.0.0',
        true
    );

    wp_localize_script(
        'prefix-customizer-upsell',
        'prefixL10n',
        array(
            'prefixURL' => esc_url('http://ketchupthemes.com/college-theme'),
            'prefixLabel' => __('Upgrade to Pro', 'college') ,
            'paragraphText'=>__('Upgrade to a full feature college theme. Add staff, modules, courses, events plus many more!','college'),
            'premiumSpanTxt'=>__('- OR CHECK -','college'),
            'premiumDemoTxt'=>__('Premium Demo','college'),
            'premiumDemoUrl'=>esc_url('http://ketchupthemes.com/themes-demo/?theme=College')
        )
    );


}
add_action('customize_controls_enqueue_scripts', 'college_upsell_notice');

/*
 * 5. Comments
 */
if(!function_exists('college_comment')):
    function college_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <div class="row">

            <div class="col-md-2">


                <div class="comment-author vcard">
                    <?php
                    if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>

                </div>

            </div>

            <div class="col-md-10">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'college'); ?></em>
                    <br/>
                <?php endif; ?>

                <?php printf(__('<cite class="fn">%s</cite>','college'), get_comment_author_link()); ?>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                        <?php
                        printf(__('%1$s at %2$s', 'college'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)', 'college'), '  ', '');
                    ?>
                </div>
                <hr class="comment-name-hr">

                <div class="college_comment_body">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>
        </div>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
        <?php endif; ?>
        <?php
    }
endif;
/*
 * 6. Widgets Initialization
 */
/**== Add some sidebars ==**/
add_action('widgets_init','college_sidebars');
function college_sidebars(){

    /**== Right sidebar ==**/
    register_sidebar( array(
        'name'              => __( 'Sidebar', 'college' ),
        'id'                => 'sidebar',
        'description'       => __( 'This is the main sidebar.It is in every page - post. However you can override this setting from within each post.',
            'college' ),
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));

    /**== Footer Sidebar 1 ==**/
    register_sidebar( array(
        'name'              => __( 'Footer Sidebar 1', 'college' ),
        'id'                => 'college-footer-1',
        'description'       => __( 'This is the sidebar in the footer, on the left', 'college' ),
        'before_widget'     => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));
    /**== Footer Sidebar 1 ==**/
    register_sidebar( array(
        'name'              => __( 'Footer Sidebar 2', 'college' ),
        'id'                => 'college-footer-2',
        'description'       => __( 'This is the sidebar in the footer, the second on the left', 'college' ),
        'before_widget'     => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));
    /**== Footer Sidebar 1 ==**/
    register_sidebar( array(
        'name'              => __( 'Footer Sidebar 3', 'college' ),
        'id'                => 'college-footer-3',
        'description'       => __( 'This is the sidebar in the footer, the second on the right', 'college' ),
        'before_widget'     => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));
    /**== Footer Sidebar 1 ==**/
    register_sidebar( array(
        'name'              => __( 'Footer Sidebar 4', 'college' ),
        'id'                => 'college-footer-4',
        'description'       => __( 'This is the sidebar in the footer, on the right', 'college' ),
        'before_widget'     => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));
}
/*
 * Misc Functions that apply to this file
 */
if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    function restaurante_wp_title($title,
                                  $sep)
    {
        if (is_feed()) {
            return $title;
        }
        global $page, $paged;

        $title .= get_bloginfo('name', 'display');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(__('Page %s', 'college'), max($paged, $page));
        }
        return $title;
    }

    add_filter('wp_title', 'college_wp_title', 10, 2);
endif;
/*
 * . Required Files
 */
require_once(COLLEGE_FRAMEWORK_REQUIRED_PATH . 'college-init.php');