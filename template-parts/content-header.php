<?php if ( is_page() ) {?>

    <div class="archive-header">
        <div class="container">
            <div class="row">
                <div class="offset-md-1 col-md-9">
                    <h1><?php the_title();?></h1>
                    <?php if (get_field('beschrijving_onder_de_titel')){ ?>
                        <p><?php the_field( 'beschrijving_onder_de_titel' ); ?></p>
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

<?php } else { ?>

    
<?php } ?>