<?php if ($view_data && property_exists($view_data, 'data')) { ?>
	<?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
	<main id="sngl-vacansie">
		<div class="single-header vac-header">
			<div class="container">
				<div class="row">
					<div class="offset-md-1 col-md-9 col-11 top-padding page-heading">
						<?php if (have_rows('informatie_vacature')) : ?>
							<?php while (have_rows('informatie_vacature')) : the_row(); ?>
								<?php $logo_bedrijf_wit = get_sub_field('logo_bedrijf_wit'); ?>
								<?php if ($logo_bedrijf_wit) { ?>
									<img src="<?php echo $logo_bedrijf_wit['url']; ?>" alt="<?php echo $logo_bedrijf_wit['alt']; ?>" />
								<?php } ?>
							<?php endwhile; ?>
						<?php endif; ?>
						<h1><?php the_title(); ?></h1>
						<div class="information-vacansie">
							<div class="uzp__meta text-muted">
								<span class="location">
									<svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M13.3609 4.97781C13.2902 4.71099 13.1466 4.4267 13.0404 4.17779C11.7694 1.10222 8.99214 0 6.74967 0C3.74772 0 0.441419 2.02672 0 6.20428V7.05777C0 7.09339 0.0121924 7.41335 0.029511 7.57341C0.27696 9.56432 1.83726 11.6802 3.00255 13.6712C4.25624 15.8042 5.55713 17.9026 6.84596 20C7.64068 18.6312 8.43254 17.2445 9.20915 15.9112C9.42081 15.5199 9.66651 15.1288 9.87839 14.7553C10.0196 14.5067 10.2894 14.258 10.4127 14.0266C11.6663 11.7156 13.6842 9.38679 13.6842 7.09335V6.15117C13.6843 5.90254 13.3782 5.03142 13.3609 4.97781ZM6.80463 9.26236C5.92221 9.26236 4.95633 8.8181 4.47958 7.59121C4.40855 7.39592 4.41428 7.00453 4.41428 6.96868V6.41757C4.41428 4.85352 5.73327 4.14226 6.88074 4.14226C8.29339 4.14226 9.38594 5.28019 9.38594 6.70252C9.38594 8.12479 8.21728 9.26236 6.80463 9.26236Z" fill="white" />
									</svg>
									<?php echo $view_data->data->location ?>
								</span>
								<span class="branches">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M17.5 1.73859V0.486523H8.33359V1.74496H5.79199V6.49629C7.76188 7.23968 9.16684 9.14429 9.16684 11.3712C9.16684 12.5476 8.3902 14.4763 6.79258 17.2676C6.56949 17.6573 6.3459 18.0359 6.13019 18.3933H12.3338V14.56H13.5837V18.3933H19.9998V1.74707L17.5 1.73859ZM12.2087 13.2593H9.83379V12.0094H12.2087V13.2593ZM12.2087 10.7593H9.83379V9.50941H12.2087V10.7593ZM12.2087 8.31687H9.83379V7.06699H12.2087V8.31687ZM12.2087 5.81687H9.83379V4.56699H12.2087V5.81687ZM16.0837 13.2593H13.7088V12.0094H16.0837V13.2593ZM16.0837 10.7593H13.7088V9.50941H16.0837V10.7593ZM16.0837 8.31687H13.7088V7.06699H16.0837V8.31687ZM16.0837 5.81687H13.7088V4.56699H16.0837V5.81687Z" fill="white" />
										<path d="M3.95902 10.1211C3.26973 10.1211 2.70898 10.6819 2.70898 11.3712C2.70898 12.0605 3.26973 12.6212 3.95902 12.6212C4.64832 12.6212 5.20906 12.0605 5.20906 11.3712C5.20906 10.6819 4.64832 10.1211 3.95902 10.1211Z" fill="white" />
										<path d="M3.95852 7.41266C1.77578 7.41266 0 9.18848 0 11.3712C0 13.0629 2.51105 17.2834 3.95852 19.5135C5.40594 17.283 7.91703 13.0619 7.91703 11.3712C7.91707 9.1884 6.14129 7.41266 3.95852 7.41266ZM3.95855 13.8711C2.58008 13.8711 1.45863 12.7496 1.45863 11.3712C1.45863 9.9927 2.58008 8.87125 3.95855 8.87125C5.33703 8.87125 6.45848 9.9927 6.45848 11.3712C6.45848 12.7496 5.33703 13.8711 3.95855 13.8711Z" fill="white" />
									</svg>

									<?php
										foreach ($view_data->data->branches->data as $key => $branche) {
											echo $branche->name;
											if ($key < count($view_data->data->branches->data) - 1) {
												echo ', ';
											}
										}
										?>
								</span>
								<span class="education">
									<svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.99941 8.56236L4.0332 6.72604V8.53265V9.79297C4.0332 11.2108 6.70526 12.3604 10.0012 12.3604C13.297 12.3604 15.9695 11.2108 15.9695 9.79297C15.9695 9.7818 15.9658 9.77059 15.9656 9.75968V6.72604L9.99941 8.56236Z" fill="#FFFFFF"/>
										<path d="M0 4.61486L2.13141 5.37729L2.31305 4.98828L3.09607 4.92173L3.20772 5.03789L2.53581 5.19722L2.43788 5.48707C2.4377 5.48707 0.920153 8.65967 1.14304 10.2117C1.14304 10.2117 2.09029 10.7768 3.03714 10.2117L3.28877 5.96825V5.61503L4.69821 5.29707L4.59867 5.54221L3.5478 5.88393L4.03383 6.05756L10 7.89388L15.9662 6.05756L20 4.61488L10 0.767639L0 4.61486Z" fill="#FFFFFF" />
									</svg>

									<?php
										foreach ($view_data->data->education->data as $key => $edu) {
											echo $edu->name;
											if ($key < count($view_data->data->education->data) - 1) {
												echo ', ';
											}
										}
										?>
								</span>
							</div>
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
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-md-6">
					<div class="description-vacansie">
						<h2><?php _e('Description', 'uitzendplaats'); ?></h2>
						<p class="description"><?php echo nl2br(htmlspecialchars($view_data->data->description)) ?></p>
					</div>
					<section id="profile">
						<div class="inner">
							<h4><?php _e('Onze vacature', 'leerbouwen'); ?></h4>
							<h2><?php _e('Informatie', 'leerbouwen'); ?></h2>
							<table>
								<tr>
									<th>
										<svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z" fill="#00A651" stroke="#00A651" />
										</svg>
										<?php _e('Location', 'uitzendplaats') ?>
									</th>
									<td><?php echo $view_data->data->location ?></td>
								</tr>
								<tr>
									<th>
										<svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z" fill="#00A651" stroke="#00A651" />
										</svg>
										<?php _e('Branches', 'uitzendplaats') ?>
									</th>
									<td><?php
											foreach ($view_data->data->branches->data as $key => $branche) {
												echo $branche->name;
												if ($key < count($view_data->data->branches->data) - 1) {
													echo ', ';
												}
											}
											?></td>
								</tr>
								<tr>
									<th>
										<svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z" fill="#00A651" stroke="#00A651" />
										</svg>
										<?php _e('Edited', 'uitzendplaats') ?>
									</th>
									<td>
										<?php
											$edited = strtotime($view_data->data->updated_at);
											echo date('d-m-Y H:i', $edited);
											?>
									</td>
								</tr>
								<tr>
									<th>
										<svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M17.3457 3.51783L17.7232 3.1566L17.3457 2.79536L16.1371 1.63876L15.7916 1.30809L15.4459 1.6386L6.71403 9.98709L3.55383 6.97018L3.20815 6.64018L2.86287 6.97061L1.6543 8.12721L1.27683 8.48844L1.6543 8.84968L6.36858 13.3612L6.71429 13.6921L7.05999 13.3612L17.3457 3.51783Z" fill="#00A651" stroke="#00A651" />
										</svg>
										<?php _e('Education', 'uitzendplaats') ?>
									</th>
									<td>
										<?php
											if (count($view_data->data->education->data) > 0) {
												foreach ($view_data->data->education->data as $key => $education) {
													echo $education->name;
													if ($key < count($view_data->data->education->data) - 1) {
														echo ', ';
													}
												}
											} else {
												_e('None');
											}
											?>
									</td>
								</tr>
							</table>
							<a href="<?php echo sanitize_title(__('apply', 'uitzendplaats')); ?>/" class="btn"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
						</div>
					</section>
				</div>
				<div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1">

					<div class="contact-person">
						<div class="heading">
							<?php if ($view_data->data->recruiter->data->photo_url) { ?>
								<div class="cpimg" style="background-image:url(<?php echo $view_data->data->recruiter->data->photo_url; ?>);"></div>
							<?php } ?>
							<h2><?php _e('Contactpersoon', 'leerbouwen'); ?></h2>
						</div>
						<span class="cpname"><?php echo $view_data->data->recruiter->data->full_name; ?></span>

						<a class="cpin" href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>"><?php echo $view_data->data->recruiter->data->email; ?></a>
						<a class="cpin" href="tel:<?php echo $view_data->data->recruiter->data->phone; ?>"><?php echo $view_data->data->recruiter->data->phone; ?></a>
					</div>
					<?php if (have_rows('informatie_vacature')) : ?>
						<div class="companyinfo">
							<?php while (have_rows('informatie_vacature')) : the_row(); ?>
								<div class="heading">
									<?php $icoon_bedrijf = get_sub_field('icoon_bedrijf'); ?>
									<div class="image" style="background-image:url(<?php if ($icoon_bedrijf) { ?><?php echo $icoon_bedrijf['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['vacaturesmall']; ?> <?php } ?>);">
									</div>
									<h2><?php the_sub_field('bedrijfsnaam'); ?></h2>
								</div>
								<p><?php the_sub_field('adres_bedrijf'); ?><br>
									<?php the_sub_field('postcode'); ?><br>
									<?php the_sub_field('provincie'); ?>
								</p>
								<a class="btn secondair" href="<?php the_sub_field('website'); ?>" target="_blank"><?php _e('Bekijk website', 'leerbouwen'); ?></a>
								<a class="btn" href="<?php the_sub_field('sollicitatielink'); ?>" target="_blank"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
					<a href="mailto:<?php echo $view_data->data->recruiter->data->email; ?>" class="btn blue fullwidth" target="_blank"><?php _e('Stuur een e-mail', 'leerbouwen'); ?></a>
					<a href="<?php echo sanitize_title(__('apply', 'uitzendplaats')); ?>/" class="btn fullwidth"><?php _e('Direct solliciteren', 'leerbouwen'); ?></a>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="uzp__message uzp__message--warning">
			<p><?php _e('The vacancy that you were looking for could not be found', 'uitzendplaats'); ?></p>
		</div>
	<?php } ?>
	<script>
		jQuery('p.description').readmore({
			speed: 75,
			collapsedHeight: 155,
			moreLink: '<a class="readmore" href="#">Lees meer</a>',
			lessLink: '<a class="readmore" href="#">Verbergen</a>'
		});
	</script>
	</main>