<?php if (have_rows('sections_static')) : ?>
    <main id="static">
        <?php while (have_rows('sections_static')) : the_row(); ?>
            <?php if (get_row_layout() == 'afbeelding') : ?>
                <section id="bigimg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-11 offset-md-1">
                                <?php $Upload_een_afbeelding = get_sub_field('Upload een afbeelding'); ?>
                                <?php if ($Upload_een_afbeelding) { ?>
                                    <?php $position = get_sub_field('plaatsen_afbeelding'); ?>
                                    <div class="sngl-bigm<?php if (get_sub_field('afbeelding_gelijk_trekken_met_tekst') == 1) { ?> inside<?php } ?><?php if ($position == 'links') { ?> left<?php } else { ?> right<?php } ?>" style="background-image:url(<?php echo $Upload_een_afbeelding['sizes']['large']; ?>);"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'tekst_volle_breedte') : ?>
                <section id="full" <?php if (get_sub_field('geef_achtergrond_kleur') == 1) { ?>class="colored" <?php } ?>>
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-1 col-md-8">
                                <h2><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('content'); ?>
                                <?php if (have_rows('knoppen')) : ?>
                                    <?php while (have_rows('knoppen')) : the_row(); ?>
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
            <?php elseif (get_row_layout() == 'tekst_half') : ?>
                <section id="full" <?php if (get_sub_field('geef_achtergrond_kleur') == 1) { ?>class="colored" <?php } ?>>
                    <div class="container">
                        <div class="row">
                            <?php if (have_rows('links')) : ?>
                                <?php while (have_rows('links')) : the_row(); ?>
                                    <div class="offset-md-1 col-md-4">
                                        <h2><?php the_sub_field('titel'); ?></h2>
                                        <?php the_sub_field('content'); ?>
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
                            <?php if (have_rows('rechts')) : ?>
                                <?php while (have_rows('rechts')) : the_row(); ?>
                                    <div class="offset-md-1 col-md-4">
                                        <h2><?php the_sub_field('titel'); ?></h2>
                                        <?php the_sub_field('content'); ?>
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
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'grote_cta') : ?>
                <section id="c-cta">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                                <div class="inner" <?php if ($afbeelding) { ?>style="background-image:url(<?php echo $afbeelding['sizes']['ccta']; ?>);" <?php } ?>>
                                    <?php if (have_rows('content')) : ?>
                                        <?php while (have_rows('content')) : the_row(); ?>
                                            <div class="row">
                                                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                                    <span class="subtitle"><?php the_sub_field('kleine_sub_titel'); ?></span>
                                                    <h2><?php the_sub_field('cta_tekst'); ?></h2>
                                                    <?php if (have_rows('knoppen')) : ?>
                                                        <?php while (have_rows('knoppen')) : the_row(); ?>
                                                            <?php $knop = get_sub_field('knop'); ?>
                                                            <?php if ($knop) { ?>
                                                                <a class="btn<?php if (get_sub_field('is_secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                                            <?php } ?>
                                                        <?php endwhile; ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'toon_reviews') : ?>
                <section id="reviews">
                    <div class="container">
                        <div class="row">
                            <?php if (get_sub_field('titel')) { ?>
                                <div class="col-md-12">
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                </div>
                            <?php } ?>
                            <?php $loop = new WP_Query(array(
                                'post_type' => 'reviews',
                                'posts_per_page' => 3,
                                'orderby' => 'rand'
                            )); ?>
                            <?php if ($loop->have_posts()) : ?>
                                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <?php setup_postdata($post); ?>
                                    <div class="review col-md-4">
                                        <div class="inner">
                                            <div class="information">
                                                <?php if (have_rows('review')) : ?>
                                                    <?php while (have_rows('review')) : the_row(); ?>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="rating">
                                                                    <?php $rating = get_sub_field('ster_waardering');
                                                                    for ($i = 0; $i < $rating; $i++) { ?>
                                                                        <span class="star"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <span class="score">
                                                                    <?php the_sub_field('score'); ?> / 10
                                                                </span>
                                                            </div>
                                                            <div class="col-12">
                                                                <span class="name"><?php the_title(); ?></span>
                                                                <span class="function"><?php the_sub_field('functie'); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="the-review">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'toon_diensten') : ?>
                <section id="services">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (get_sub_field('titel')) { ?>
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                <?php } ?>
                                <?php the_sub_field('tekst'); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field('alle_diensten_knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                            <?php $loop = new WP_Query(array(
                                'post_type' => 'diensten',
                                'posts_per_page' => 8,
                                'order' => 'DESC'
                            )); ?>
                            <?php if ($loop->have_posts()) : ?>
                                <div class="col-md-12 services-main">
                                    <?php $i = 0; ?>
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <?php $i++; ?>
                                    <?php endwhile; ?>
                                    <div class="services-items <?php if ($i <= 4) { ?> is_four <?php } ?>">
                                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <?php setup_postdata($post); ?>
                                            <?php if (have_rows('informatie_dienst')) : ?>
                                                <?php while (have_rows('informatie_dienst')) : the_row(); ?>
                                                    <?php $dienst_afbeelding = get_sub_field('dienst_afbeelding'); ?>
                                                    <div class="item" <?php if ($dienst_afbeelding) { ?>style="background-image:url(<?php echo $dienst_afbeelding['sizes']['serviceshome']; ?>);" <?php } ?>>
                                                        <div class="inner">
                                                            <h2><?php the_title(); ?></h2>
                                                            <p class="description"><?php the_sub_field('korte_omschrijving'); ?></p>
                                                        </div>
                                                        <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="next-slide">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery('.services-items').slick({
                                            infinite: true,
                                            slidesToShow: 5,
                                            slidesToScroll: 1,
                                            autoPlay: false,
                                            dots: false,
                                            accessibility: false,
                                            prevArrow: $('.prev-slide'),
                                            nextArrow: $('.next-slide'),
                                            responsive: [{
                                                    breakpoint: 1560,
                                                    settings: {
                                                        slidesToShow: 4,
                                                        slidesToScroll: 1,
                                                    }
                                                },
                                                {
                                                    breakpoint: 991,
                                                    settings: {
                                                        slidesToShow: 3,
                                                        slidesToScroll: 1
                                                    }
                                                },
                                                {
                                                    breakpoint: 768,
                                                    settings: {
                                                        slidesToShow: 2,
                                                        slidesToScroll: 1
                                                    }
                                                }
                                            ]
                                        })
                                    });
                                </script>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'toon_opleidingen') : ?>
                <section id="featured_educations">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('tekst'); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field('alle_opleidingen_knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>

                            <?php
                            ?>
                            <?php
                            $loop = new WP_Query(array(
                                'post_type' => array('opleidingen', 'cursussen'),
                                'posts_per_page' => 2,
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key'   => 'maak_uitgelicht',
                                        'value' => 1
                                    )
                                ),
                            )); ?>
                            <?php if ($loop->have_posts()) : ?>
                                <div class="col-md-6">
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <?php $upload_featured_afbeelding = get_field('upload_featured_afbeelding'); ?>
                                        <div class="featured-item" <?php if ($upload_featured_afbeelding) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['smallfeatured']; ?>);" <?php } ?>>
                                            <div class="inner">
                                                <h3 class="featured-title"><?php the_title(); ?></h3>
                                                <div class="featured-info">
                                                    <?php
                                                    $post_type = get_post_type(get_the_ID());
                                                    $post_type_obj = get_post_type_object($post_type); ?>
                                                    <span class="type"><?php echo $post_type_obj->labels->singular_name; ?></span><?php if (get_field('locatie')) { ?><span class="location"><?php the_field('locatie'); ?></span><?php } ?><?php if (get_field('duur_opleiding')) { ?><span class="duration"><?php the_field('duur_opleiding'); ?></span><?php } ?>
                                                </div>
                                            </div>
                                            <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            <?php
                            ?>
                            <?php
                            $loop = new WP_Query(array(
                                'post_type' => array('opleidingen', 'cursussen'),
                                'posts_per_page' => 2,
                                'offset' => 2,
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key'   => 'maak_uitgelicht',
                                        'value' => 1
                                    )
                                ),
                            )); ?>
                            <?php if ($loop->have_posts()) : ?>
                                <div class="col-md-6">
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <?php $upload_featured_afbeelding = get_field('upload_featured_afbeelding'); ?>
                                        <div class="featured-item-big" <?php if ($upload_featured_afbeelding) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['bigfeatured']; ?>);" <?php } ?>>
                                            <div class="inner">
                                                <h3 class="featured-title"><?php the_title(); ?></h3>
                                                <div class="featured-info">
                                                    <?php
                                                    $post_type = get_post_type(get_the_ID());
                                                    $post_type_obj = get_post_type_object($post_type); ?>
                                                    <span class="type"><?php echo $post_type_obj->labels->singular_name; ?></span><?php if (get_field('locatie')) { ?><span class="location"><?php the_field('locatie'); ?></span><?php } ?><?php if (get_field('duur_opleiding')) { ?><span class="duration"><?php the_field('duur_opleiding'); ?></span><?php } ?>
                                                </div>
                                            </div>
                                            <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'toon_partners') : ?>
                <section id="partners">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="partners">
                                <?php $loop = new WP_Query(array(
                                    'post_type' => 'samenwerkingen',
                                    'posts_per_page' => -1,
                                    'order' => 'DESC'
                                )); ?>
                                <?php if ($loop->have_posts()) : ?>
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <div class="item">
                                            <?php setup_postdata($post); ?>
                                            <?php if (have_rows('informatie_samenwerkingen')) : ?>
                                                <?php while (have_rows('informatie_samenwerkingen')) : the_row(); ?>
                                                    <?php $logo_bedrijf = get_sub_field('logo_bedrijf'); ?>
                                                    <?php if ($logo_bedrijf) { ?>
                                                        <img src="<?php echo $logo_bedrijf['url']; ?>" alt="<?php echo $logo_bedrijf['alt']; ?>" />
                                                    <?php } ?>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    jQuery(document).ready(function() {
                        jQuery('.partners').slick({
                            infinite: true,
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            autoPlay: true,
                            accessibility: false,
                            responsive: [{
                                    breakpoint: 1560,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 1,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 991,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                }
                            ]
                        });
                    });
                </script>
            <?php elseif (get_row_layout() == 'toon_vacatures') : ?>
                <?php $selected_vacatures = get_sub_field('selecteer_vacatures_om_te_tonen'); ?><?php if ($selected_vacatures) : ?><?php $items = 0; ?><?php foreach ($selected_vacatures as $post) :  ?><?php $items++ ?><?php endforeach; ?>
                    <section id="vacancies" class="<?php if ($items > 3) { ?>has_four<?php } ?>">
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row vac-row">
                            <?php $knop = get_sub_field('alle_vacatures_knop'); ?>
                            <?php if ($knop) { ?>
                                <div class="col-md-12 more">
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                </div>
                            <?php } ?>
                            <div class="col-md-4 vacancies-items">
                                <div class="inner">
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                    <p class="info"><?php the_sub_field('tekst'); ?></p>
                                    <?php $knop_onder_tekst = get_sub_field('knop'); ?>
                                    <?php if ($knop_onder_tekst) { ?>
                                        <a class="small-btn" href="<?php echo $knop_onder_tekst['url']; ?>" <?php if ($knop_onder_tekst['target']) { ?>target="<?php echo $knop_onder_tekst['target']; ?>" <?php } ?>><?php echo $knop_onder_tekst['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $selected_vacatures = get_sub_field('selecteer_vacatures_om_te_tonen'); ?>
                            <?php if ($selected_vacatures) : ?>
                                <?php $items = 0; ?>
                                <?php foreach ($selected_vacatures as $post) :  ?>
                                    <?php $items++ ?>
                                <?php endforeach; ?>
                                <div class="col-md-7 offset-md-1 <?php if ($items > 3) { ?>items<?php } ?>">
                                    <?php foreach ($selected_vacatures as $post) :  ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="vacancie-item">
                                            <?php if (have_rows('informatie_vacature')) : ?>
                                                <?php while (have_rows('informatie_vacature')) : the_row(); ?>
                                                    <?php $logo_bedrijf = get_sub_field('logo_bedrijf'); ?>
                                                    <div class="logo-small" style="background-image:url(<?php if ($logo_bedrijf) { ?><?php echo $logo_bedrijf['sizes']['vacaturesmall']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                                    </div>
                                                    <div class="info">
                                                        <span class="company"><?php the_title(); ?></span>
                                                        <span class="function"><?php the_sub_field('functie'); ?></span>
                                                        <a href="<?php the_permalink(); ?>" class="the-link"></a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'roulerende_afbeeldingen') : ?>
                <?php $position = get_sub_field('positie'); ?>
                <section id="imgcarousel">
                    <div class="container">
                        <div class="row">
                            <div class="<?php if ($position == 'links') { ?> col-md-11 <?php } else { ?> offset-md-1 col-md-10<?php } ?>">
                                <div class="the--carousel<?php if ($position == 'links') { ?> left<?php } else { ?> right<?php } ?>">
                                    <div class="carousel-inner">
                                        <?php if (have_rows('selecteer_afbeeldingen')) : ?>
                                            <?php while (have_rows('selecteer_afbeeldingen')) : the_row(); ?>
                                                <?php $upload_afbeelding = get_sub_field('upload_afbeelding'); ?>
                                                <?php if ($upload_afbeelding) { ?>
                                                    <div class="carousel--img" style="background-image:url(<?php echo $upload_afbeelding['sizes']['large']; ?>);">
                                                    </div>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="next-slide-img next-slide">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="the-dots">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function() {
                            jQuery('.carousel-inner').slick({
                                infinite: true,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoPlay: false,
                                dots: true,
                                fade: true,
                                autoplay: true,
                                autoplaySpeed: 2000,
                                accessibility: false,
                                appendDots: $('.dots'),
                                prevArrow: $('.prev-slide'),
                                nextArrow: $('.next-slide-img next-slide'),
                            })
                        });
                    </script>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>
<?php endif; ?>