<?php
get_header(); ?>
<main id="static">
    <div class="cont-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php _e('Zoekresultaten', 'leerbouwen') ?></h1>
                    <p><?php _e('Je zocht naar:','leerbouwen');?> <b><?php the_search_query(); ?></b></p>
                    <?php global $wp_query; $total_results = $wp_query->found_posts; ?>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <label>
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Verder zoeken...', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                        </label>
                        <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
                    </form>
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
                <div class="col-md-10 offset-md-1 search-results">
                    <h2><?php echo $total_results;?> <?php _e('resultaten gevonden','leerbouwen');?></h2>
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="<?php the_id(); ?>-bericht" data-scroll>
                                <a href="<?php the_permalink(); ?>">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                                <p><?php echo excerpt(30); ?></p>
                            </article>
                        <?php endwhile; ?>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>