<?php
get_header(); ?>
<main id="static">
    <div class="cont-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9 col-11 page-heading">
                    <h1><?php _e('404, Pagina niet gevonden', 'leerbouwen') ?></h1>
                    <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Terug naar homepagina', 'leerbouwen') ?></a>
                    <a class="btn secondair" href="/contact"><?php _e('Neem contact op', 'leerbouwen') ?></a>
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
                <div class="col-md-12">
                    <p><?php _e('<b>Onze excusses de pagina die u probeerde te bereiken bestaat niet of niet meer.</b> <br>U kunt proberen de pagina te vinden door het onderstaande zoekveld.');?></p>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <label>
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Vul uw zoekwoord in...', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                        </label>
                        <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>