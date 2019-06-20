<?php
get_header(); ?>
<main>
    <?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
    <?php $logo = get_field('logo'); ?>
    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_field("werknemers_archive_title", "option"); ?></h1>
                    <?php if (get_field("werknemers_archive_intro", "option")) { ?>
                        <p><?php the_field("werknemers_archive_intro", "option"); ?></p>
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
    <section id="ourteam">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <h2><?php the_field('titel_team', 'option'); ?></h2>
                    <?php the_field('content_team', 'option'); ?>
                    <?php if (have_rows('knoppen', 'option')) : ?>
                        <?php while (have_rows('knoppen', 'option')) : the_row(); ?>
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                            <?php } ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="members">
        <div class="container">
            <div class="row">
                <?php $loop = new WP_Query(array(
                    'post_type' => 'werknemers',
                    'posts_per_page' => 12,
                    'order' => 'DESC'
                )); ?>
                <?php if ($loop->have_posts()) : ?>
                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                        <div class="col-lg-4 col-md-6 single-member">
                            <?php $profielfoto_werknemer = get_field('profielfoto_werknemer'); ?>
                            <?php if ($profielfoto_werknemer) { ?>
                                <div class="member-img" style="background-image:url(<?php echo $profielfoto_werknemer['sizes']['medium']; ?>);">
                                    <div class="content-member">
                                        <div class="inner">
                                            <?php the_field('tekst_van_werknemer'); ?>
                                            <?php if (have_rows('contact_werknemer')) : ?>
                                                <?php while (have_rows('contact_werknemer')) : the_row(); ?>
                                                    <?php $mail = get_sub_field('mail'); ?>
                                                    <?php if ($mail) { ?>
                                                        <a href="<?php echo $mail['url']; ?>" target="<?php echo $mail['target']; ?>">
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M20.9 14.25L16.5 17.0625L12.1 14.25V13.125L16.5 15.9375L20.9 13.125V14.25ZM20.9 12H12.1C11.4895 12 11 12.5006 11 13.125V19.875C11 20.1734 11.1159 20.4595 11.3222 20.6705C11.5285 20.8815 11.8083 21 12.1 21H20.9C21.1917 21 21.4715 20.8815 21.6778 20.6705C21.8841 20.4595 22 20.1734 22 19.875V13.125C22 12.5006 21.505 12 20.9 12Z" fill="#03314C" fill-opacity="0.25" />
                                                                <rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
                                                            </svg>
                                                        </a>
                                                    <?php } ?>
                                                    <?php $linkedin = get_sub_field('linkedin'); ?>
                                                    <?php if ($linkedin) { ?>
                                                        <a href="<?php echo $linkedin['url']; ?>" target="<?php echo $linkedin['target']; ?>">
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8936 11.3349C12.8936 12.0769 12.335 12.6706 11.4382 12.6706H11.4217C10.5582 12.6706 10 12.0769 10 11.3349C10 10.5771 10.5752 10 11.4551 10C12.335 10 12.8769 10.5771 12.8936 11.3349ZM12.7241 13.7255V21.4534H10.1521V13.7255H12.7241ZM21.9998 21.4534L22 17.0224C22 14.6487 20.7311 13.544 19.0385 13.544C17.6729 13.544 17.0615 14.2941 16.7202 14.8203V13.7256H14.1478C14.1817 14.4508 14.1478 21.4536 14.1478 21.4536H16.7202V17.1377C16.7202 16.9067 16.7369 16.6763 16.8049 16.511C16.9908 16.0495 17.414 15.5718 18.1246 15.5718C19.0557 15.5718 19.4279 16.2805 19.4279 17.3189V21.4534H21.9998Z" fill="#03314C" fill-opacity="0.24" />
                                                            </svg>
                                                        </a>
                                                    <?php } ?>
                                                    <?php $telefoon = get_sub_field('telefoon'); ?>
                                                    <?php if ($telefoon) { ?>
                                                        <a href="<?php echo $telefoon['url']; ?>" target="<?php echo $telefoon['target']; ?>">
                                                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="0.5" y="0.5" width="31" height="31" rx="4.5" stroke="#03314C" stroke-opacity="0.25" />
                                                                <path d="M12.4133 15.1933C13.3733 17.08 14.92 18.6267 16.8067 19.5867L18.2733 18.12C18.46 17.9333 18.72 17.88 18.9533 17.9533C19.7 18.2 20.5 18.3333 21.3333 18.3333C21.5101 18.3333 21.6797 18.4036 21.8047 18.5286C21.9298 18.6536 22 18.8232 22 19V21.3333C22 21.5101 21.9298 21.6797 21.8047 21.8047C21.6797 21.9298 21.5101 22 21.3333 22C18.3275 22 15.4449 20.806 13.3195 18.6805C11.194 16.5551 10 13.6725 10 10.6667C10 10.4899 10.0702 10.3203 10.1953 10.1953C10.3203 10.0702 10.4899 10 10.6667 10H13C13.1768 10 13.3464 10.0702 13.4714 10.1953C13.5964 10.3203 13.6667 10.4899 13.6667 10.6667C13.6667 11.5 13.8 12.3 14.0467 13.0467C14.12 13.28 14.0667 13.54 13.88 13.7267L12.4133 15.1933Z" fill="#03314C" fill-opacity="0.25" />
                                                            </svg>
                                                        </a>
                                                    <?php } ?>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            <?php } ?>
                            <h3><?php the_title(); ?></h3>
                            <span class="function"><?php the_field('functie_werknemer'); ?></span>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>