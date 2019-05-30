<!-- Template name: Contactpagina
 -->

<?php
get_header(); ?>

<div class="cont-header">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-9">
                <h1><?php the_title(); ?></h1>
                <?php if (have_rows('header_contact')) : ?>
                    <?php while (have_rows('header_contact')) : the_row(); ?>
                        <?php the_sub_field('tekst'); ?>
                        <?php if (have_rows('knoppen_header')) : ?>
                            <?php while (have_rows('knoppen_header')) : the_row(); ?>
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

<main>
    <section class="contact-p">
        <div class="container">
            <div class="row">
                <?php if (have_rows('content_contact')) : ?>
                    <?php while (have_rows('content_contact')) : the_row(); ?>
                        <?php if (have_rows('bedrijfsgegevens')) : ?>
                            <?php while (have_rows('bedrijfsgegevens')) : the_row(); ?>
                                <div class="col-md-5">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                    <?php the_sub_field('extra_informatie'); ?>
                                    <?php if (have_rows('gegevens')) : ?>
                                        <table class="company-info">
                                            <tbody>
                                                <?php while (have_rows('gegevens')) : the_row(); ?>
                                                    <tr>
                                                        <td><?php the_sub_field('titel'); ?></td>
                                                        <td><?php the_sub_field('gegevens'); ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <?php if (have_rows('knoppen')) : ?>
                                        <?php while (have_rows('knoppen')) : the_row(); ?>
                                            <?php $knop = get_sub_field('knop'); ?>
                                            <?php if ($knop) { ?>
                                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if (have_rows('contactformulier')) : ?>
                            <?php while (have_rows('contactformulier')) : the_row(); ?>
                                <div class="offset-md-1 col-md-5">
                                    <h2><?php the_sub_field('titel'); ?></h2>
                                    <?php the_sub_field('extra_informatie'); ?>
                                    <?php $form = get_sub_field('contactformulier_shortcode'); ?>
                                    <?php echo do_shortcode($form);?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>



<?php get_footer(); ?>