<?php
get_header(); ?>

<?php $afbeelding_geen_logo = get_field( 'afbeelding_geen_logo', 'option' ); ?>
<?php $featured = get_field( 'upload_featured_afbeelding' ); ?>
<?php $logo = get_field( 'logo' ); ?>


<div class="archive-header">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-9">
                <h1><?php the_field("cursussen_archive_title", "option");?></h1>
                <?php if (get_field("cursussen_archive_intro", "option")){ ?>
                    <p><?php the_field("cursussen_archive_intro", "option"); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('');
                }?>
            </div>
        </div>
    </div>
</div>


<section id="educations">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php 
                $loop = new WP_Query( array(
                    'post_type' => array('cursussen'),
                    'posts_per_page' => -1,
                    'meta_query' => array(
                    'relation' => 'AND',
                        array(
                            'key'   => 'maak_meest_gekozen',
                            'value' => 1
                        )
                    ),
                ) ); ?>
                <?php if ( $loop->have_posts() ) : ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="education featured">
                            <div class="image" style="background-image:url(<?php if ( $featured ) { ?><?php echo $featured['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                               <div class="featured"><?php _e('Meest gekozen','leerbouwen');?></div>
                            </div>
                            <div class="logo" style="background-image:url(<?php if ( $logo ) { ?><?php echo $logo['sizes']['vacaturesmall']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                            </div>
                            <div class="information">
                                <h4><?php the_title();?></h4>
                                <?php if (get_field( 'locatie' )){ ?> <span class="location"><?php the_field( 'locatie' ); ?></span> <?php } ?>
                                <?php if (get_field( 'duur_opleiding' )){ ?> <span class="duration"><?php the_field( 'duur_opleiding' ); ?></span> <?php } ?>
                                <?php if (get_field( 'kosten_opleiding_vanaf_prijs' )){ ?> <span class="cost"><?php _e('vanaf € ', 'leerbouwen');?><?php the_field( 'kosten_opleiding_vanaf_prijs' ); ?></span> <?php } ?>
                            </div>
                            <a href="<?php the_permalink();?>" class="the-link"></a>
                        </div>
                    <?php endwhile; ?>    
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <?php 
                $loop = new WP_Query( array(
                    'post_type' => array('cursussen'),
                    'posts_per_page' => -1,
                    'meta_query' => array(
                    'relation' => 'AND',
                        array(
                            'key'   => 'maak_meest_gekozen',
                            'value' => 0
                        )
                    ),
                ) ); ?>
                <?php if ( $loop->have_posts() ) : ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="education">
                            <div class="logo" style="background-image:url(<?php if ( $logo ) { ?><?php echo $logo['url']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
                            </div>
                            <div class="information">
                                <h4><?php the_title();?></h4>
                                <?php if (get_field( 'locatie' )){ ?> <span class="location"><?php the_field( 'locatie' ); ?></span> <?php } ?>
                                <?php if (get_field( 'duur_opleiding' )){ ?> <span class="duration"><?php the_field( 'duur_opleiding' ); ?></span> <?php } ?>
                                <?php if (get_field( 'kosten_opleiding_vanaf_prijs' )){ ?> <span class="cost"><?php _e('vanaf € ', 'leerbouwen');?><?php the_field( 'kosten_opleiding_vanaf_prijs' ); ?></span> <?php } ?>
                            </div>
                            <a href="<?php the_permalink();?>" class="the-link"></a>
                        </div>
                    <?php endwhile; ?>    
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        <div class="col-md-5 side">          
            <?php if ( have_rows( 'cursus_hulp_nodig_widget', 'option' ) ) : ?>
	            <?php while ( have_rows( 'cursus_hulp_nodig_widget', 'option' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'toon_de_widget' ) == 1 ) { ?>
                        <div class="help-needed">
                            <div class="heading">
                                <?php $werknemerwidget = get_sub_field( 'afbeelding_werknemer' ); ?>
                                <div class="image" style="background-image:url(<?php if ( $werknemerwidget ) { ?><?php echo $werknemerwidget['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                                </div>
                                <h3><?php the_sub_field( 'titel' ); ?></h3>
                            </div>
                            <?php the_sub_field( 'tekst' ); ?>
                            <?php if ( have_rows( 'knoppen' ) ) : ?>
                                <?php while ( have_rows( 'knoppen' ) ) : the_row(); ?>
                                    <?php $knop = get_sub_field( 'knop' ); ?>
                                    <?php if ( $knop ) { ?>
                                        <a class="btn<?php if ( get_sub_field( 'secondair' ) == 1 ) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>         
        </div>
    </div>
</section>

<?php if ( get_field( 'toon_cta_blok_cursus', 'option' ) == 1 ) { ?>
    <?php if ( have_rows( 'cta_blok_cursus', 'option' ) ) : ?>
	    <?php while ( have_rows( 'cta_blok_cursus', 'option' ) ) : the_row(); ?>
            <section id="c-cta" class="overviewcta">                  
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php $afbeelding = get_sub_field( 'achtergrond_afbeelding' ); ?>
                            <div class="inner" <?php if ( $afbeelding ) { ?>style="background-image:url(<?php echo $afbeelding['sizes']['ccta']; ?>);"<?php } ?>>
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                                        <span class="subtitle"><?php the_sub_field( 'subtitel' ); ?></span>
                                        <h2><?php the_sub_field( 'tekst' ); ?></h2>
                                        <?php if ( have_rows( 'knoppen' ) ) : ?>
                                            <?php while ( have_rows( 'knoppen' ) ) : the_row(); ?>
                                                <?php $knop = get_sub_field( 'knop' ); ?>
                                                <?php if ( $knop ) { ?>
                                                <a class="btn<?php if ( get_sub_field( 'is_secondair' ) == 1 ) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']){ ?>target="<?php echo $knop['target']; ?>"<?php } ?>><?php echo $knop['title']; ?></a>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
<?php } ?>
<?php get_footer(); ?>