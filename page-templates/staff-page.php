<?php
/*
 * Template Name: Staff
 */
get_header(); ?>
<?php
if (have_posts()):while (have_posts()):the_post(); ?>

    <!-- This section contains the full item content+ sidebars -->
    <article id="full-container-<?php echo get_the_title(get_queried_object_id()); ?>">

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


        <!-- Content  -->
        <?php
        get_template_part('/framework/partials/main-content/boxed-9-content');
        ?>
    </article>
    <!-- Full section ends here -->
<?php endwhile; endif;

get_footer();