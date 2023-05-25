<?php
/*
 * Single posts . It can be boxed or full width.
 */
get_header();

if (have_posts()):while (have_posts()):the_post(); ?>

    <!-- This section contains the full item content+ sidebars -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- Title -->
        <section id="single-title-container">

            <?php get_template_part('/framework/partials/common-partials/title'); ?>

        </section>
        <!-- Breadcrumb -->

        <section id="single-breadcrumb-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php get_template_part('/framework/partials/common-partials/breadcrumb'); ?>

                    </div>
                </div>
            </div>
        </section>

        <!-- Content , differs when the layout is full or boxed. -->
        <?php
            get_template_part('/framework/partials/main-content/boxed-9-content');
        ?>
    </article>
    <!-- Full section ends here -->
<?php endwhile; endif;

get_footer();