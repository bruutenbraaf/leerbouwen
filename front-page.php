<?php
get_header(); ?>

<?php $afbeelding_geen_logo = get_field( 'afbeelding_geen_logo', 'option' ); ?>

<main>
    <div class="hp-header">
        <?php if ( have_rows( 'header' ) ) : ?>
            <?php while ( have_rows( 'header' ) ) : the_row(); ?>
                <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 hp-header-co">
                            <?php if ( $afbeelding ) { ?>
                            <div class="header-image" style="background-image:url(<?php echo $afbeelding['sizes']['home']; ?>);" ></div>
                            <?php } ?>
                            <div class="inner">
                                <h1><?php the_sub_field( 'titel' ); ?></h1>
                                <p><?php the_sub_field( 'subtitel' ); ?></p>
                                <?php $knop = get_sub_field( 'knop' ); ?>
                                <?php if ( $knop ) { ?>
                                    <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>  
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php if ( have_rows( 'counters' ) ) : ?>
        <section id="counter">
            <div class="container count">
                <div class="row">
                    <?php while ( have_rows( 'counters' ) ) : the_row(); ?>
                        <?php if ( have_rows( 'eerste_counter' ) ) : ?>
                            <?php while ( have_rows( 'eerste_counter' ) ) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field( 'getal' ); ?></span>
                                    <span class="countitem"><?php the_sub_field( 'beschrijving' ); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'Tweede_counter' ) ) : ?>
                            <?php while ( have_rows( 'Tweede_counter' ) ) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field( 'getal' ); ?></span>
                                    <span class="countitem"><?php the_sub_field( 'beschrijving' ); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'derde_counter' ) ) : ?>
                            <?php while ( have_rows( 'derde_counter' ) ) : the_row(); ?>
                                <div class="col-md-4 counters">
                                    <span class="countnumber"><?php the_sub_field( 'getal' ); ?></span>
                                    <span class="countitem"><?php the_sub_field( 'beschrijving' ); ?></span>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( have_rows( 'indeling' ) ): ?>
        <?php while ( have_rows( 'indeling' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'populaire_opleidingen' ) : ?>	
                <section id="featured_educations">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title"><?php the_sub_field( 'titel' ); ?></h2>
                                <?php the_sub_field( 'tekstueel' ); ?>
                            </div>
                            <div class="col-md-6 more">
                            <?php $knop = get_sub_field( 'knop' ); ?>
                                <?php if ( $knop ) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>

                            <?php // Twee featured items links?>
                            <?php 
                            $loop = new WP_Query( array(
                                'post_type' => array('opleidingen', 'cursussen'),
                                'posts_per_page' => 2,
                                'meta_query' => array(
                                'relation' => 'AND',
                                    array(
                                        'key'   => 'maak_uitgelicht',
                                        'value' => 1
                                    )
                                ),
                            ) ); ?>
                            <?php if ( $loop->have_posts() ) : ?>
                                <div class="col-md-6">
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php $upload_featured_afbeelding = get_field( 'upload_featured_afbeelding' ); ?>
                                        <div class="featured-item" <?php if ( $upload_featured_afbeelding ) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['smallfeatured']; ?>);"<?php } ?>>
                                            <div class="inner">
                                                <h3 class="featured-title"><?php the_title();?></h3>
                                                <div class="featured-info">
                                                    <?php 
                                                    $post_type = get_post_type( get_the_ID() );
                                                    $post_type_obj = get_post_type_object( $post_type ); ?>
                                                    <span class="type"><?php echo $post_type_obj->labels->singular_name; ?></span><?php if (get_field('locatie')){?><span class="location"><?php the_field( 'locatie' ); ?></span><?php } ?><?php if (get_field('duur_opleiding')){?><span class="duration"><?php the_field( 'duur_opleiding' ); ?></span><?php } ?> 
                                                </div>
                                            </div>
                                            <a class="the-link" href="<?php the_permalink();?>"></a>
                                        </div>
                                    <?php endwhile; ?>    
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            <?php // grote afbeelding ?>
                            <?php 
                            $loop = new WP_Query( array(
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
                            ) ); ?>
                            <?php if ( $loop->have_posts() ) : ?>
                                <div class="col-md-6">
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php $upload_featured_afbeelding = get_field( 'upload_featured_afbeelding' ); ?>
                                        <div class="featured-item-big" <?php if ( $upload_featured_afbeelding ) { ?>style="background-image:url(<?php echo $upload_featured_afbeelding['sizes']['bigfeatured']; ?>);"<?php } ?>>
                                            <div class="inner">
                                                <h3 class="featured-title"><?php the_title();?></h3>
                                                <div class="featured-info">
                                                <?php 
                                                    $post_type = get_post_type( get_the_ID() );
                                                    $post_type_obj = get_post_type_object( $post_type ); ?>
                                                    <span class="type"><?php echo $post_type_obj->labels->singular_name; ?></span><?php if (get_field('locatie')){?><span class="location"><?php the_field( 'locatie' ); ?></span><?php } ?><?php if (get_field('duur_opleiding')){?><span class="duration"><?php the_field( 'duur_opleiding' ); ?></span><?php } ?>
                                                </div>
                                            </div>
                                            <a class="the-link" href="<?php the_permalink();?>"></a>
                                        </div>
                                    <?php endwhile; ?>    
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>

            <?php elseif ( get_row_layout() == 'diensten' ) : ?>
                <section id="services">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="section-title"><?php the_sub_field( 'titel' ); ?></h2>
                                <?php the_sub_field( 'tekstueel' ); ?>
                            </div>
                            <div class="col-md-6 more">
                                <?php $knop = get_sub_field( 'knop' ); ?>
                                <?php if ( $knop ) { ?>
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            </div>
                        
                            <?php $selecteer_diensten_om_te_tonen = get_sub_field( 'selecteer_diensten_om_te_tonen' ); ?>
                            <?php if ( $selecteer_diensten_om_te_tonen ): ?>
                            <div class="col-md-12 services-main">
                                    <?php $i = 0;?>
                                    <?php foreach ( $selecteer_diensten_om_te_tonen as $post ):  ?>
                                        <?php $i++;?>
                                    <?php endforeach; ?>
                                    <div class="services-items <?php if ( $i <= 4 ) { ?> is_four <?php } ?>">
                                        <?php foreach ( $selecteer_diensten_om_te_tonen as $post ):  ?>
                                            <?php setup_postdata ( $post ); ?>
                                            <?php if ( have_rows( 'informatie_dienst' ) ) : ?>
                                                <?php while ( have_rows( 'informatie_dienst' ) ) : the_row(); ?>
                                                    <?php $dienst_afbeelding = get_sub_field( 'dienst_afbeelding' ); ?>
                                                    <div class="item"  <?php if ( $dienst_afbeelding ) { ?>style="background-image:url(<?php echo $dienst_afbeelding['sizes']['serviceshome']; ?>);"<?php } ?>>
                                                        <div class="inner">
                                                            <h2><?php the_title(); ?></h2>
                                                            <p class="description"><?php the_sub_field( 'korte_omschrijving' ); ?></p>
                                                        </div>
                                                        <a class="the-link" href="<?php the_permalink();?>"></a>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="next-slide">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white"/>
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
                                                responsive: [
                                                    {
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
            <?php elseif ( get_row_layout() == 'grote_cta' ) : ?>
                <section id="b-cta">
                    <div class="container">
                        <div class="col-md-12 cta">
                            <div class="row">
                                <div class="col-md-5 offset-md-1 title">
                                    <?php the_sub_field( 'linker_tekst' ); ?>
                                </div>
                                <div class="col-md-4 offset-md-1">
                                    <?php the_sub_field( 'rechter_tekst' ); ?>
                                    <?php $knop = get_sub_field( 'knop' ); ?>
                                    <?php if ( $knop ) { ?>
                                        <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> 
            <?php elseif ( get_row_layout() == 'cta_title' ) : ?>
                <section id="c-cta">                  
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                                <div class="inner" <?php if ( $afbeelding ) { ?>style="background-image:url(<?php echo $afbeelding['sizes']['ccta']; ?>);"<?php } ?>>
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                            <span class="subtitle"><?php the_sub_field( 'subtitel' ); ?></span>
                                            <h2><?php the_sub_field( 'grote_titel' ); ?></h2>
                                            <?php $knop = get_sub_field( 'knop' ); ?>
                                            <?php if ( $knop ) { ?>
                                                <a class="btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'reviews' ) : ?>
                <section id="reviews">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="section-title"><?php the_sub_field( 'titel' ); ?></h2>
                            </div>
                            <?php $selected_reviews = get_sub_field( 'selected_reviews' ); ?>
                            <?php if ( $selected_reviews ): ?>
                            <div class="col-md-12">
                                <div class="review-items">
                                    <?php foreach ( $selected_reviews as $post ):  ?>
                                        <?php setup_postdata ( $post ); ?>
                                        <div class="review">
                                            <div class="inner">
                                                <div class="information">
                                                    <?php if ( have_rows( 'review' ) ) : ?>
                                                        <?php while ( have_rows( 'review' ) ) : the_row(); ?>
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
                                                                        <?php the_sub_field( 'score' ); ?> / 10
                                                                    </span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <span class="name"><?php the_title(); ?></span>
                                                                    <span class="function"><?php the_sub_field( 'functie' ); ?></span>
                                                                </div>
                                                            </div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="the-review">
                                                    <?php the_content();?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                                <div class="more-reviews"><?php _e('Volgende','leerbouwen');?></div>
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
                                            prevArrow: $('.prev-slide'),
                                            nextArrow: $('.more-reviews'),
                                            responsive: [
                                                {
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
                                                    slidesToShow: 1,
                                                    slidesToScroll: 1
                                                }
                                                },
                                                {
                                                breakpoint: 480,
                                                settings: {
                                                    slidesToShow: 1,
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
            <?php elseif ( get_row_layout() == 'samenwerking' ) : ?>
            <section id="partners">
                <div class="container">
                    <div class="col-md-12">
                        <div class="partners">
                            <?php $selecteted_partners = get_sub_field( 'selecteted_partners' ); ?>
                            <?php if ( $selecteted_partners ): ?>
                                <?php foreach ( $selecteted_partners as $post ):  ?>
                                    <div class="item">
                                        <?php setup_postdata ( $post ); ?>
                                        <?php if ( have_rows( 'informatie_samenwerkingen' ) ) : ?>
                                            <?php while ( have_rows( 'informatie_samenwerkingen' ) ) : the_row(); ?>
                                                <?php $logo_bedrijf = get_sub_field( 'logo_bedrijf' ); ?>
                                                <?php if ( $logo_bedrijf ) { ?>
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
                        responsive: [
                            {
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
            <?php elseif ( get_row_layout() == 'nieuws_berichten' ) : ?>
                <section id="news"> 
                    <div class="container">
                        <div class="row">
                            <?php $knop = get_sub_field( 'knop' ); ?>
                            <?php if ( $knop ) { ?>
                                <div class="col-md-12 more">
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                </div>
                            <?php } ?>
                            <div class="col-md-3 news-items">
                                <div class="inner">
                                    <h2 class="section-title"><?php the_sub_field( 'titel' ); ?></h2>
                                    <p class="info"><?php the_sub_field( 'text_info' ); ?></p>
                                    <?php if ( get_sub_field( 'toon_aanmelden_nieuwsbrief_knop' ) == 1 ) { ?>
                                        <div class="small-btn"> <?php the_sub_field( 'btn_txt_news' ); ?> </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="news">
                                    <?php $loop = new WP_Query( array(
                                        'post_type' => 'nieuws',
                                        'posts_per_page' => 8,
                                        'order'=> 'DESC'
                                    ) ); ?>
                                    <?php if ( $loop->have_posts() ) : ?>
                                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                            <div class="news-item">
                                                <div class="inner">
                                                    <?php if ( have_rows( 'informatie_nieuws' ) ) : ?>
                                                        <?php while ( have_rows( 'informatie_nieuws' ) ) : the_row(); ?>
                                                            <?php $afbeelding = get_sub_field( 'afbeelding' ); ?>
                                                            <div class="news-img" style="background-image:url(<?php if ( $afbeelding ) { ?><?php echo $afbeelding['sizes']['medium']; ?>); <?php } else {  ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?>); background-size: 50%; background-color: #EEEEEE;<?php } ?>"></div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                    <div class="information">
                                                        <span class="date"><?php the_time( 'd-m-Y' );?></span>
                                                        <span class="title"><?php the_title(); ?></span>
                                                    </div>
                                                    <a class="the-link" href="<?php the_permalink();?>"></a>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>    
                                    <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="more-news">
                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 8.06307V4.94019C0 4.50754 0.334338 4.15947 0.749916 4.15947H6.99922V0.782856C6.99922 0.0867145 7.80538 -0.261356 8.28033 0.229847L13.7797 5.94862C14.0734 6.2544 14.0734 6.74885 13.7797 7.05464L8.28033 12.7702C7.8085 13.2614 6.99922 12.9133 6.99922 12.2171V8.84379H0.749916C0.334338 8.84379 0 8.49571 0 8.06307Z" fill="white"/>
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
                            prevArrow: $('.prev-slide'),
                            nextArrow: $('.more-news'),
                            responsive: [
                                {
                                breakpoint: 1560,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1,
                                    prevArrow: $('.prev-slide'),
                                    nextArrow: $('.more-news'),
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
            <?php elseif ( get_row_layout() == 'vacatures' ) : ?>
                <?php $selected_vacatures = get_sub_field( 'selected_vacatures' ); ?><?php if ( $selected_vacatures ): ?><?php $items = 0;?><?php foreach ( $selected_vacatures as $post ):  ?><?php $items++ ?><?php endforeach; ?>
                <section id="vacancies" class="<?php if ( $items > 3 ) { ?>has_four<?php } ?>">
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                    <div class="container">
                        <div class="row vac-row">
                            <?php $knop = get_sub_field( 'knop' ); ?>
                            <?php if ( $knop ) { ?>
                                <div class="col-md-12 more">
                                    <a class="small-btn" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                </div>
                            <?php } ?>
                            <div class="col-md-4 vacancies-items">
                                <div class="inner">
                                    <h2 class="section-title"><?php the_sub_field( 'titel' ); ?></h2>
                                    <p class="info"><?php the_sub_field( 'text_info' ); ?></p>
                                    <?php $knop_onder_tekst = get_sub_field( 'knop_onder_tekst' ); ?>
                                    <?php if ( $knop_onder_tekst ) { ?>
                                        <a class="small-btn" href="<?php echo $knop_onder_tekst['url']; ?>" target="<?php echo $knop_onder_tekst['target']; ?>"><?php echo $knop_onder_tekst['title']; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php $selected_vacatures = get_sub_field( 'selected_vacatures' ); ?>
                            <?php if ( $selected_vacatures ): ?>
                                <?php $items = 0;?>
                                <?php foreach ( $selected_vacatures as $post ):  ?>
                                    <?php $items++ ?>
                                <?php endforeach; ?>
                                <div class="col-md-7 offset-md-1 <?php if ( $items > 3 ) { ?>items<?php } ?>">
                                    <?php foreach ( $selected_vacatures as $post ):  ?>
                                        <?php setup_postdata ( $post ); ?>
                                        <div class="vacancie-item">
                                            <?php if ( have_rows( 'informatie_vacature' ) ) : ?>
                                                <?php while ( have_rows( 'informatie_vacature' ) ) : the_row(); ?>
                                                    <?php $logo_bedrijf = get_sub_field( 'logo_bedrijf' ); ?>    
                                                    <div class="logo-small" style="background-image:url(<?php if ( $logo_bedrijf ) { ?><?php echo $logo_bedrijf['sizes']['vacaturesmall']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                                                    </div>   
                                                    <div class="info">
                                                        <span class="company"><?php the_title(); ?></span>
                                                        <span class="function"><?php the_sub_field( 'functie' ); ?></span>
                                                        <a href="<?php the_permalink();?>" class="the-link"></a>
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