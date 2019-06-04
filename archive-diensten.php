<?php
get_header(); ?>
<main>
    <?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_field("diensten_archive_title", "option"); ?></h1>
                    <?php if (get_field("diensten_archive_intro", "option")) { ?>
                        <p><?php the_field("diensten_archive_intro", "option"); ?></p>
                    <?php } ?>
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
    <section id="services-overview">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-6">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="service">
                                <?php if (have_rows('informatie_dienst')) : ?>
                                    <?php while (have_rows('informatie_dienst')) : the_row(); ?>
                                        <?php $imgService = get_sub_field('dienst_afbeelding'); ?>
                                        <div class="smallimg" style="background-image:url(<?php if ($imgService) { ?><?php echo $imgService['sizes']['serviceshome']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                        </div>
                                        <div class="information">
                                            <h4><?php the_title(); ?></h4>
                                            <span class="excerpt">
                                                <?php
                                                $omschrijving = get_sub_field('korte_omschrijving');
                                                echo mb_strimwidth($omschrijving, 0, 50, '...'); ?>
                                            </span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="the-link"></a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side">
                    <?php get_template_part('template-parts/widget', 'helparchive'); ?>
                </div>
            </div>
    </section>
    <section id="pagination">
        <div class="d-flex justify-content-center">
            <?php echo paginate_links(array(
                'prev_text' => '
        <span class="prev">
        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 9.49354V6.01033C16 5.52776 15.6179 5.13953 15.143 5.13953H8.00089V1.37331C8.00089 0.596842 7.07957 0.208609 6.53677 0.756489L0.251757 7.13512C-0.0839214 7.47618 -0.0839214 8.02769 0.251757 8.36875L6.53677 14.7438C7.076 15.2916 8.00089 14.9034 8.00089 14.1269V10.3643H15.143C15.6179 10.3643 16 9.97611 16 9.49354Z" fill="#00A651"/>
        </svg>
        </span>',
                'next_text' => '<span class="next"> 
        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 9.49354V6.01033C0 5.52776 0.3821 5.13953 0.857047 5.13953H7.99911V1.37331C7.99911 0.596842 8.92043 0.208609 9.46323 0.756489L15.7482 7.13512C16.0839 7.47618 16.0839 8.02769 15.7482 8.36875L9.46323 14.7438C8.924 15.2916 7.99911 14.9034 7.99911 14.1269V10.3643H0.857047C0.3821 10.3643 0 9.97611 0 9.49354Z" fill="#00A651"/>
        </svg>
        </span>'

            )); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>