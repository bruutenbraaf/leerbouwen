<?php
get_header(); ?>
<main>
    <?php get_template_part('template-parts/single', 'header'); ?>
    <?php get_template_part('template-parts/single', 'course'); ?>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="section-title"><?php _e('Ook interessante diensten','leerbouwen');?></h2>
                </div>

                <?php $loop = new WP_Query(array(
                    'post_type' => 'diensten',
                    'posts_per_page' => 8,
                    'order' => 'RAND'
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
                                                <h2 class="title-intress"><?php the_title(); ?></h2>
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
</main>
<?php get_footer(); ?>