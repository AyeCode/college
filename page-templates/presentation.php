<?php
/*
* Template Name: Presentation - FrontPage
*/
get_header();
$front_image_1 = get_theme_mod('college-front-image-1', '');
$front_image_2 = get_theme_mod('college-front-image-2', '');
$front_image_3 = get_theme_mod('college-front-image-3', '');
$staff_1 = get_theme_mod('college-staff-1', '');
$staff_2 = get_theme_mod('college-staff-2', '');
$staff_3 = get_theme_mod('college-staff-3', '');
$staff_4 = get_theme_mod('college-staff-4', '');
?>
    <section class="full-section-60">
        <?php
        if (have_posts()):
            while (have_posts()):the_post();

                the_content();
            endwhile;
        endif;
        ?>
    </section>

<?php if ($front_image_1 != '' && $front_image_2 != ''): ?>
    <section class="full-section-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?php echo esc_url_raw($front_image_1); ?>" class="img-responsive"/>
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo esc_url_raw($front_image_2); ?>" class="img-responsive"/>
                </div>
                <div class="col-lg-4">
                    <img src="<?php echo esc_url_raw($front_image_3); ?>" class="img-responsive"/>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php $college_staff_args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post__in' => array($staff_1, $staff_2, $staff_3, $staff_4),
    'orderby' => 'post__in');

$college_staff_query = new WP_Query($college_staff_args);

if ($college_staff_query->have_posts()) : ?>
    <section class="full-section-60-pt" id="frontpage-staff">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?php echo __('Staff','college'); ?></h3>
                </div>
                <?php while ($college_staff_query->have_posts()): $college_staff_query->the_post(); ?>
                    <div class="col-md-3 single-staff">
                        <figure class="snip1194">
                            <?php if (has_post_thumbnail()):the_post_thumbnail('staff-image'); endif; ?>
                            <figcaption>
                                <h4><?php the_title(); ?></h4>
                            </figcaption>

                            <a href="<?php the_permalink(); ?>" title="<?php echo __('View this member of staff', 'college'); ?>"></a>
                        </figure>

                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
<?php get_footer();