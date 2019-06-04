<?php
get_header(); ?>
<main>
    <?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
    <?php $logo = get_field('logo'); ?>
    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php the_field("vacatures_archive_title", "option"); ?></h1>
                    <?php if (get_field("vacatures_archive_intro", "option")) { ?>
                        <p><?php the_field("vacatures_archive_intro", "option"); ?></p>
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
    <section id="vacansies">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-md-6">
                    <?php
                    $today = date('Y-m-d');
                    $loop = new WP_Query(array(
                        'post_type' => array('vacatures'),
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'uitlichten_tot_en_met',
                                'value' => $today,
                                'compare' => '>=',
                                'type' => 'DATE'
                            )
                        ),
                    )); ?>
                    <?php if ($loop->have_posts()) : ?>
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            <div class="vacansie featured" data-scroll>
                                <?php $featured = get_field('upload_featured_afbeelding'); ?>
                                <div class="image" style="background-image:url(<?php if ($featured) { ?><?php echo $featured['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                                    <div class="featured"><?php _e('Aanbevolen', 'leerbouwen'); ?></div>
                                </div>
                                <div class="logo" style="background-image:url(<?php if ($logo) { ?><?php echo $logo['sizes']['vacaturesmall']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                </div>
                                <div class="information">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if (get_sub_field('functie')) { ?>
                                        <span class="function"><?php the_sub_field('functie'); ?></span>
                                    <?php } ?>
                                    <?php the_sub_field('functie'); ?>
                                    <?php if (have_rows('informatie_vacature')) : ?>
                                        <?php while (have_rows('informatie_vacature')) : the_row(); ?>
                                            <?php if (get_sub_field('bedrijfsnaam')) { ?>
                                                <span class="company">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.5 1.7386V0.486526H8.33359V1.74496H5.79199V6.49629C7.76188 7.23969 9.16684 9.1443 9.16684 11.3712C9.16684 12.5476 8.3902 14.4763 6.79258 17.2676C6.56949 17.6573 6.3459 18.0359 6.13019 18.3933H12.3338V14.56H13.5837V18.3933H19.9998V1.74707L17.5 1.7386ZM12.2087 13.2593H9.83379V12.0094H12.2087V13.2593ZM12.2087 10.7593H9.83379V9.50941H12.2087V10.7593ZM12.2087 8.31687H9.83379V7.06699H12.2087V8.31687ZM12.2087 5.81688H9.83379V4.56699H12.2087V5.81688ZM16.0837 13.2593H13.7088V12.0094H16.0837V13.2593ZM16.0837 10.7593H13.7088V9.50941H16.0837V10.7593ZM16.0837 8.31687H13.7088V7.06699H16.0837V8.31687ZM16.0837 5.81688H13.7088V4.56699H16.0837V5.81688Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M3.95902 10.1211C3.26973 10.1211 2.70898 10.6819 2.70898 11.3712C2.70898 12.0605 3.26973 12.6212 3.95902 12.6212C4.64832 12.6212 5.20906 12.0605 5.20906 11.3712C5.20906 10.6819 4.64832 10.1211 3.95902 10.1211Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M3.95852 7.41266C1.77578 7.41266 0 9.18848 0 11.3712C0 13.0629 2.51105 17.2834 3.95852 19.5135C5.40594 17.283 7.91703 13.0619 7.91703 11.3712C7.91707 9.1884 6.14129 7.41266 3.95852 7.41266ZM3.95855 13.8711C2.58008 13.8711 1.45863 12.7496 1.45863 11.3712C1.45863 9.9927 2.58008 8.87125 3.95855 8.87125C5.33703 8.87125 6.45848 9.9927 6.45848 11.3712C6.45848 12.7496 5.33703 13.8711 3.95855 13.8711Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('bedrijfsnaam'); ?>
                                                </span>
                                            <?php } ?>
                                            <?php if (get_sub_field('locatie')) { ?>
                                                <span class="location-va">
                                                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.3609 4.97781C13.2902 4.71099 13.1466 4.4267 13.0404 4.17779C11.7694 1.10222 8.99214 0 6.74967 0C3.74772 0 0.441419 2.02672 0 6.20428V7.05777C0 7.09339 0.0121924 7.41335 0.029511 7.57341C0.27696 9.56432 1.83726 11.6802 3.00255 13.6712C4.25624 15.8042 5.55713 17.9026 6.84596 20C7.64068 18.6312 8.43254 17.2445 9.20915 15.9112C9.42081 15.5199 9.66651 15.1288 9.87839 14.7553C10.0196 14.5067 10.2894 14.258 10.4127 14.0266C11.6663 11.7156 13.6842 9.38679 13.6842 7.09335V6.15117C13.6843 5.90254 13.3782 5.03142 13.3609 4.97781ZM6.80463 9.26236C5.92221 9.26236 4.95633 8.8181 4.47958 7.59121C4.40855 7.39592 4.41428 7.00453 4.41428 6.96868V6.41757C4.41428 4.85352 5.73327 4.14226 6.88074 4.14226C8.29339 4.14226 9.38594 5.28019 9.38594 6.70252C9.38594 8.12479 8.21728 9.26236 6.80463 9.26236Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('locatie'); ?>
                                                </span>
                                            <?php } ?>
                                            <?php if (get_sub_field('uur_per_week')) { ?>
                                                <span class="hours">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM10 17.8722C5.65933 17.8722 2.12762 14.3409 2.12762 10C2.12762 5.65912 5.65933 2.12783 10 2.12783C14.3407 2.12783 17.8724 5.65912 17.8724 10C17.8724 14.3409 14.3407 17.8722 10 17.8722Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M15.2111 9.69123H10.7171V4.28777C10.7171 3.83306 10.3484 3.46439 9.8937 3.46439C9.43898 3.46439 9.07031 3.83306 9.07031 4.28777V10.5146C9.07031 10.9693 9.43898 11.338 9.8937 11.338H15.2111C15.6658 11.338 16.0345 10.9693 16.0345 10.5146C16.0345 10.0599 15.6658 9.69123 15.2111 9.69123Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('uur_per_week'); ?>
                                                </span>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="the-link"></a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="vacansie" data-scroll>
                                <div class="logo" style="background-image:url(<?php if ($logo) { ?><?php echo $logo['url']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                </div>
                                <div class="information">
                                    <h4><?php the_title(); ?></h4>
                                    <?php if (have_rows('informatie_vacature')) : ?>
                                        <?php while (have_rows('informatie_vacature')) : the_row(); ?>
                                            <?php if (get_sub_field('bedrijfsnaam')) { ?>
                                                <span class="company">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.5 1.7386V0.486526H8.33359V1.74496H5.79199V6.49629C7.76188 7.23969 9.16684 9.1443 9.16684 11.3712C9.16684 12.5476 8.3902 14.4763 6.79258 17.2676C6.56949 17.6573 6.3459 18.0359 6.13019 18.3933H12.3338V14.56H13.5837V18.3933H19.9998V1.74707L17.5 1.7386ZM12.2087 13.2593H9.83379V12.0094H12.2087V13.2593ZM12.2087 10.7593H9.83379V9.50941H12.2087V10.7593ZM12.2087 8.31687H9.83379V7.06699H12.2087V8.31687ZM12.2087 5.81688H9.83379V4.56699H12.2087V5.81688ZM16.0837 13.2593H13.7088V12.0094H16.0837V13.2593ZM16.0837 10.7593H13.7088V9.50941H16.0837V10.7593ZM16.0837 8.31687H13.7088V7.06699H16.0837V8.31687ZM16.0837 5.81688H13.7088V4.56699H16.0837V5.81688Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M3.95902 10.1211C3.26973 10.1211 2.70898 10.6819 2.70898 11.3712C2.70898 12.0605 3.26973 12.6212 3.95902 12.6212C4.64832 12.6212 5.20906 12.0605 5.20906 11.3712C5.20906 10.6819 4.64832 10.1211 3.95902 10.1211Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M3.95852 7.41266C1.77578 7.41266 0 9.18848 0 11.3712C0 13.0629 2.51105 17.2834 3.95852 19.5135C5.40594 17.283 7.91703 13.0619 7.91703 11.3712C7.91707 9.1884 6.14129 7.41266 3.95852 7.41266ZM3.95855 13.8711C2.58008 13.8711 1.45863 12.7496 1.45863 11.3712C1.45863 9.9927 2.58008 8.87125 3.95855 8.87125C5.33703 8.87125 6.45848 9.9927 6.45848 11.3712C6.45848 12.7496 5.33703 13.8711 3.95855 13.8711Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('bedrijfsnaam'); ?>
                                                </span>
                                            <?php } ?>
                                            <?php if (get_sub_field('locatie')) { ?>
                                                <span class="location-va">
                                                    <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.3609 4.97781C13.2902 4.71099 13.1466 4.4267 13.0404 4.17779C11.7694 1.10222 8.99214 0 6.74967 0C3.74772 0 0.441419 2.02672 0 6.20428V7.05777C0 7.09339 0.0121924 7.41335 0.029511 7.57341C0.27696 9.56432 1.83726 11.6802 3.00255 13.6712C4.25624 15.8042 5.55713 17.9026 6.84596 20C7.64068 18.6312 8.43254 17.2445 9.20915 15.9112C9.42081 15.5199 9.66651 15.1288 9.87839 14.7553C10.0196 14.5067 10.2894 14.258 10.4127 14.0266C11.6663 11.7156 13.6842 9.38679 13.6842 7.09335V6.15117C13.6843 5.90254 13.3782 5.03142 13.3609 4.97781ZM6.80463 9.26236C5.92221 9.26236 4.95633 8.8181 4.47958 7.59121C4.40855 7.39592 4.41428 7.00453 4.41428 6.96868V6.41757C4.41428 4.85352 5.73327 4.14226 6.88074 4.14226C8.29339 4.14226 9.38594 5.28019 9.38594 6.70252C9.38594 8.12479 8.21728 9.26236 6.80463 9.26236Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('locatie'); ?>
                                                </span>
                                            <?php } ?>
                                            <?php if (get_sub_field('uur_per_week')) { ?>
                                                <span class="hours">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM10 17.8722C5.65933 17.8722 2.12762 14.3409 2.12762 10C2.12762 5.65912 5.65933 2.12783 10 2.12783C14.3407 2.12783 17.8724 5.65912 17.8724 10C17.8724 14.3409 14.3407 17.8722 10 17.8722Z" fill="#03314C" fill-opacity="0.5" />
                                                        <path d="M15.2111 9.69123H10.7171V4.28777C10.7171 3.83306 10.3484 3.46439 9.8937 3.46439C9.43898 3.46439 9.07031 3.83306 9.07031 4.28777V10.5146C9.07031 10.9693 9.43898 11.338 9.8937 11.338H15.2111C15.6658 11.338 16.0345 10.9693 16.0345 10.5146C16.0345 10.0599 15.6658 9.69123 15.2111 9.69123Z" fill="#03314C" fill-opacity="0.5" />
                                                    </svg>
                                                    <?php the_sub_field('uur_per_week'); ?>
                                                </span>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="the-link"></a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side" data-scroll>
                    <?php get_template_part('template-parts/widget', 'helparchive'); ?>
                </div>
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