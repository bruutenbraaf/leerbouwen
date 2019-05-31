<div class="single-header">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-9 col-11 page-heading">
                <h1><?php the_title(); ?></h1>
                <div class="information">
                    <?php if (get_field('locatie')) { ?>
                        <span class="location">
                            <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3609 4.97781C13.2902 4.71099 13.1466 4.4267 13.0404 4.17779C11.7694 1.10222 8.99214 0 6.74967 0C3.74772 0 0.441419 2.02672 0 6.20428V7.05777C0 7.09339 0.0121924 7.41335 0.029511 7.57341C0.27696 9.56432 1.83726 11.6802 3.00255 13.6712C4.25624 15.8042 5.55713 17.9026 6.84596 20C7.64068 18.6312 8.43254 17.2445 9.20915 15.9112C9.42081 15.5199 9.66651 15.1288 9.87839 14.7553C10.0196 14.5067 10.2894 14.258 10.4127 14.0266C11.6663 11.7156 13.6842 9.38679 13.6842 7.09335V6.15117C13.6843 5.90254 13.3782 5.03142 13.3609 4.97781ZM6.80463 9.26236C5.92221 9.26236 4.95633 8.8181 4.47958 7.59121C4.40855 7.39592 4.41428 7.00453 4.41428 6.96868V6.41757C4.41428 4.85352 5.73327 4.14226 6.88074 4.14226C8.29339 4.14226 9.38594 5.28019 9.38594 6.70252C9.38594 8.12479 8.21728 9.26236 6.80463 9.26236Z" fill="white" />
                            </svg>
                            <?php the_field('locatie'); ?>
                        </span>
                    <?php } ?>
                    <?php if (get_field('duur_opleiding')) { ?>
                        <span class="duration">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM10 17.8722C5.65933 17.8722 2.12762 14.3409 2.12762 10C2.12762 5.65912 5.65933 2.12783 10 2.12783C14.3407 2.12783 17.8724 5.65912 17.8724 10C17.8724 14.3409 14.3407 17.8722 10 17.8722Z" fill="white" />
                                <path d="M15.2116 9.69123H10.7176V4.28777C10.7176 3.83306 10.3489 3.46439 9.89419 3.46439C9.43947 3.46439 9.0708 3.83306 9.0708 4.28777V10.5146C9.0708 10.9693 9.43947 11.338 9.89419 11.338H15.2116C15.6663 11.338 16.035 10.9693 16.035 10.5146C16.035 10.0599 15.6663 9.69123 15.2116 9.69123Z" fill="white" />
                            </svg>
                            <?php the_field('duur_opleiding'); ?>
                        </span>
                    <?php } ?>
                    <?php if (get_field('kosten_opleiding_vanaf_prijs')) { ?>
                        <span class="cost">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.2976 5.70267C14.465 5.87009 14.7366 5.87009 14.9038 5.70267L19.8743 0.731999C20.0417 0.564581 20.0417 0.29321 19.8743 0.125563C19.7071 -0.0418544 19.4355 -0.0418544 19.2681 0.125563L14.2976 5.09623C14.13 5.26365 14.13 5.53525 14.2976 5.70267Z" fill="white" />
                                <path d="M18.5931 9.4622L18.048 3.46817L16.5515 4.96463C16.6385 5.52025 16.469 6.10848 16.0409 6.53656C15.3294 7.24802 14.1757 7.24825 13.4642 6.53656C12.7528 5.82509 12.7528 4.67117 13.4642 3.9597C13.8923 3.53163 14.4801 3.36229 15.0355 3.44908L16.5324 1.95219L10.5382 1.40703C10.3024 1.38582 10.0691 1.47007 9.9015 1.63768L0.233688 11.3055C-0.0777816 11.6172 -0.0780104 12.1222 0.233688 12.4337L2.38417 14.5844L3.44528 13.5233L6.4768 16.5548L5.41593 17.6157L7.56641 19.7662C7.87811 20.0779 8.38291 20.0779 8.69438 19.7662L18.3628 10.0984C18.5299 9.93079 18.6141 9.69756 18.5931 9.4622Z" fill="white" />
                            </svg>
                            <?php _e('vanaf € ', 'leerbouwen'); ?><?php the_field('kosten_opleiding_vanaf_prijs'); ?>
                        </span>
                    <?php } ?>
                </div>
                <div class="in-btns">
                    <?php $aanmelden_btn = get_field('aanmelden_btn'); ?>
                    <?php if ($aanmelden_btn) { ?>
                        <a class="btn" href="<?php echo $aanmelden_btn['url']; ?>" <?php if ($aanmelden_btn['target']) { ?>target="<?php echo $aanmelden_btn['target']; ?>" <?php } ?>><?php echo $aanmelden_btn['title']; ?></a>
                    <?php } ?>
                    <?php $brochure_link = get_field('brochure_link'); ?>
                    <?php if ($brochure_link) { ?>
                        <a class="brochure-btn" href="<?php echo $brochure_link['url']; ?>" <?php if ($brochure_link['target']) { ?>target="<?php echo $brochure_link['target']; ?>" <?php } ?>><?php echo $brochure_link['title']; ?></a>
                    <?php } ?>
                </div>
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