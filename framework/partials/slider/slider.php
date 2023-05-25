<?php
$slide1 = '';
$slide2 = '';
$slide3 = '';
if(get_theme_mod('college-slide-1','') != ""):
    $slide1 = esc_attr(get_theme_mod('college-slide-1',''));
endif;
if(get_theme_mod('college-slide-2','') != ""):
    $slide2 = esc_attr(get_theme_mod('college-slide-2',''));
endif;
if(get_theme_mod('college-slide-3','') != ""):
    $slide3 = esc_attr(get_theme_mod('college-slide-3',''));
endif;
$college_slider_args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post__in'=>array($slide1,$slide2,$slide3),
    'orderby'=>'post__in');

$college_slider_query = new WP_Query($college_slider_args);

if ($college_slider_query->have_posts()): //if there are slides
    ?>

    <section id="college-slider" style="height:100vh;">
        <div class="swiper-container" style="height:100%;">

            <div class="swiper-wrapper">
                <?php while ($college_slider_query->have_posts()):$college_slider_query->the_post(); ?>

                    <?php
                    $thumb_id = get_post_thumbnail_id();
                    $image_info = wp_get_attachment_image_src($thumb_id, 'full');
                    ?>
                    <div class="swiper-slide">

                        <div class="college-single-slide" style="background:url('<?php echo $image_info[0]; ?>') no-repeat center;
                            display:block;
                            background-size:cover;
                            height:100%;
                            width:100%; padding-top:50%;">

                            <!-- Slide Content -->

                            <div class="college-slide-content animated fadeInLeft">
                                <h1><?php the_title(); ?></h1>
                                <?php the_content(); ?>

                            </div>

                            <!-- Slide Link -->
                            <a href="<?php echo esc_url(get_the_permalink()); ?>" class="college-slide-link"></a>


                        </div>

                    </div>


                <?php endwhile; ?>
            </div>
            <!-- Pagination -->
            <?php if (get_theme_mod('show-slider-pagination', '0') == '1'): ?>

                <div class="swiper-pagination"></div>

            <?php endif; ?>
            <!-- Navigation -->
            <?php if (get_theme_mod('show-slider-navigation', '1') == '1'): ?>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            <?php endif; ?>

        </div>
    </section>

<?php endif;
wp_reset_postdata(); ?>

