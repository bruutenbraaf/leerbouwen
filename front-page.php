<?php
get_header(); ?>

<?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>

<main>
    <div class="hp-header">
        <?php if (have_rows('header')) : ?>
            <?php while (have_rows('header')) : the_row(); ?>
                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 hp-header-co">
                            <?php if ($afbeelding) { ?>
                                <div class="header-image" style="background-image:url(<?php echo $afbeelding['sizes']['home']; ?>);"></div>
                            <?php } ?>
                            <div class="inner">
                                <h1><?php the_sub_field('titel'); ?></h1>
                                <p><?php the_sub_field('subtitel'); ?></p>
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php if (have_rows('counters')) : ?>
        <section id="counter">
            <div class="container count">
                <div class="row">
                    <?php while (have_rows('counters')) : the_row(); ?>
                        <?php if (have_rows('eerste_counter')) : ?>
                            <?php while (have_rows('eerste_counter')) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                                    <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if (have_rows('Tweede_counter')) : ?>
                            <?php while (have_rows('Tweede_counter')) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                                    <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if (have_rows('derde_counter')) : ?>
                            <?php while (have_rows('derde_counter')) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field('getal'); ?></span>
                                    <span class="countitem"><?php the_sub_field('beschrijving'); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (have_rows('indeling')) : ?>
        <?php while (have_rows('indeling')) : the_row(); ?>
            <?php if (get_row_layout() == 'populaire_opleidingen') : ?>
                <section id="featured_educations"  >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('tekstueel'); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field('knop'); ?>
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
                                        <div class="featured-item" data-scroll <?php if ($upload_featured_afbeelding) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['smallfeatured']; ?>);" <?php } ?>>
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
                                        <div class="featured-item-big"  data-scroll <?php if ($upload_featured_afbeelding) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['bigfeatured']; ?>);" <?php } ?>>
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

            <?php elseif (get_row_layout() == 'diensten') : ?>
                <section id="services" data-scroll>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                <?php the_sub_field('tekstueel'); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field('knop'); ?>
                                <?php if ($knop) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>

                            <?php $selecteer_diensten_om_te_tonen = get_sub_field('selecteer_diensten_om_te_tonen'); ?>
                            <?php if ($selecteer_diensten_om_te_tonen) : ?>
                                <div class="col-md-12 services-main">
                                    <?php $i = 0; ?>
                                    <?php foreach ($selecteer_diensten_om_te_tonen as $post) :  ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <div class="services-items <?php if ($i <= 4) { ?> is_four <?php } ?>" data-scroll >
                                        <?php foreach ($selecteer_diensten_om_te_tonen as $post) :  ?>
                                            <?php setup_postdata($post); ?>
                                            <?php if (have_rows('informatie_dienst')) : ?>
                                                <?php while (have_rows('informatie_dienst')) : the_row(); ?>
                                                    <?php $dienst_afbeelding = get_sub_field('dienst_afbeelding'); ?>
                                                    <div class="item"<?php if ($dienst_afbeelding) { ?>style="background-image:url(<?php echo $dienst_afbeelding['sizes']['serviceshome']; ?>);" <?php } ?>>
                                                        <div class="inner">
                                                            <h2><?php the_title(); ?></h2>
                                                            <p class="description"><?php the_sub_field('korte_omschrijving'); ?></p>
                                                        </div>
                                                        <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
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
                                            prevArrow: jQuery('.prev-slide'),
                                            nextArrow: jQuery('.next-slide'),
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
            <?php elseif (get_row_layout() == 'grote_cta') : ?>
                <section id="b-cta" data-scroll>
                    <div class="container">
                        <div class="col-md-12 cta">
                            <div class="row">
                                <div class="col-md-5 offset-md-1 title">
                                    <?php the_sub_field('linker_tekst'); ?>
                                </div>
                                <div class="col-md-4 offset-md-1">
                                    <?php the_sub_field('rechter_tekst'); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'cta_title') : ?>
                <section id="c-cta" data-scroll>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $afbeelding = get_sub_field('afbeelding'); ?>
                                <div class="inner" <?php if ($afbeelding) { ?>style="background-image:url(<?php echo $afbeelding['sizes']['ccta']; ?>);" <?php } ?>>
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                            <span class="subtitle"><?php the_sub_field('subtitel'); ?></span>
                                            <h2><?php the_sub_field('grote_titel'); ?></h2>
                                            <?php $knop = get_sub_field('knop'); ?>
                                            <?php if ($knop) { ?>
                                                <a class="btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'reviews') : ?>
                <section id="reviews" data-scroll>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                            </div>
                            <?php $selected_reviews = get_sub_field('selected_reviews'); ?>
                            <?php if ($selected_reviews) : ?>
                                <div class="col-md-12">
                                    <div class="review-items">
                                        <?php foreach ($selected_reviews as $post) :  ?>
                                            <?php setup_postdata($post); ?>
                                            <div class="review"  data-scroll>
                                                <div class="inner">
                                                    <div class="information">
                                                        <?php if (have_rows('review')) : ?>
                                                            <?php while (have_rows('review')) : the_row(); ?>
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <div class="rating">
                                                                            <?php $rating = get_sub_field('ster_waardering');
                                                                            for ($i = 0; $i < $rating; $i++) { ?>
                                                                                <span class="star"></span>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
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
                                        <?php endforeach; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                    <div class="more-reviews"><?php _e('Volgende', 'leerbouwen'); ?></div>
                                </div>
                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery('.review-items').slick({
                                            infinite: true,
                                            slidesToShow: 4,
                                            slidesToScroll: 1,
                                            autoPlay: false,
                                            dots: false,
                                            accessibility: false,
                                            prevArrow: jQuery('.prev-slide'),
                                            nextArrow: jQuery('.more-reviews'),
                                            responsive: [{
                                                    breakpoint: 1560,
                                                    settings: {
                                                        slidesToShow: 3,
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
                                                },
                                                {
                                                    breakpoint: 480,
                                                    settings: {
                                                        slidesToShow: 2,
                                                        slidesToScroll: 1
                                                    }
                                                }
                                            ]
                                        });
                                    });
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'samenwerking') : ?>
                <section id="partners" data-scroll>
                    <div class="container">
                        <div class="col-md-12">
                            <div class="partners">
                                <?php $selecteted_partners = get_sub_field('selecteted_partners'); ?>
                                <?php if ($selecteted_partners) : ?>
                                    <?php foreach ($selecteted_partners as $post) :  ?>
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
                                    <?php endforeach; ?>
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
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                        autoPlay: true,
                                        arrows: false,
                                    }
                                }
                            ]
                        });
                    });
                </script>
            <?php elseif (get_row_layout() == 'nieuws_berichten') : ?>
                <section id="news">
                    <div class="container">
                        <div class="row">
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <div class="col-md-12 more">
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                </div>
                            <?php } ?>
                            <div class="col-md-3 news-items">
                                <div class="inner">
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                    <p class="info"><?php the_sub_field('text_info'); ?></p>
                                    <?php if (get_sub_field('toon_aanmelden_nieuwsbrief_knop') == 1) { ?>
                                        <div class="small-btn"> <?php the_sub_field('btn_txt_news'); ?> </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="news">
                                    <?php $loop = new WP_Query(array(
                                        'post_type' => 'nieuws',
                                        'posts_per_page' => 8,
                                        'order' => 'DESC'
                                    )); ?>
                                    <?php if ($loop->have_posts()) : ?>
                                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <div class="news-item" data-scroll>
                                                <div class="inner">
                                                    <?php if (have_rows('informatie_nieuws')) : ?>
                                                        <?php while (have_rows('informatie_nieuws')) : the_row(); ?>
                                                            <?php $afbeelding = get_sub_field('afbeelding'); ?>
                                                            <div class="news-img" style="background-image:url(<?php if ($afbeelding) { ?><?php echo $afbeelding['sizes']['medium']; ?>); <?php } else {  ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?>); background-size: 50%; background-color: #EEEEEE;<?php } ?>"></div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                    <div class="information">
                                                        <span class="date"><?php the_time('d-m-Y'); ?></span>
                                                        <span class="title"><?php the_title(); ?></span>
                                                    </div>
                                                    <a class="the-link" href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="more-news">
                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    jQuery(document).ready(function() {
                        jQuery('.news').slick({
                            infinite: true,
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            autoPlay: false,
                            dots: false,
                            accessibility: false,
                            prevArrow: jQuery('.prev-slide'),
                            nextArrow: jQuery('.more-news'),
                            responsive: [{
                                    breakpoint: 1560,
                                    settings: {
                                        slidesToShow: 4,
                                        slidesToScroll: 1,
                                        prevArrow: jQuery('.prev-slide'),
                                        nextArrow: jQuery('.more-news'),
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
                        });
                    });
                </script>
            <?php elseif (get_row_layout() == 'vacatures') : ?>
                <?php $selected_vacatures = get_sub_field('selected_vacatures'); ?><?php if ($selected_vacatures) : ?><?php $items = 0; ?><?php foreach ($selected_vacatures as $post) :  ?><?php $items++ ?><?php endforeach; ?>
                    <section id="vacancies" data-scroll class="<?php if ($items > 3) { ?>has_four<?php } ?>"  >
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row vac-row">
                            <?php $knop = get_sub_field('knop'); ?>
                            <?php if ($knop) { ?>
                                <div class="col-md-12 more">
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                </div>
                            <?php } ?>
                            <div class="col-md-4 vacancies-items">
                                <div class="inner">
                                    <h2 class="section-title"><?php the_sub_field('titel'); ?></h2>
                                    <p class="info"><?php the_sub_field('text_info'); ?></p>
                                    <?php $knop_onder_tekst = get_sub_field('knop_onder_tekst'); ?>
                                    <?php if ($knop_onder_tekst) { ?>
                                        <a class="small-btn" href="<?php echo $knop_onder_tekst['url']; ?>" <?php if ($knop_onder_tekst['target']) { ?>target="<?php echo $knop_onder_tekst['target']; ?>" <?php } ?>><?php echo $knop_onder_tekst['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $selected_vacatures = get_sub_field('selected_vacatures'); ?>
                            <?php if ($selected_vacatures) : ?>
                                <?php $items = 0; ?>
                                <?php foreach ($selected_vacatures as $post) :  ?>
                                    <?php $items++ ?>
                                <?php endforeach; ?>
                                <div class="col-md-7 offset-md-1 <?php if ($items > 3) { ?>items<?php } ?>">
                                    <?php foreach ($selected_vacatures as $post) :  ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="vacancie-item" data-scroll>
                                            <?php if (have_rows('informatie_vacature')) : ?>
                                                <?php while (have_rows('informatie_vacature')) : the_row(); ?>
                                                    <?php $logo_bedrijf = get_sub_field('logo_bedrijf'); ?>
                                                    <div class="logo-small" style="background-image:url(<?php if ($logo_bedrijf) { ?><?php echo $logo_bedrijf['sizes']['vacaturesmall']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                                    </div>
                                                    <div class="info">
                                                        <h4><?php the_title(); ?></h4>
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
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>


<?php get_footer(); ?>