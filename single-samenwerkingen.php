<?php
get_header(); ?>
<main id="static">
    <div class="cont-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_title(); ?></h1>
                    <?php if (have_rows('header_static')) : ?>
                        <?php while (have_rows('header_static')) : the_row(); ?>
                            <?php the_sub_field('header_tekst'); ?>
                            <?php if (have_rows('knoppen')) : ?>
                                <?php while (have_rows('knoppen')) : the_row(); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('');
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/content', 'static'); ?>
</main>
<?php get_footer(); ?>