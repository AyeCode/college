<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>

<?php if (get_theme_mod('college-show-loader', '1') == '1'): ?>

    <!-- Loader ...-->
    <canvas id="site-loader"></canvas>

<?php endif; ?>

<!-- Load Header area partials -->


<?php get_template_part('framework/partials/header-partials/mobile-navigation'); ?>

<section class="full-section-20" id="college-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

                <!-- Logo -->
                <?php get_template_part('framework/partials/header-partials/logo'); ?>

            </div>
            <div class="col-lg-8 clearfix">

                <!-- Main Navigation -->
                <?php get_template_part('framework/partials/header-partials/main-navigation'); ?>

            </div>
        </div>
    </div>
</section>

<!-- Load Header Image -->

<!-- Load Slider

- Slider is not enabled by default. You should enable it through the Customizer Section.
- It only appears at the frontpage by default.
-->
<?php
if (get_theme_mod('college-show-slider', '0') == '1' && is_front_page()):

    get_template_part('framework/partials/slider/slider');

endif;
?>

<!-- Load Header Image
- You can turn the header image on from the customizer settings.
- If the slider is enabled then the header is not visible.
- Header image should be of 1920x820px
-->
<?php if (college_get_header_image() != false && get_theme_mod('show-slider', '0') == '0' && is_front_page()): ?>
<section id="college-header-image">
    <?php echo college_get_header_image(); ?>
</section>

<?php endif; ?>
